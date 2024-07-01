<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {



        $this->call([
            FileSeeder::class,
            HeaderNavigationSeeder::class,
            BasicBannerSeeder::class,
            FeaturedNewsSeeder::class,
            VideosSeeder::class,
            NewsSeeder::class,
            GallerySeeder::class,
            BannerSeeder::class,
            BreadcrumbSeeder::class,
            TagsSeeder::class,
            SearchSeeder::class,
            FooterSeeder::class,
        ]);
    }
}
