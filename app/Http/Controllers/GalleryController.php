<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\LatestItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // public function show($id)
    // {
    //     $galleryItem = LatestItem::findOrFail($id);

    //     return view('gallery.show', ['galleryItem' => $galleryItem]);
    // }



    public function index()
    {
        $galleries = Gallery::latest()->take(4)->get();

        $galleryItems = $galleries->sortByDesc('created_at');

        return view('gallery.index', compact(' galleryItems'));
    }

    public function show($id)
    {

        $singleGallery = Gallery::findOrFail($id ?? Gallery::where('id', $id)->first());

        if (!$singleGallery) {
            abort(404, 'Gallery item not found');
        }

        return view('gallery.show', compact('singleGallery'));
    }
}
