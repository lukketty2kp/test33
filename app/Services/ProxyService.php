<?php

namespace App\Services;

class ProxyService
{
    public static function calculateCost($totalMinutes): float
    {
        $costPerMinute = 0.03;

        return $costPerMinute * $totalMinutes;
    }
}
