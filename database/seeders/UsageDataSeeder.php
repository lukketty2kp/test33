<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsageDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Simular datos para los últimos 30 días
        $totalDays = 30;

        for ($day = 1; $day <= $totalDays; $day++) {
            DB::table('usage_data')->insert([
                'date' => now()->subDays($day),
                'item_name' => 'Item ' . $day,
                'total_units' => rand(50, 200),
                'total_minutes' => rand(200, 600),
                'total_letters' => rand(5000, 15000),
                'created_at' => now()->subDays($day),
                'updated_at' => now()->subDays($day),
            ]);
        }
    }
}
