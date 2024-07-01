<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Socials;
use App\Nova\Socials as NovaSocials;

class SocialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $socials = [
            [
                ['name' => 'Facebook', 'url' => 'https://facebook.com', 'image_path' => 'facebook.svg'],

            ],
            [
                ['name' => 'YouTube', 'url' => 'https://youtube.com', 'image_path' => 'facebook.svg'],

            ],
            [

                ['name' => 'Instagram', 'url' => 'https://instagram.com', 'image_path' => 'facebook.svg'],

            ],

            [

                ['name' => 'LinkedIn', 'url' => 'https://linkedin.com', 'image_path' => 'facebook.svg'],

            ],
            [

                ['name' => 'x(Twitter)', 'url' => 'https://twitter.com', 'image_path' => 'facebook.svg'],

            ],
            [

                ['name' => 'TikTok', 'url' => 'https://tiktok.com', 'image_path' => 'facebook.svg'],

            ],
            [

                ['name' => 'TikTok', 'url' => 'https://tiktok.com', 'image_path' => 'facebook.svg'],

            ],
            [

                ['name' => 'Flickr', 'url' => 'https://snapchat.com', 'image_path' => 'facebook.svg'],
            ]
        ];

        Socials::insert($socials);
    }
}
