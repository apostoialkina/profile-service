<?php

namespace App\Service\ThirdPartyService;

use App\Mocks\SecretServiceClient;

class SecretService implements DataSourceInterface
{
    public function __construct(private SecretServiceClient $client) {}

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
