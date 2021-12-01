<?php

declare(strict_types = 1);

namespace App\Manager;

class DepthManager
{
    public function countNumberOfIncreases(array $data): int
    {
        $previousDepth     = 0;
        $numberOfIncreases = 0;

        foreach ($data as $depth) {
            if (0 === $previousDepth) {
                $previousDepth = $depth;
            }

            $isIncreased = $this->depthIncreases($previousDepth, $depth);
            if ($isIncreased) {
                $numberOfIncreases++;
            }

            $previousDepth = $depth;
        }

        return $numberOfIncreases;
    }

    public function depthDecreases(int $previousDepth, int $currentDepth): bool
    {
        return $previousDepth > $currentDepth;
    }

    public function depthIncreases(int $previousDepth, int $currentDepth): bool
    {
        return $previousDepth < $currentDepth;
    }

    public function aggregateMeasurementsInSlidingWindow(array $measurements): array
    {
        $aggregatedData = [];

        while (\count($measurements) > 0) {
            $window           = \array_slice($measurements, 0, 3);
            $windowData       = \array_sum($window);
            $aggregatedData[] = $windowData;
            unset($measurements[0]);
            $measurements = \array_values($measurements);
        }

        return $aggregatedData;
    }
}
