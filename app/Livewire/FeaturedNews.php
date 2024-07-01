<?php

// namespace App\Livewire;

// use Livewire\Component;
// use App\Models\News;
// use App\Models\Videos;
// use App\Models\Gallery;

// class FeaturedNews extends Component
// {
//     public $showPosts = [];
//     public $dateFrom;
//     public $dateTo;

//     public function mount()
//     {
//         // Set default date range (you can adjust this based on your requirements)
//         $this->dateFrom = now()->subDays(7);
//         $this->dateTo = now();
//     }

//     public function fetchFeaturedPosts()
//     {
//         // Eager-load files with posts based on criteria
//         $latestNews = News::with('file')
//             ->where('created_at', '>=', $this->dateFrom)
//             ->where('created_at', '<=', $this->dateTo)
//             ->get();

//         $latestVideos = Videos::with('file')
//             ->where('created_at', '>=', $this->dateFrom)
//             ->where('created_at', '<=', $this->dateTo)
//             ->get();

//         $latestGallery = Gallery::with('file')
//             ->where('created_at', '>=', $this->dateFrom)
//             ->where('created_at', '<=', $this->dateTo)
//             ->get();

//         // Combine posts and potentially adjust sorting (if needed)
//         $this->showPosts = [];
//         foreach ([$latestNews, $latestVideos, $latestGallery] as $posts) {
//             foreach ($posts as $post) {
//                 $this->showPosts[] = [
//                     'type' => $post->getTable(), // 'news', 'videos', or 'gallery'
//                     'post' => $post->toArray(),
//                     'file' => $post->file ? $post->file->toArray() : null,
//                 ];
//             }
//         }
//     }

//     public function render()
//     {
//         return view('livewire.featured-news');
//     }
// }




namespace App\Livewire;

use Livewire\Component;
use App\Models\Gallery;
use App\Models\Videos;
use App\Models\News;
use Illuminate\Support\Collection;

class FeaturedNews extends Component
{

    public $showPosts = [];
    public $dateFrom;
    public $dateTo;

    public function mount()
    {
        // Set default date range (you can adjust this based on your requirements)
        $this->dateFrom = now()->subDays(7);
        $this->dateTo = now();
    }

    public function fetchFeaturedPosts()
    {
        // Eager-load files with posts based on criteria
        $latestNews = News::with('file')
            ->where('created_at', '>=', $this->dateFrom)
            ->where('created_at', '<=', $this->dateTo)
            ->get();

        $latestVideos = Videos::with('file')
            ->where('created_at', '>=', $this->dateFrom)
            ->where('created_at', '<=', $this->dateTo)
            ->get();

        $latestGallery = Gallery::with('file')
            ->where('created_at', '>=', $this->dateFrom)
            ->where('created_at', '<=', $this->dateTo)
            ->get();

        // Combine posts and potentially adjust sorting (if needed)
        $this->showPosts = [];
        foreach ([$latestNews, $latestVideos, $latestGallery] as $posts) {
            foreach ($posts as $post) {
                $this->showPosts[] = [
                    'type' => $post->getTable(), // 'news', 'videos', or 'gallery'
                    'post' => $post->toArray(),
                    'file' => $post->file ? $post->file->toArray() : null,
                ];
            }
        }
    }

    public function render()
    {
        return view('livewire.featured-news');
    }
    // public array $featuredItems = [];

    // public function mount()
    // {
    //     $galleries = Gallery::latest()->take(4)->get();
    //     $videos = Videos::latest()->take(4)->get();
    //     $news = News::latest()->take(4)->get();

    //     // Merge and sort the collections
    //     $collection = $galleries->merge($videos)->merge($news)->sortByDesc('created_at');

    //     // Convert the collection to an array and assign to the property
    //     $this->featuredItems = $collection->values()->toArray();
    // }

    // public function render()
    // {
    //     return view('livewire.featured-items', ['featuredItems' => $this->featuredItems]);
    // }
}













