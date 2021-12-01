<?php

declare(strict_types = 1);

namespace App\Helper;

class MessageHelper
{
    public const RESULT_MESSAGE = 'First Answer: %s | Second Answer: %s';

    public static function getResultMessage(string $firstResult, string $secondResult): string
    {
        return \sprintf('First Answer: %s | Second Answer: %s',
            $firstResult,
            $secondResult);
    }
}
