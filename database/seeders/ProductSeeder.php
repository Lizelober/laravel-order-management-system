<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //Product::truncate();

        $csvFile = fopen(public_path("data/products.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Product::create([
                    "product_name" => $data['1'],
                    "product_price_rand" => $data['2']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
