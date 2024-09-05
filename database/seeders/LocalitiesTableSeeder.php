<?php

namespace Database\Seeders;

use App\Models\Localities;
use Illuminate\Database\Seeder;

class LocalitiesTableSeeder extends Seeder
{
    public function run()
    {
        $csvFile = storage_path('app/public/file/Localities.csv');

        $csvData = array_map(function($row) {
            return str_getcsv($row, ';');
        }, file($csvFile));

        foreach ($csvData as  $row) {
            if (count($row) >= 4) {
                Localities::create([
                    'comune' => $row[0],
                    'cap' => $row[1],
                    'provincia' => $row[2],
                    'regione' => $row[3],
                ]);
            }
        }
    }
}

