<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LatestItem;
use App\Models\News;

class NewsController extends Controller
{
    // public function show($id)
    // {
    //     $newsItem = LatestItem::findOrFail($id);

    //     return view('news.show', ['newsItem' => $newsItem]);
    // }


    public function index()
    {
        $news = News::latest()->take(4)->get();

         $newsItems = $news->sortByDesc('created_at');

        return view('news.index', compact(' newsItems'));
    }

    public function show($id)
    {

         $singleNews = News::findOrFail($id ?? News::where('id', $id)->first());

        if (! $singleNews) {
            abort(404, 'News item not found');
        }

        return view('news.show', compact('singleNews'));
    }
}
