<?php

namespace App\Mocks;

class EmailServiceClient
{
    public static function makeRequest(string $userfId): string
    {
        return json_encode([
            'email' => 'test@test.com',
            'name' => 'Bar Dor',
        ]);
    }
}
