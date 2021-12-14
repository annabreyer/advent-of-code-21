<?php declare(strict_types = 1);

namespace App\Tests\Manager;

use App\Manager\CrabSubmarineManager;
use PHPUnit\Framework\TestCase;

class CrabSubmarineManagerTest extends TestCase
{

    public function testCalculateDistance()
    {
        $data = [16,1,2,0,4,2,7,1,2,14];

        $crabSubmarineManager = new CrabSubmarineManager();
        $smallestDistance = $crabSubmarineManager->calculateDistance($data);


    }

}
