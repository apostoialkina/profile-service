<?php

namespace App\Mocks;

class SecretServiceClient
{
    public static function makeRequest(string $userfId): string
    {
        return json_encode([
            'unknown' => 'alien',
        ]);
    }
}
