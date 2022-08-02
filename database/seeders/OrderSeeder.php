<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //Order::truncate();

        $csvFile = fopen(public_path("data/orders.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Order::create([
                    "patient_id" => $data['1'],
                    "product_id" => $data['2'],
                    "order_price" => $data['3'],
                    "quantity" => $data['4'],
                    "order_paid" => $data['5']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
