<?php

declare(strict_types = 1);

namespace App\Manager;

class BingoManager
{
    private array $grids;

    private array $numbers;

    private int $score;

    public function __construct(array $grids, array $numbers)
    {
        $this->grids   = $grids;
        $this->numbers = $numbers;
        $this->score   = 0;
    }

    public function drawNumbersUntilBingo(bool $findFirstBingo): bool
    {
        foreach ($this->numbers as $number) {
            $number = (int) $number;

            foreach ($this->grids as $key => $grid) {
                $bingo             = $this->checkGridForNumberAndBingo($number, $grid);
                $this->grids[$key] = $grid;

                if ($bingo) {
                    unset($this->grids[$key]);

                    if ($findFirstBingo) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    public function checkGridForNumberAndBingo(int $number, array &$grid): bool
    {
        foreach ($grid as $key => $row) {
            $position = \array_search($number, $row);
            if (false !== $position) {
                $grid[$key][$position] = '';
            }
        }

        if (false !== $this->checkForBingoRow($grid)) {
            $this->setScoreFromRow($grid, $number);

            return true;
        }

        if (false !== $this->checkForBingoColumn($grid)) {
            $this->setScoreFromColumn($grid, $number);

            return true;
        }

        return false;
    }

    public function setScoreFromRow(array $winningGrid, int $lastNumber): void
    {
        $value = 0;

        foreach ($winningGrid as $row) {
            $value = $value + \array_sum($row);
        }

        $this->score = $lastNumber * $value;
    }

    public function setScoreFromColumn(array $winningGrid, int $lastNumber): void
    {
        $value       = 0;
        $columnCount = \count($winningGrid[0]);

        while ($columnCount >= 0) {
            $columnValue = \array_sum(\array_column($winningGrid, $columnCount));
            $value       = $value + $columnValue;
            $columnCount--;
        }

        $this->score = $lastNumber * $value;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function checkForBingoRow(array $grid): bool
    {
        foreach ($grid as $row) {
            $numbers = \implode('', \array_values($row));
            if (empty($numbers)) {
                return true;
            }
        }

        return false;
    }

    public function checkForBingoColumn(array $grid): bool
    {
        $columnCount = \count($grid[0]) - 1;
        while ($columnCount >= 0) {
            $numbers = \implode('', \array_column($grid, $columnCount));
            if (empty($numbers)) {
                return true;
            }

            $columnCount--;
        }

        return false;
    }
}
