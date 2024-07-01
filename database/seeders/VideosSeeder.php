<?php
namespace Database\Seeders;

use App\Models\Videos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            [
                'latest_videos' => 'Latest Videos',
                'description' => 'The Summit on Clean Cooking in Africa 2024 (Paris, France)',
                'views' => 100,
                'likes' => 50,
                'link' => 'https://example.com/intro-to-laravel',
                'file_path' => 'drink.mp4',
                // 'button_text' => 'view more',

                'file_name' => null, // Add default value
                'mime_type' => 'video/mp4', // Ensure this is included
                'extension' => null,
                'file_time' => null, // Ensure this is included
                'size'=> 1000,
                'file_id' => null, // Default to null if not available
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'latest_videos' => 'Latest Videos',
                'description' => 'The Summit on Clean Cooking in Africa 2024 (Paris, France)',
                'views' => 100,
                'likes' => 50,
                'link' => 'https://example.com/intro-to-laravel',
                'file_path' => '/drink.mp4',
                // 'button_text' => 'view more',

                'file_name' => null, // Add default value
                'mime_type' => 'video/mp4', // Ensure this is included
                'extension' => null,
                'file_time' => null, // Ensure this is included
                'size'=> 1000,
                'file_id' => null, // Default to null if not available
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'latest_videos' => 'Latest Videos',
                'description' => 'The Summit on Clean Cooking in Africa 2024 (Paris, France)',
                'views' => 100,
                'likes' => 50,
                'link' => 'https://example.com/intro-to-laravel',
                'file_path' => 'drink.mp4',
                // 'button_text' => 'view more',

                'file_name' => null, // Add default value
                'mime_type' => 'video/mp4', // Ensure this is included
                'extension' => null,
                'file_time' => null, // Ensure this is included
                'size'=> 1000,
                'file_id' => null, // Default to null if not available
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        Videos::insert($videos);
    }
}
