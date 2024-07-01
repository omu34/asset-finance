<?php

// namespace App\Livewire;

// use App\Models\LatestVideos as ModelsLatestVideos;
// use Livewire\Component;
// use Livewire\WithFileUploads;
// use Carbon\Carbon;
// use Illuminate\Support\Str;
// use App\Models\File;

// class LatestVideos extends Component
// {
//     use WithFileUploads;

//     public $videos;
//     public $selectedLatestVideosId;
//     public $selectedVideoIndex = 0;
//     public $showModal = false;
//     public $showVideos = false;
//     public $file;
//     public $uploadError;
//     public $newVideo = [
//         'latest_videos' => '',
//         'button_text' => '',
//         'day' => '',
//         'views' => '',
//         'description' => '',
//         'likes' => '',
//         'link' => '',
//         'file' => '',
//     ];


//     public function uploadVideo()
//     {
//         $this->validate([
//             'file' => 'required|mimes:mp4,mov|max:20480', // Adjust validation rules as needed
//         ]);

//         $filename = time() . '.' . $this->file->getClientOriginalExtension();
//         $this->file->storeAs('videos', $filename); // Store in 'videos' directory

//         // Save video data to database, including filename
//         ModelsLatestVideos::create([
//             'file' => $filename,
//             'title' => 'Sample Title',
//             'description' => 'Sample Description',
//             'created_at' => now(),
//         ]);

//         $this->file = null;
//         $this->emit('newsUploaded');

//         session()->flash('message', 'Video Uploaded Successfully.');
//     }

//     public function render()
//     {
//         // return view('livewire.latest-videos');
//         return view('livewire.latest-videos', ['videos' => $this->videos]);
//     }
// }










namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LatestVideos as ModelsLatestVideos;
use App\Models\File;
use App\Models\Videos;
use Illuminate\Support\Str;

class LatestVideos extends Component
{
    use WithFileUploads;

    public $videos;
    public $selectedLatestVideosId;
    public $selectedVideoIndex = 0;
    public $showModal = false;
    public $showVideos = false;
    public $file;
    public $uploadError;
    public $newVideo = [
        'latest_videos' => '',
        'button_text' => '',
        'day' => '',
        'views' => '',
        'description' => '',
        'likes' => '',
        'link' => '',
        'file' => '',
    ];

    protected $rules = [
        'file' => 'required|mimes:mp4,mov|max:20480',
        'newVideo.latest_videos' => 'required|string',
        'newVideo.button_text' => 'required|string',
        'newVideo.day' => 'required|string',
        'newVideo.views' => 'required|integer',
        'newVideo.description' => 'required|string',
        'newVideo.likes' => 'required|integer',
        'newVideo.link' => 'nullable|string',
    ];

    public function uploadVideo()
    {
        $this->validate();

        try {
            $filename = time() . '.' . $this->file->getClientOriginalExtension();
            // $filePath = $this->file->storeAs($filename, 'public');
            $filePath = $this->file('file')->store('images', 'public', $filename);


            // Save file data to the database
            $file = File::create([
                'title' => $this->newVideo['latest_videos'],
                'content' => Str::limit(file_get_contents($this->file->getRealPath()), 255),
                'time' => now(),
                'name' => $filename,
                'mime_type' => $this->file->getMimeType(),
                'size' => $this->file->getSize(),
                'file_id' => Str::uuid()->toString(),
                'file_time' => now(),
                'likes' => $this->newVideo['likes'],
                'views' => $this->newVideo['views'],
                'file_path' => $filePath,
            ]);

            // Save video data to the LatestVideos table
            Videos::create([
                'file' => $file->id,
                'latest_videos' => $this->newVideo['latest_videos'],
                'button_text' => $this->newVideo['button_text'],
                'day' => $this->newVideo['day'],
                'views' => $this->newVideo['views'],
                'description' => $this->newVideo['description'],
                'likes' => $this->newVideo['likes'],
                'link' => $this->newVideo['link'],
            ]);

            // Reset file input and emit an event
            $this->file = null;
            $this->emit('videoUploaded');

            session()->flash('message', 'Video Uploaded Successfully.');
        } catch (\Exception $e) {
            $this->uploadError = 'Failed to upload video: ' . $e->getMessage();
        }
    }

    public function render()
    {
        $this->videos =Videos::all();
        return view('livewire.latest-videos', ['videos' => $this->videos]);
    }
}


