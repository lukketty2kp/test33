<?php

namespace App\Services;

class SpeechTranslationService
{
    public static function calculateCost($totalLetters): float
    {
        $costPerLetter = 0.00003;

        // Asegurémonos de que $totalLetters sea un número, si es un array, sumemos los valores
        $totalLetters = is_array($totalLetters) ? array_sum($totalLetters) : $totalLetters;

        return $costPerLetter * $totalLetters;
    }
}
