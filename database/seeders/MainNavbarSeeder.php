<?php

namespace Database\Seeders;

use App\Models\MainNavbar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainNavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $mainNavs=[
        'name' =>'name',
        'link'=>'link'
      ];
      $mainNavData =  $mainNavs;
      \App\Models\MainNavbar::insert($mainNavData);






      $mainnavbars = [
        [
            ['name' => 'Home', 'link' => 'https://kplc.co.ke' ],
        ],
        [
            ['name' => 'Gallery', 'link' => 'https://kplc.co.ke'],
        ],
        [

            ['name' => 'Videos', 'link' => 'https://kplc.co.ke'],
        ]
    ];

    MainNavbar::insert($mainnavbars);
    }
}
