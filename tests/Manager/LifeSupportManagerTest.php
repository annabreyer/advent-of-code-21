<?php

declare(strict_types = 1);

namespace App\Tests\Manager;

use App\Manager\LifeSupportManager;
use PHPUnit\Framework\TestCase;

class LifeSupportManagerTest extends TestCase
{
    public const INPUT = [
        '00100',
        '11110',
        '10110',
        '10111',
        '10101',
        '01111',
        '00111',
        '11100',
        '10000',
        '11001',
        '00010',
        '01010',
    ];

    public function testGetOxygenRating(): void
    {
        $lifeSupportManager = new LifeSupportManager();
        $data               = $lifeSupportManager->getOxygenRating(self::INPUT);

        $this->assertEquals('10111', $data);
    }

    public function testGetCo2Rating(): void
    {
        $lifeSupportManager = new LifeSupportManager();
        $data               = $lifeSupportManager->getCo2Rating(self::INPUT);

        $this->assertEquals('01010', $data);
    }

    public function testGetLifeSupportRating(): void
    {
        $lifeSupportManager = new LifeSupportManager();
        $data               = $lifeSupportManager->getLifeSupportRating(self::INPUT);

        $this->assertEquals(230, $data);
    }
}
