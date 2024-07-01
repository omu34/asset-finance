<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            [
                ['name' => 'USSD', 'code' => '+1', 'image_path' => 'facebook.svg'],

            ],
            [
                ['name' => 'KSH', 'code' => '+254', 'image_path' => 'facebook.svg'],

            ],
            [

                ['name' => 'Yen', 'code' => '+154', 'image_path' => 'facebook.svg'],

            ],

            [

                ['name' => 'Pound', 'code' => '+2', 'image_path' => 'facebook.svg'],

            ],
            [

                ['name' => 'S.Rand', 'code' => '+340', 'image_path' => 'facebook.svg'],

            ],

        ];

        Currency::insert($currencies);
    }
}
