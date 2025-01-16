<?php
namespace App\Service;

use App\Service\ThirdPartyService\DataSourceInterface;

class PriorityManager
{
    public function __construct(private array $priorities) {}

    public function getPrioritizedData(DataSourceInterface $dataSource, string $userId): array
    {
        $data = $dataSource->getData($userId);

        $prioritizedData = [];
        foreach ($data as $field => $value) {
            $prioritizedData[$field] = [
                'value' => $value,
                'priority' => $this->priorities[$dataSource::class][$field] ?? PHP_INT_MAX,
            ];
        }

        return $prioritizedData;
    }
}
