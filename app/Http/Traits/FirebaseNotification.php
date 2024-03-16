<?php

namespace App\Http\Traits;
use App\Models\FcmToken;
use App\Models\Notification;
use App\Models\User;

trait FirebaseNotification
{

    private string $serverKey = 'AAAA2OYSeeA:APA91bHIXVPsuljlv4B1d45OynLI5u2gdGvfeVaS15KWNzAWDGqdHTi0zDkkQ5ed2UQRgAtTj7Tz9vJl97-4HPoP-X18L7o0LtGo7xpyf4j9StFbVc6dFVQs-BODAthLkxroudJJVSfQ';


    public function sendFirebaseNotification($data, $userId,$permission): bool
    {
        $user = User::query()->findOrFail($userId);

        // Get company users and their FCM tokens
        $users = $this->getCompanyUsers($user,$permission);
        $tokens = $this->getUsersFcmTokens($users);

        // Create notification for the company
        $this->createNotification($user->company_id, $data['title'], $data['body']);

        // Send notification to users
        $this->sendNotification($tokens, $data);

        return true;


    }

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

    protected function createNotification($companyId, $title, $body): void
    {
        Notification::create(['company_id' => $companyId, 'title' => $title, 'body' => $body,]);
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
