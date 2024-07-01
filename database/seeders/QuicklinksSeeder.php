<?php

namespace Database\Seeders;

use App\Nova\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuickLinks as NovaQuickLinks;
use App\Nova\QuickLinks;

class QuicklinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quicklinks = [
            [
                ['name' => 'DashBoard', 'url' => 'https://Dashboard', 'image' => 'badge.png'],
            ],
            [
                ['name' => 'Messages', 'url' => 'https://messages', 'image' => 'rep.svg'],
            ],
            [

                ['name' => 'Notifications', 'url' => 'https://notifications', 'image' => 'badge.svg'],
            ]
        ];

        QuickLinks::insert($quicklinks);
    }
}
