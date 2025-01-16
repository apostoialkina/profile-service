<?php

namespace App\Service\ThirdPartyService;

interface DataSourceInterface
{
    public function getData(string $userId): array;
}