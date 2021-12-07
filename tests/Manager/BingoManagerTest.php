<?php

declare(strict_types = 1);

namespace App\Tests\Manager;

use App\Manager\BingoManager;
use PHPUnit\Framework\TestCase;

class BingoManagerTest extends TestCase
{
    public const RANDOM_NUMBERS = [7, 4, 9, 5, 11, 17, 23, 2, 0, 14, 21, 24, 10, 16, 13, 6, 15, 25, 12, 22, 18, 20, 8, 19, 3, 26, 1];

    public const GRIDS = [
        [
            [22, 13, 17, 11, 0],
            [8, 2, 23, 4, 24],
            [21, 9, 14, 16, 7],
            [6, 10, 3, 18, 5],
            [1, 12, 20, 15, 19],
        ],
        [
            [3, 15, 0, 2, 22],
            [9, 18, 13, 17, 5],
            [19, 8, 7, 25, 23],
            [20, 11, 10, 24, 4],
            [14, 21, 16, 12, 6],
        ],
        [
            [14, 21, 17, 24, 4],
            [10, 16, 15, 9, 19],
            [18, 8, 23, 26, 20],
            [22, 11, 13, 6, 5],
            [2, 0, 12, 3, 7],
        ],
    ];

    public function testCheckForBingoRow(): void
    {
        $grid = [
            [3, 15, 0, 2, ''],
            [9, 18, 13, 17, 5],
            ['', '', '', '', ''],
            ['', 11, 10, 24, 4],
            [14, 21, '', 12, 6],
        ];

        $numbers = [19, 8, 7, 25, 23];

        $bingoManager = new BingoManager($grid, $numbers);
        $bingo        = $bingoManager->checkForBingoRow($grid);

        $this->assertTrue($bingo);
    }

    public function testCheckForBingoColumn(): void
    {
        $grid = [
            [3, 15, '', 2, 22],
            [9, 18, '', 17, 5],
            [19, 8, '', 25, 23],
            [20, 11, '', 24, 4],
            [14, 21, '', 12, 6],
        ];

        $numbers = [0, 13, 7, 10, 16];

        $bingoManager = new BingoManager($grid, $numbers);
        $bingo        = $bingoManager->checkForBingoColumn($grid);

        $this->assertTrue($bingo);
    }

    public function testCheckGridForNumberAndBingo(): void
    {
        $grid = [
            [3, 15, 0, 2, 22],
            [9, 18, 13, 17, 5],
            [19, 8, 7, 25, 23],
            [20, 11, 10, 24, 4],
            [14, 21, 16, 12, 6],
        ];

        $numbers      = [15, 18, 8, 11, 21];
        $bingoManager = new BingoManager($grid, $numbers);

        foreach ($numbers as $number) {
            $bingo = $bingoManager->checkGridForNumberAndBingo($number, $grid);
        }

        $this->assertTrue($bingo);
    }

    public function testDrawNumbersUntilBingo(): void
    {
        $bingoManager = new BingoManager(self::GRIDS, self::RANDOM_NUMBERS);
        $bingo        = $bingoManager->drawNumbersUntilBingo(true);
        $this->assertTrue($bingo);
        $this->assertEquals(4512, $bingoManager->getScore());

        $bingoManager->drawNumbersUntilBingo(false);
        $this->assertEquals(1924, $bingoManager->getScore());
    }

    public function testSetScoreFromColumn(): void
    {
        $grid = [
            [3, 15, '', 2, 22],
            [9, 18, '', 17, 5],
            [19, 8, '', 25, 23],
            [20, 11, '', 24, 4],
            [14, 21, '', 12, 6],
        ];

        $numbers = [0, 13, 7, 10, 16];

        $bingoManager = new BingoManager($grid, $numbers);
        $bingoManager->setScoreFromColumn($grid, 16);

        $this->assertEquals(278 * 16, $bingoManager->getScore());
    }
}
