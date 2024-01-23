<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
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
        // Lógica para obtener datos de los últimos 15 días
        $startDate = now()->subDays(15);
        $endDate = now();

        $usageData = DB::table('usage_data')
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        // Variables para totalizar
        $totalStorageUnits = 0;
        $totalProxyMinutes = 0;
        $totalSpeechLetters = 0;

        // Items para la respuesta JSON
        $items = [];

        foreach ($usageData as $data) {
            $totalStorageUnits += $data->total_units;
            $totalProxyMinutes += $data->total_minutes;
            $totalSpeechLetters += $data->total_letters;

            $items[] = [
                'date' => $data->date,
                'storage' => $data->total_units,
                'proxy' => $data->total_minutes,
                'speechTranslation' => $data->total_letters,
            ];
        }

        // Calcular costos utilizando los servicios
        $backOfficeCost = BackOfficeService::calculateCost();
        $storageCost = StorageService::calculateCost($totalStorageUnits, count($usageData));
        $proxyCost = ProxyService::calculateCost($totalProxyMinutes);
        $speechTranslationCost = SpeechTranslationService::calculateCost($totalSpeechLetters);

        // Calcula el costo total
        $totalCost = $backOfficeCost + $storageCost + $proxyCost + $speechTranslationCost;

        // Prepara los datos para la respuesta JSON
        $invoiceData = [
            'billingPeriod' => [
                'startDate' => $startDate->toDateString(),
                'endDate' => $endDate->toDateString(),
            ],
            'items' => $items,
            'backOfficeCost' => $backOfficeCost,
            'storageCost' => $storageCost,
            'proxyCost' => $proxyCost,
            'speechTranslationCost' => $speechTranslationCost,
            'totalCost' => $totalCost,
        ];

        // Devuelve la respuesta en formato JSON
        return response()->json($invoiceData);
    }

    public function generateInvoiceFront(): View|Application|Factory
    {
        // Lógica para obtener datos de los últimos 15 días
        $startDate = now()->subDays(15);
        $endDate = now();

        $usageData = DB::table('usage_data')
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        // Variables para totalizar
        $totalStorageUnits = 0;
        $totalProxyMinutes = 0;
        $totalSpeechLetters = 0;

        // Items para la respuesta JSON
        $items = [];

        foreach ($usageData as $data) {
            $totalStorageUnits += $data->total_units;
            $totalProxyMinutes += $data->total_minutes;
            $totalSpeechLetters += $data->total_letters;

            $items[] = [
                'date' => $data->date,
                'item_name' => $data->item_name,
                'storage' => $data->total_units,
                'proxy' => $data->total_minutes,
                'speechTranslation' => $data->total_letters,
            ];
        }

        // Calcular costos utilizando los servicios
        $backOfficeCost = BackOfficeService::calculateCost();
        $storageCost = StorageService::calculateCost($totalStorageUnits, count($usageData));
        $proxyCost = ProxyService::calculateCost($totalProxyMinutes);
        $speechTranslationCost = SpeechTranslationService::calculateCost($totalSpeechLetters);

        // Calcula el costo total
        $totalCost = $backOfficeCost + $storageCost + $proxyCost + $speechTranslationCost;

        // Prepara los datos para la vista
        $invoiceData = [
            'billingPeriod' => [
                'startDate' => $startDate->toDateString(),
                'endDate' => $endDate->toDateString(),
            ],
            'items' => $items,
            'backOfficeCost' => $backOfficeCost,
            'storageCost' => $storageCost,
            'proxyCost' => $proxyCost,
            'speechTranslationCost' => $speechTranslationCost,
            'totalCost' => $totalCost,
        ];

        // Devuelve la vista en lugar de JSON
        return view('invoice', compact('invoiceData'));
    }


}
