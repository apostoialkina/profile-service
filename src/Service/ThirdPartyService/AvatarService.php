<?php

namespace App\Service\ThirdPartyService;

use App\Mocks\AvatarServiceClient;

class AvatarService implements DataSourceInterface
{
    public function __construct(private AvatarServiceClient $client) {}

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
