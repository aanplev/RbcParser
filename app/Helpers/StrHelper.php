<?php

declare(strict_types = 1);

namespace App\Helpers;

class StrHelper
{
    public static function crop(string $str, int $offset) : string
    {
        $step1 = substr($str, 0, $offset);
        $step2 = rtrim($step1, '!,.-');
        $step3 = substr($step2, 0, strrpos($step2, ' '));

        return $step3 . '…';
    }
}
