<?php

namespace Database\Seeders;

use App\Models\TopNavbar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopNavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $topnavbars = [
            [
                ['name' => 'Home', 'link' => '/home' ],
            ],
            [
                ['name' => 'Gallery', 'link' => '/single-gallery'],
            ],
            [

                ['name' => 'Videos', 'link' => 'single-video'],
            ]
        ];

        TopNavbar::insert($topnavbars);
    }
}
