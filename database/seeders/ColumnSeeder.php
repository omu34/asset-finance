<?php

namespace Database\Seeders;

use App\Models\Column;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        $columns = [
            [
                [
                    'name' => 'Home',
                    'link' => '/home',

                ]

            ],
            [
                [
                    'name2' => 'Gallery',
                    'link2' => '/single-gallery',

                ]

            ],


        ];

        Column::insert($columns);
    }
}
