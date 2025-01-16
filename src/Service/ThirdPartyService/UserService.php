<?php

namespace App\Service\ThirdPartyService;

use App\Mocks\UserServiceClient;

class UserService implements DataSourceInterface
{
    public function __construct(private UserServiceClient $client) {}

    public function getData(string $userId): array
    {
        try {
            $response = json_decode($this->client->makeRequest($userId), true);
        } catch (\Throwable $e) {
            return [];
        }

        return $response;
    }
}
