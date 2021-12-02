<?php

declare(strict_types = 1);

namespace App\Tests\Manager;

use App\Manager\NavigationManager;
use App\Objects\Navigation;
use PHPUnit\Framework\TestCase;

class NavigationManagerTest extends TestCase
{
    public function testGetNavigationType(): void
    {
        $data              = 'forward 5';
        $navigationManager = new NavigationManager();

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

        $navigationManager = new NavigationManager();
        $navigation        = new Navigation(0, 0, 0);

        $navigationManager->navigate($navigation, $data);

        $this->assertEquals(15, $navigation->getHorizontalPosition());
        $this->assertEquals(60, $navigation->getDepth());
    }

    public function testForward(): void
    {
        $navigationManager = new NavigationManager();
        $navigation        = new Navigation(0, 0, 0);
        $movement          = 3;

        $navigationManager->forward($navigation, $movement);
        $this->assertEquals(3, $navigation->getHorizontalPosition());
    }

    public function testDown(): void
    {
        $navigationManager = new NavigationManager();
        $navigation        = new Navigation(0, 0, 0);
        $movement          = 3;

        $navigationManager->down($navigation, $movement);
        $this->assertEquals(3, $navigation->getAim());
    }

    public function testUp(): void
    {
        $navigationManager = new NavigationManager();
        $navigation        = new Navigation(5, 0, 0);
        $movement          = 3;

        $navigationManager->up($navigation, $movement);
        $this->assertEquals(2, $navigation->getAim());
    }
}
