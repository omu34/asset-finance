<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Gallery;
use App\Models\LatestVideos;
use App\Models\News;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploaderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
            'type' => 'required|string|in:latestVideos,latestNews,latestGallery',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('images', 'public');
        // $filePath = $request->file('file')->store('images', 'public');

        $fileRecord = File::create([
            'title' => $request->input('title', ''),
            'name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'time' => now(),
            'likes' => $request->input('likes', 0),
            'views' => $request->input('views', 0),
            'file_path' => $filePath,
        ]);

        switch ($request->input('type')) {
            case 'latestVideos':
                $latestVideo = Videos::create([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'views' => $request->input('views', 0),
                    'likes' => $request->input('likes', 0),
                    'link' => $request->input('link'),
                    'file' => $fileRecord->id,
                ]);
                $latestVideo->files()->save($fileRecord);
                break;

            case 'latestNews':
                $latestNews = News::create([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'views' => $request->input('views', 0),
                    'likes' => $request->input('likes', 0),
                    'link' => $request->input('link'),
                    'file' => $fileRecord->id,
                ]);
                $latestNews->files()->save($fileRecord);
                break;

            case 'latestNews':
                $latestGallery = Gallery::create([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'views' => $request->input('views', 0),
                    'likes' => $request->input('likes', 0),
                    'link' => $request->input('link'),
                    'file' => $fileRecord->id,
                ]);
                $latestGallery->files()->save($fileRecord);
                break;
                // Handle other types similarly
        }

        return response()->json(['message' => 'File uploaded successfully', 'file' => $fileRecord], 201);
    }

    public function download($id)
    {
        $file = File::findOrFail($id);

        if (!Storage::disk('public')->exists($file->file_path)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        return response()->download(storage_path('app/public/' . $file->file_path), $file->name);
    }

    public function destroy($id)
    {
        $file = File::findOrFail($id);

        Storage::disk('public')->delete($file->file_path);
        $file->delete();

        return response()->json(['message' => 'File deleted successfully'], 200);
    }
}
