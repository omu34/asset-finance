<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContentGalleryController;
use App\Http\Controllers\FeaturedItemsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FileUploaderController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {  return view('welcome');});
Route::get('/single-gallery', function () {return view('pages.single-gallery');});
Route::get('/category', function () {return view('pages.category');});
Route::get('/latest-news', function () {return view('pages.single-news');});
Route::get('/latest-gallery', function () {return view('pages.single-gallery');});
Route::get('/latest-videos', function () {return view('pages.single-videos');});
Route::get('/featured-news', function () {return view('pages.single-featured-news');});
Route::get('/show-posts', function () {return view('pages.show-post');});
Route::get('/search', function () {return view('search.search');});
Route::get('/featured-items', function () {return view('pages.single-featured-items');});


Route::get('/content', [ContentController::class, 'index'])->name('home');

Route::get('/latest-news', function () {return view('single-news');});
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/latest-videos', function () {return view('single-videos');});
Route::get('/videos/{id}', [VideosController::class, 'show'])->name('videos.show');

Route::get('/latest-gallery', function () {return view('single-gallery');});
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');

Route::get('/featured', function () {return view('welcome');});
Route::get('/featured/{id}', [FeaturedItemsController::class, 'index'])->name('featured.index');
Route::get('/featured/{id}', [FeaturedItemsController::class, 'show'])->name('featured.show');

Route::get('/search', [SearchController::class, 'search'])->name('search.search');


Route::post('/upload', [FileUploaderController::class, 'store'])->name('upload');












