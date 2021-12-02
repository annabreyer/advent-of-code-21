<?php

declare(strict_types = 1);

namespace App\Manager;

use App\Objects\Navigation;

class NavigationManager
{
    public const FORWARD = 'forward';

    public const UP      = 'up';

    public const DOWN    = 'down';

    public function navigate(Navigation $navigation, array $navigationData): void
    {
        foreach ($navigationData as $data) {
            $movement = (int) \filter_var($data, FILTER_SANITIZE_NUMBER_INT);
            $type     = $this->getMovementType($data);

            switch ($type) {
                case self::FORWARD:
                    $this->forward($navigation, $movement);

                break;
                case self::UP:
                    $this->up($navigation, $movement);

                break;
                case self::DOWN:
                    $this->down($navigation, $movement);

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

    public function forward(Navigation $navigation, int $movement): void
    {
        $navigation->increaseHorizontalPositionBy($movement);
        $navigation->increaseDepthBy($navigation->getAim() * $movement);
    }

    public function down(Navigation $navigation, int $movement): void
    {
        $navigation->increaseAimBy($movement);
    }

    public function up(Navigation $navigation, int $movement): void
    {
        $navigation->decreaseAimBy($movement);
    }
}
