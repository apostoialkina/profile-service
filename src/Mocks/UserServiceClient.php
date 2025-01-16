<?php

namespace App\Mocks;

class UserServiceClient
{
    public static function makeRequest(string $userfId): string
    {
        return json_encode([
            'name' => 'John Foo',
        ]);
    }
}
