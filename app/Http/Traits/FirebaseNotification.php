<?php

namespace App\Http\Traits;

use App\Models\FcmToken;
use App\Models\Notification;
use App\Models\User;

trait FirebaseNotification
{

    private string $serverKey = 'AAAA2OYSeeA:APA91bHIXVPsuljlv4B1d45OynLI5u2gdGvfeVaS15KWNzAWDGqdHTi0zDkkQ5ed2UQRgAtTj7Tz9vJl97-4HPoP-X18L7o0LtGo7xpyf4j9StFbVc6dFVQs-BODAthLkxroudJJVSfQ';


    public function sendFirebaseNotification($data, $userId): bool
    {
        $user = User::query()->findOrFail($userId);

        if ($user) {
            $users = $this->getCompanyUsers($user->company_id);
            $tokens = $this->getUsersFcmTokens($users);

            $this->createNotification($user->company_id, $data['title'], $data['body']);

            $this->sendNotification($tokens, $data);

            return true;
        }

        return false;
    }

    protected function getCompanyUsers($companyId): array
    {
        return User::query()
        ->where('company_id', $companyId)
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
        Notification::create([
            'company_id' => $companyId,
            'title' => $title,
            'body' => $body,
        ]);
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
