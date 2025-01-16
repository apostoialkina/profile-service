<?php

namespace App\Mocks;

class AvatarServiceClient
{
    public static function makeRequest(string $userId): string
    {
        return json_encode([
            'name' => 'John Bar',
            'avatar_url' => 'https://i.pravatar.cc/300',
        ]);
    }
}
