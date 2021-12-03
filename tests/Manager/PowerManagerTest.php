<?php

declare(strict_types = 1);

namespace App\Tests\Manager;

use App\Manager\PowerManager;
use PHPUnit\Framework\TestCase;

class PowerManagerTest extends TestCase
{
    public function testGetDecimal(): void
    {
        $powerManager = new PowerManager();
        $binary       = '10110';

        $decimal = $powerManager->getDecimal($binary);

        $this->assertEquals(22, $decimal);
    }

    public function testCountBinaries(): void
    {
        $powerManager = new PowerManager();
        $input        = [
            '00',
            '11',
            '10',
            '10',
            '10',
            '01',
            '00',
            '11',
            '10',
            '11',
            '00',
            '01',
        ];

        $binaries = $powerManager->countBinaries($input);
        $this->assertEquals($binaries[0][0], 5);
        $this->assertEquals($binaries[0][1], 7);
        $this->assertEquals($binaries[1][0], 7);
        $this->assertEquals($binaries[1][1], 5);
    }

    public function testGetGammaAndEpsilon(): void
    {
        $powerManager = new PowerManager();
        $input        = [
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

        $binaryCount = $powerManager->countBinaries($input);
        $gammaBinary = $powerManager->getGammaBinary($binaryCount);
        $this->assertEquals('10110', $gammaBinary);
        $epsilonBinary = $powerManager->getEpsilonBinary($binaryCount);
        $this->assertEquals('01001', $epsilonBinary);
    }

    public function testGetPowerConsumption(): void
    {
        $input = [
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
        $powerManager = new PowerManager();

        $powerConsumption = $powerManager->getPowerConsumption($input);
        $this->assertEquals(198, $powerConsumption);
    }
}
