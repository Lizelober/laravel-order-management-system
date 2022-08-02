<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CurrencyCountry;

class CurrencyCountrySeeder extends Seeder
{
    public function run() {
        //CurrencyCountry::truncate();

        $csvFile = fopen(public_path("data/currency_countries.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                CurrencyCountry::create([
                    "currency_name" => $data['1'],
                    "country_name" => $data['2']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
