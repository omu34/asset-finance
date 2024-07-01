<?php
namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
               'latest_news' => 'Latest News',
                'description' => 'The Summit on Clean Cooking in Africa 2024 (Paris, France)',
                'views' => 100,
                'likes' => 50,
                'link' => 'https://example.com/intro-to-laravel',
                'file_path' => 'test-1.jpg',
                'button_text' => 'view more',
                'file_name' => null, // Add default value
                'mime_type' => 'image/jpg', // Ensure this is included
                'extension' => null, // Ensure this is included
                'file_time' => null,
                'size'=> 1000,
                'file_id' => null, // Default to null if not available
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'latest_news' => 'Latest News',
                'description' => 'The Summit on Clean Cooking in Africa 2024 (Paris, France)',
                'views' => 100,
                'likes' => 50,
                'link' => 'https://example.com/intro-to-laravel',
                'file_path' => 'test-1.jpg',
                'button_text' => 'view more',
                'file_name' => null, // Add default value
                'mime_type' => 'image/jpg', // Ensure this is included
                'extension' => null, // Ensure this is included
                'file_time' => null,
                'size'=> 1000,
                'file_id' => null, // Default to null if not available
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'latest_news' => 'Latest News',
                'description' => 'The Summit on Clean Cooking in Africa 2024 (Paris, France)',
                'views' => 100,
                'likes' => 50,
                'link' => 'https://example.com/intro-to-laravel',
                'file_path' => 'test-1.jpg',
                'button_text' => 'view more',
                'file_name' => null, // Add default value
                'mime_type' => 'image/jpg', // Ensure this is included
                'extension' => null, // Ensure this is included
                'file_time' => null,
                'size'=> 1000,
                'file_id' => null, // Default to null if not available
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        News::insert($news);
    }
}
