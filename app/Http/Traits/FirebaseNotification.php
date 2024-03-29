<?php

namespace App\Http\Traits;
use App\Models\Company;
use App\Models\FcmToken;
use App\Models\Notification;
use App\Models\NotificationView;
use App\Models\User;

trait FirebaseNotification
{

    private $serverKey = 'AAAAxbaq9XA:APA91bGEIOCAkAg4h9BD7vjWrmR9rFOFzmYNQemiyt1R0a3WyiCLaKzLFVj5vMqtknsNTjGpfCbkG7FSUx_ZxffY9gFKuF7z-SBYLCLzXQqlxV9HAQSgWu1a2o9i7lHqTSW5szy0lg4-';


    public function sendFirebaseNotification($data, $userId,$permission): bool
    {
        $user = User::query()->findOrFail($userId);

        // Get company users and their FCM tokens
        $users = $this->getCompanyUsers($user,$permission);
        $tokens = $this->getUsersFcmTokens($users);

        // Create notification for the company
        $this->createNotification($user->company_id, $data['title'], $data['body'],$users);

        // Send notification to users
        $this->sendNotification($tokens, $data);

        return true;

    }

    public function sendFirebaseForCompany($data, $companyId,$permission): bool
    {
        $company = Company::query()->findOrFail($companyId);

        $employees = User::query()
            ->where('company_id','=',$company->id)
            ->get();//get all user of company

        $users = $this->getCompanyEmployees($employees,$permission);
        $tokens = $this->getUsersFcmTokens($users);

        // Create notification for the company
        $this->createNotification($companyId, $data['title'], $data['body'],$users);

        // Send notification to users
        $this->sendNotification($tokens, $data);

        return true;

    }//Send firebase notification for company


    protected function getCompanyEmployees($users,$permission): array
    {
        $ids = [];
        foreach ($users as $user){
            if ($user->is_admin == 0 && !in_array($permission, json_decode($user->employee_permissions, true))) {
                $ids[] =  User::query()
                    ->where('company_id', $user->company_id)
                    ->where('user_id','!=',$user->id)
                    ->first()->id;
            }else{
                // Return all users of the company
                $ids[] =  User::query()
                    ->where('company_id', $user->company_id)
                    ->where('id','=',$user->id)
                    ->first()
                    ->id;
            }

        }

        return $ids;

    }//Get all employees of company

    protected function getCompanyUsers($user,$permission): array
    {
        // Check if the user is not an admin and does not have the permission
        if ($user->is_admin == 0 && !in_array($permission, json_decode($user->employee_permissions, true))) {
        return User::query()
            ->where('company_id', $user->company_id)
            ->where('user_id','!=',$user->id)
            ->pluck('id')
            ->toArray();
        }
        // Return all users of the company
        return User::query()
        ->where('company_id', $user->company_id)
            ->pluck('id')
            ->toArray();
    }

    protected function getUsersFcmTokens($users): array
    {
        return FcmToken::query()
        ->whereIn('user_id',$users)
            ->pluck('token')
            ->toArray();
    }

    protected function createNotification($companyId, $title, $body,$users): void
    {
        $notification = Notification::create(['company_id' => $companyId, 'title' => $title, 'body' => $body,]);

        ####### Users Get All Ids of users belongs to companyId
        foreach ($users as $user){
            NotificationView::create([
                'user_id' => $user,
                'company_id' => $companyId,
                'notification_id' => $notification->id,
            ]);
        }

    }

    protected function sendNotification($tokens, $data)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = [
            'registration_ids' => $tokens,
            'data' => $data,
            "notification" => [
                "title" => $data['title'],
                "body" => $data['body'],
            ]
        ];

        $fields = json_encode($fields);

        $headers = [
            'Authorization: key=' . $this->serverKey,
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => $fields
        ]);

        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }


}
