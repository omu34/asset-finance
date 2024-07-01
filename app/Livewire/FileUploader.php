<?php

// namespace App\Http\Livewire;

// use Livewire\Component;
// use Livewire\WithFileUploads;
// use Illuminate\Support\Str;
// use App\Models\File;
// use App\Models\LatestVideos;
// use App\Models\LatestNews;
// use App\Models\LatestGallery;
// use Carbon\Carbon;

// class FileUploader extends Component
// {
//     use WithFileUploads;

//     public $file;
//     public $type; // 'video', 'news', 'gallery'

//     protected $rules = [
//         'file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
//         'type' => 'required|string|in:latestVideos,latestNews,latestGallery',
//     ];

//     public function upload()
//     {
//         $this->validate();

//         $filePath = $this->file->store('files', 'public');

//         $file = File::create([
//             'name' => $this->file->getClientOriginalName(),
//             'time' => Carbon::now(),
//             'file_path' => $filePath,
//             'mime_type' => $this->file->getMimeType(),
//             'size' => $this->file->getSize(),
//             'file_id' => Str::uuid()->toString(),
//         ]);

//         if ($this->type === 'video') {
//             LatestVideos::create(['file_id' => $file->id]);
//         } elseif ($this->type === 'news') {
//             LatestNews::create(['file_id' => $file->id]);
//         } elseif ($this->type === 'gallery') {
//             LatestGallery::create(['file_id' => $file->id]);
//         }

//         session()->flash('message', 'File uploaded successfully.');
//     }

//     public function render()
//     {
//         return view('livewire.file-uploader');
//     }
// }







namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\File;
use App\Models\Gallery;
use App\Models\LatestVideos;
use App\Models\LatestNews;
use App\Models\LatestGallery;
use App\Models\News;
use App\Models\Videos;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FileUploader extends Component
{
    use WithFileUploads;

    public $file;
    public $type;
    public $likes = 0;
    public $views = 0;

    protected $rules = [
        'file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
        'type' => 'required|string|in:latestVideos,latestNews,latestGallery',
    ];

    public function upload()
    {
        $this->validate();

        try {
            $fileTime = $this->file->getMTime();
            $fileName = $this->file->getClientOriginalName();
            $content = $this->file->getClientOriginalName();
            $fileSize = $this->file->getSize();
            $fileMimeType = $this->file->getMimeType();
            $fileTime = date('Y-m-d H:i:s', $fileTime);
            $fileId = Str::uuid()->toString();
            $fileLink = $this->file->store     ('images', 'public');
            // $fileLink = $this->file('file')->store('images', 'public');


            $media = File::create([
                'type' => $this->type,
                'time' => $fileTime,
                'name' => $fileName,
                'mime_type' => $fileMimeType,
                'size' => $fileSize,
                'file_id' => $fileId,
                'file_time' => $fileTime,
                'likes' => $this->likes,
                'views' => $this->views,
                'file_path' => $fileLink,
            ]);

            switch ($this->type) {
                case 'latestVideos':
                    Videos::create(['file_id' => $media->id]);
                    break;
                case 'latestNews':
                    News::create(['file_id' => $media->id]);
                    break;
                case 'latestGallery':
                    Gallery::create(['file_id' => $media->id]);
                    break;
            }

            session()->flash('message', 'File uploaded successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to upload media: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.file-uploader');
    }
}
