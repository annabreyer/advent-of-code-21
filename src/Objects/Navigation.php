<?php

declare(strict_types = 1);

namespace App\Objects;

class Navigation
{
    /** @var int */
    private $aim;

    /** @var int */
    private $horizontalPosition;

    /**
     * @var int
     */
    private $depth;

    public function __construct(int $aim, int $horizontalPosition, int $depth)
    {
        $this->aim                = $aim;
        $this->horizontalPosition = $horizontalPosition;
        $this->depth              = $depth;
    }

    public function getAim(): int
    {
        return $this->aim;
    }

    public function getHorizontalPosition(): int
    {
        return $this->horizontalPosition;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function increaseAimBy(int $movement): void
    {
        $this->aim = $this->aim + $movement;
    }

    public function decreaseAimBy(int $movement): void
    {
        $this->aim = $this->aim - $movement;
    }

    public function increaseDepthBy(int $movement): void
    {
        $this->depth = $this->depth + $movement;
    }

    public function increaseHorizontalPositionBy(int $movement): void
    {
        $this->horizontalPosition = $this->horizontalPosition + $movement;
    }
}
