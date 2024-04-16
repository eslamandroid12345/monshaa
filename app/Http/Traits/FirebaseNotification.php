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


    public function sendFirebaseNotification($data, $userId,$permission)
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

    protected function getCompanyUsers($user, $permission): array
    {
        $ids = [];

        // Retrieve the admin for the company.
        $admin = User::query()
            ->where('is_admin', 1)
            ->where('company_id', $user->company_id)
            ->first();

        // Check if an admin was found and add their ID to the list.
        if ($admin) {
            $ids[] = $admin->id;
        }

        // Retrieve all non-admin employees in the same company.
        $employees = User::query()
            ->where('is_admin', 0)
            ->where('company_id', $user->company_id)
            ->get();

        // Filter employees who have the specified permission.
        foreach ($employees as $employee) {
            $employeePermissions = json_decode($employee->employee_permissions, true);
            if (in_array($permission, $employeePermissions)) {
                $ids[] = $employee->id;
            }
        }

        return $ids;
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


    ############################################# Send Notification For Company About Contracts Expire #######################################

    public function sendFirebaseForCompany($data, $companyId,$permission): bool
    {
        $company = Company::query()->findOrFail($companyId);

        $employees = User::query()
            ->where('company_id','=',$company->id)
            ->where('is_admin',0)
            ->get();

        $users = $this->getCompanyEmployees($employees,$companyId,$permission);

        $tokens = $this->getUsersFcmTokens($users);

        // Create notification for the company
        $this->createNotification($companyId, $data['title'], $data['body'],$users);

        // Send notification to users
        $this->sendNotification($tokens, $data);

        return true;

    }//Send firebase notification for company


    protected function getCompanyEmployees($employees,$companyId,$permission): array
    {
        $ids = [];

        // Retrieve the admin for the company.
        $admin = User::query()
            ->where('is_admin', 1)
            ->where('company_id', $companyId)
            ->first();

        // Check if an admin was found and add their ID to the list.
        if ($admin) {
            $ids[] = $admin->id;
        }

        // Filter employees who have the specified permission.
        foreach ($employees as $employee) {
            $employeePermissions = json_decode($employee->employee_permissions, true);
            if (in_array($permission, $employeePermissions)) {
                $ids[] = $employee->id;
            }
        }

        return $ids;
    }//Get all employees of company

    ########################################################################################################################

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
