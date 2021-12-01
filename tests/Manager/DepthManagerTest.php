<?php

declare(strict_types = 1);

namespace App\Tests\Manager;

use App\Manager\DepthManager;
use PHPUnit\Framework\TestCase;

class DepthManagerTest extends TestCase
{
    public function testDepthDecreases(): void
    {
        $depthManager  = new DepthManager();
        $previousDepth = 6;
        $currentDepth  = 2;
        $this->assertTrue($depthManager->depthDecreases($previousDepth, $currentDepth));

        $previousDepth = 5;
        $currentDepth  = 5;
        $this->assertFalse($depthManager->depthDecreases($previousDepth, $currentDepth));

        $previousDepth = 5;
        $currentDepth  = 7;
        $this->assertFalse($depthManager->depthDecreases($previousDepth, $currentDepth));
    }

    public function testDepthIncreases(): void
    {
        $depthManager  = new DepthManager();
        $previousDepth = 6;
        $currentDepth  = 2;
        $this->assertFalse($depthManager->depthIncreases($previousDepth, $currentDepth));

        $previousDepth = 5;
        $currentDepth  = 5;
        $this->assertFalse($depthManager->depthIncreases($previousDepth, $currentDepth));

        $previousDepth = 5;
        $currentDepth  = 7;
        $this->assertTrue($depthManager->depthIncreases($previousDepth, $currentDepth));
    }

    public function testCountNumberOfIncreases(): void
    {
        $depthManager = new DepthManager();
        $data         = [1, 4, 3, 4, 4, 5, 6];

        $numberOfIncreases = $depthManager->countNumberOfIncreases($data);
        $this->assertEquals(4, $numberOfIncreases);

        $data              = [6, 6, 6, 7, 6, 6, 6];
        $numberOfIncreases = $depthManager->countNumberOfIncreases($data);
        $this->assertEquals(1, $numberOfIncreases);

        $data              = [199, 200, 208, 210, 200, 207, 240, 240, 240, 269, 260, 263];
        $numberOfIncreases = $depthManager->countNumberOfIncreases($data);
        $this->assertEquals(7, $numberOfIncreases);
    }
}
