<?php

declare(strict_types = 1);

namespace App\Manager;

class NavigationManager
{
    public const FORWARD = 'forward';

    public const UP      = 'up';

    public const DOWN    = 'down';

    public function navigate(int &$horizontalPosition, int &$depth, array $navigationData): void
    {
        foreach ($navigationData as $data) {
            $movement = (int) \filter_var($data, FILTER_SANITIZE_NUMBER_INT);
            $type     = $this->getMovementType($data);

            switch ($type) {
                case self::FORWARD:
                    $horizontalPosition = $this->forward($horizontalPosition, $movement);

                break;
                case self::UP:
                    $depth = $this->up($depth, $movement);

                break;
                case self::DOWN:
                    $depth = $this->down($depth, $movement);

                break;
            }
        }
    }

    public function getMovementType(string $data): string
    {
        if (false !== \mb_strpos($data, self::FORWARD)) {
            return self::FORWARD;
        }

        if (false !== \mb_strpos($data, self::DOWN)) {
            return self::DOWN;
        }

        if (false !== \mb_strpos($data, self::UP)) {
            return self::UP;
        }

        return '';
    }

    public function forward(int $horizontalPosition, int $movement): int
    {
        return $horizontalPosition + $movement;
    }

    public function down(int $depth, int $movement): int
    {
        return $depth + $movement;
    }

    public function up(int $depth, int $movement): int
    {
        return $depth - $movement;
    }
}
