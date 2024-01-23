<?php

namespace App\Services;

class StorageService
{
    public static function calculateCost($totalUnits, $billingPeriod): float
    {
        $costPerGB = 0.03;

        // Asegurémonos de que $totalUnits sea un número, si es un array, sumemos los valores
        $totalUnits = is_array($totalUnits) ? array_sum($totalUnits) : $totalUnits;

        return $costPerGB * $totalUnits * $billingPeriod;
    }
}
