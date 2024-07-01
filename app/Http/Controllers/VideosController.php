<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LatestItem;
use App\Models\LatestVideos;
use App\Models\Videos;

class VideosController extends Controller
{
    // public function show($id)
    // {
    //     $videosItem= LatestItem::findOrFail($id);

    //     return view('video.show', ['videosItem' => $videosItem]);
    // }


    public function index()
    {
        $videos = Videos::latest()->take(4)->get();

         $videoItems = $videos->sortByDesc('created_at');

        return view('video.index', compact(' videoItems'));
    }

    public function show($id)
    {

         $singleVideo = Videos::findOrFail($id ?? Videos::where('id', $id)->first());

        if (! $singleVideo) {
            abort(404, 'Video item not found');
        }

        return view('video.show', compact('singleVideo'));
    }
}
