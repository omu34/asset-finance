<?php

// namespace App\Livewire;
// use Livewire\Component;
// use App\Models\LatestGallery;
// use App\Models\LatestVideos;
// use App\Models\LatestNews;
// use Illuminate\Support\Collection;

// class FeaturedItems extends Component
// {
//     public Collection $featuredItems;

//     public function mount()
//     {
//         $galleries = LatestGallery::latest()->take(4)->get();
//         $videos = LatestVideos::latest()->take(4)->get();
//         $news = LatestNews::latest()->take(4)->get();

//         $this->featuredItems = $galleries->merge($videos)->merge($news)->sortByDesc('created_at');
//     }

//     public function render()
//     {
//         return view('livewire.featured-items', ['featuredItems' => $this->featuredItems]);
//     }
// }



namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;
use App\Models\LatestGallery;
use App\Models\LatestVideos;
use App\Models\LatestNews;
use App\Models\News;
use App\Models\Videos;
use Illuminate\Support\Collection;

class FeaturedItems extends Component
{
    public array $featuredItems = [];

    public function mount()
    {
        $galleries = Gallery::latest()->take(4)->get();
        $videos = Videos::latest()->take(4)->get();
        $news = News::latest()->take(4)->get();

        $collection = $galleries->merge($videos)->merge($news)->sortByDesc('created_at');

        $this->featuredItems = $collection->values()->toArray();
    }

    public function render()
    {
        return view('livewire.featured-items', ['featuredItems' => $this->featuredItems]);
    }
}

