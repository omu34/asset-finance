<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'tag1' => 'Home',
            'tag2' => 'Links',
            'tag_content'=>'tag pages'
        ];

        $tagData = $tags;

        $tagData['tag_content'] = "Sample content for the main page";

        Tags::create($tagData);
    }
}
