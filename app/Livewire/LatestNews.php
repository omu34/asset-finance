<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LatestNews as ModelsLatestNews;
use App\Models\File;
use App\Models\News;
use Illuminate\Support\Str;

class LatestNews extends Component
{
    use WithFileUploads;

    public $news;
    public $selectedLatestNewsId;
    public $selectedNewsIndex = 0;
    public $showModal = false;
    public $showNews = false;
    public $file;
    public $uploadError;
    public $newNews = [
        'latest_news' => '',
        'button_text' => '',
        'day' => '',
        'views' => '',
        'description' => '',
        'likes' => '',
        'link' => '',
        'file' => '',
    ];

    protected $rules = [
        'file' => 'required|mimes:mp4,mov|max:20480', // 20MB max
        'newNews.latest_news' => 'required|string',
        'newNews.button_text' => 'required|string',
        'newNews.day' => 'required|string',
        'newNews.views' => 'required|integer',
        'newNews.description' => 'required|string',
        'newNews.likes' => 'required|integer',
        'newNews.link' => 'nullable|string',
    ];

    public function uploadNews()
    {
        $this->validate();

        try {
            $filename = time() . '.' . $this->file->getClientOriginalExtension();
            $filePath = $this->file->storeAs('images', $filename, 'public');
            // $filePath = $this->file('file')->store('images', 'public', $filename);


            $file = File::create([
                'title' => $this->newNews['latest_news'],
                'content' => Str::limit(file_get_contents($this->file->getRealPath()), 255),
                'time' => now(),
                'name' => $filename,
                'mime_type' => $this->file->getMimeType(),
                'size' => $this->file->getSize(),
                'file_id' => Str::uuid()->toString(),
                'file_time' => now(),
                'likes' => $this->newNews['likes'],
                'views' => $this->newNews['views'],
                'file_path' => $filePath,
            ]);

            News::create([
                'file' => $file->id,
                'latest_news' => $this->newNews['latest_news'],
                'button_text' => $this->newNews['button_text'],
                'day' => $this->newNews['day'],
                'views' => $this->newNews['views'],
                'description' => $this->newNews['description'],
                'likes' => $this->newNews['likes'],
                'link' => $this->newNews['link'],
            ]);

            $this->file = null;
            $this->emit('newsUploaded');

            session()->flash('message', 'news Uploaded Successfully.');
        } catch (\Exception $e) {
            $this->uploadError = 'Failed to upload news: ' . $e->getMessage();
        }
    }

    public function render()
    {
        $this->news = News::all();
        return view('livewire.latest-news', ['news' => $this->news]);
    }
}





