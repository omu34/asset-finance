<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use App\Models\Videos;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $latestVideos = Videos::latest()->take(10)->pluck('thumbnail_url');
        $latestGallery =Gallery::latest()->take(10)->pluck('image_url');
        $latestNews = News::latest()->take(10)->pluck('image_url');

        return view('content.index', compact('latestVideos', 'latestGallery', 'latestNews'));
    }

    public function latestVideos()
    {
        $latestVideos = Videos::latest()->take(10)->pluck('thumbnail_url');
        return view('content.latest-videos', compact('latestVideos'));
    }

    public function latestGallery()
    {
        $latestGallery = Gallery::latest()->take(10)->pluck('image_url');
        return view('content.latest-gallery', compact('latestGallery'));
    }

    public function latestNews()
    {
        $latestNews = News::latest()->take(10)->pluck('image_url');
        return view('content.latest-news', compact('latestNews'));
    }

}
