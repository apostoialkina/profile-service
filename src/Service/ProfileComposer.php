<?php

namespace App\Service;

use App\Service\ThirdPartyService\DataSourceInterface;

class ProfileComposer
{
    /** @var DataSourceInterface[] */
    private array $sources;

    public function __construct(private PriorityManager $priorityManager, iterable $sources) {
        $this->sources = iterator_to_array($sources);
    }

    public function composeProfile(string $userId): array
    {
        $composedData = [];

        foreach ($this->sources as $source) {
            $sourceData = $this->priorityManager->getPrioritizedData($source, $userId);
            $composedData = $this->mergePrioritizedData($sourceData, $composedData);
        }

        $removePriorityInfo = fn($data) => $data['value'];
        $formatedData = array_map($removePriorityInfo, $composedData);
        $formatedData['id'] = $userId;

        return $formatedData;
    }

    private function mergePrioritizedData(array $sourceData, array $composedData): array
    {
        foreach ($sourceData as $field => $value) {
            if (
                !isset($composedData[$field]) ||
                $value['priority'] < $composedData[$field]['priority']
            ) {
                $composedData[$field] = $value;
            }
        }

        return $composedData;
    }
}
