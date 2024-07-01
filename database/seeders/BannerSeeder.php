<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{


    public function run(): void
    {
        $banners = [
            [
                'banner_content' => 'Kenya Power',
                'image_path' => 'banner.jpg',
            ],

        ];

        foreach ($banners as $banner) {
            try {
                Banner::create($banner);
                echo "Created banner: " . $banner['banner_content'] . "\n";
            } catch (\Exception $e) {
                echo "Error creating banner: " . $e->getMessage() . "\n";
            }
        }
    }
}
