<?php

declare(strict_types = 1);

namespace App\Tests\Manager;

use App\Manager\NavigationManager;
use PHPUnit\Framework\TestCase;

class NavigationManagerTest extends TestCase
{
    public function testGetNavigationType(): void
    {
        $data               = 'forward 5';
        $navigationManager  = new NavigationManager();

        $type = $navigationManager->getMovementType($data);
        $this->assertEquals(NavigationManager::FORWARD, $type);
    }

    public function testNavigate(): void
    {
        $data = [
            'forward 5',
            'down 5',
            'forward 8',
            'up 3',
            'down 8',
            'forward 2',
        ];
        $navigationManager  = new NavigationManager();
        $horizontalPosition = 0;
        $depth              = 0;

        $navigationManager->navigate($horizontalPosition, $depth, $data);

        $this->assertEquals(15, $horizontalPosition);
        $this->assertEquals(10, $depth);
    }

    public function testForward(): void
    {
        $navigationManager  = new NavigationManager();
        $horizontalPosition = 0;
        $movement           = 3;

        $newPosition = $navigationManager->forward($horizontalPosition, $movement);
        $this->assertEquals(3, $newPosition);
    }

    public function testDown(): void
    {
        $navigationManager = new NavigationManager();
        $depth             = 0;
        $movement          = 3;

        $newDepth= $navigationManager->down($depth, $movement);
        $this->assertEquals(3, $newDepth);
    }

    public function testUp(): void
    {
        $navigationManager = new NavigationManager();
        $depth             = 5;
        $movement          = 3;

        $newDepth = $navigationManager->up($depth, $movement);
        $this->assertEquals(2, $newDepth);
    }
}
