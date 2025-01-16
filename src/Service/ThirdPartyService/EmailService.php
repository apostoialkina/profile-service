<?php

namespace App\Service\ThirdPartyService;

use App\Mocks\EmailServiceClient;

class EmailService implements DataSourceInterface
{
    public function __construct(private EmailServiceClient $client) {}

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
