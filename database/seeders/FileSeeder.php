<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('files')->truncate();
        DB::table('files')->insert([
            [
                'type' => 'video',
                'description' => 'test description',
                'link' => 'test link',
                'file_path' => 'drink.mp4',
                'name' => null,
                'mime_type' => 'null',
                'likes' => 10,
                'views' => 50,
                'extension'=> null,
                'file_time'=> null,
                'size'=> 1000, // Ensure size is an integer
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'gallery',
                'description' => 'test description',
                'link' => 'test link',
                'file_path' => '2.jpg',
                'name' => 'latest News',
                'mime_type' => 'image/jpg',
                'likes' => 10,
                'views' => 50,
                'extension' => 'jpg', // Ensure extension is provided
                'file_time' => '2022-10-10 10:10:10', // Ensure file_time is provided
                'size'=> 1000, // Ensure size is an integer
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'news',
                'description' => 'test description',
                'link' => 'test link',
                'file_path' => 'test-1.jpg', // Correct the duplicate key 'file_path'
                'name' => 'latest Gallery',
                'mime_type' => 'image/jpg',
                'likes' => 10,
                'views' => 50,
                'extension' => 'jpg', // Ensure extension is provided
                'file_time' => '2022-10-10 10:10:10', // Ensure file_time is provided
                'size'=> 1000, // Ensure size is an integer
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
