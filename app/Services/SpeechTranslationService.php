<?php

namespace App\Services;

class SpeechTranslationService
{
    public static function calculateCost($totalLetters): float
    {
        $costPerLetter = 0.00003;

        return $costPerLetter * $totalLetters;
    }
}
