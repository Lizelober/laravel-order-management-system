<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //Patient::truncate();

        $csvFile = fopen(public_path("data/patients.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Patient::create([
                    "name" => $data['1'],
                    "surname" => $data['2'],
                    "email" => $data['3'],
                    "currency_countries_id" => $data['4']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
