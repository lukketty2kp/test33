<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\BackOfficeService;
use App\Services\StorageService;
use App\Services\ProxyService;
use App\Services\SpeechTranslationService;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function generateInvoice(): JsonResponse
    {
        // Lógica para obtener datos de los últimos 15 días y calcular costos
        $last15DaysData = $this->getUsageDataFromDatabase();

        // Lógica para calcular costos utilizando los servicios
        $backOfficeCost = BackOfficeService::calculateCost();
        $storageCost = StorageService::calculateCost($last15DaysData['storage']['totalUnits'], $last15DaysData['billingPeriod']);
        $proxyCost = ProxyService::calculateCost($last15DaysData['proxy']['totalMinutes']);
        $speechTranslationCost = SpeechTranslationService::calculateCost($last15DaysData['speechTranslation']['totalLetters']);

        // Calcula el costo total
        $totalCost = $backOfficeCost + $storageCost + $proxyCost + $speechTranslationCost;

        // Prepara los datos para la respuesta JSON
        $invoiceData = [
            'backOfficeCost' => $backOfficeCost,
            'storageCost' => $storageCost,
            'proxyCost' => $proxyCost,
            'speechTranslationCost' => $speechTranslationCost,
            'totalCost' => $totalCost,
        ];

        // Devuelve la respuesta en formato JSON
        return response()->json($invoiceData);
    }

    private function getUsageDataFromDatabase(): array
    {
        // Simula datos de los últimos 15 días
        $billingPeriod = 15;

        $usageData = DB::table('usage_data')
            ->orderBy('created_at', 'desc')
            ->limit($billingPeriod)
            ->get();

        $storageData = $usageData->pluck('total_units')->toArray();
        $proxyData = $usageData->pluck('total_minutes')->toArray();
        $speechTranslationData = $usageData->pluck('total_letters')->toArray();

        return [
            'billingPeriod' => $billingPeriod,
            'storage' => ['totalUnits' => $storageData],
            'proxy' => ['totalMinutes' => $proxyData],
            'speechTranslation' => ['totalLetters' => $speechTranslationData],
        ];
    }
}
