<?php

namespace App\Services;

class ProxyService
{
    public static function calculateCost($totalMinutes): float
    {
        $costPerMinute = 0.03;

        // Asegurémonos de que $totalMinutes sea un número, si es un array, sumemos los valores
        $totalMinutes = is_array($totalMinutes) ? array_sum($totalMinutes) : $totalMinutes;

        return $costPerMinute * $totalMinutes;
    }
}
