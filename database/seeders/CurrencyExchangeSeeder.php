<?php

namespace Database\Seeders;

use App\Models\CurrencyExchange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencyExchangeSeeder extends Seeder
{
    public function run() {
        //Order::truncate();

        $csvFile = fopen(public_path("data/currency_exchanges.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                CurrencyExchange::create([
                    "currency_name" => $data['1'],
                    "exchange_rate" => $data['2']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
