<?php

namespace App\Services;

class StorageService
{
    public static function calculateCost($totalUnits, $billingPeriod): float
    {
        return 0.03 * $totalUnits * $billingPeriod;
    }
}
