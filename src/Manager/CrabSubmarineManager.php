<?php declare(strict_types = 1);

namespace App\Manager;

use PHPUnit\Framework\TestCase;

class CrabSubmarineManager
{
    public function calculateDistance(array $crabPositions)
    {
        $smallestPosition = min($crabPositions);
        $greatestPosition = max($crabPositions);

        $greatestDistance = $greatestPosition - $smallestPosition;

        $distances = [];
        foreach ($crabPositions as $position) {
            $movingPosition = $smallestPosition;
            $totalDistance = 0;

            while ($greatestDistance >= $movingPosition ) {
                $distances[$movingPosition] = 0;
                $distance                   = abs($position - $movingPosition);
                $totalDistance              = $totalDistance + $distance;
                $distances[$movingPosition] = $distances[$movingPosition] + $distance;
                $movingPosition++;
            }
        }

        $smallestDistance = min($distances);
        $position =  array_search($distances, $smallestPosition);

        return $smallestDistance;
    }





}
