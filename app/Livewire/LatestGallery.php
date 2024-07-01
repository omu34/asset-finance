<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LatestGallery as ModelsLatestGallery;
use App\Models\File;
use App\Models\Gallery;
use Illuminate\Support\Str;

class LatestGallery extends Component
{
    use WithFileUploads;

    public $galleries;
    public $selectedLatestGalleryId;
    public $selectedGalleryIndex = 0;
    public $showModal = false;
    public $showGallery = false;
    public $file;
    public $uploadError;
    public $galleryGallery = [
        'latest_Gallery' => '',
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
        'galleryGallery.latest_Gallery' => 'required|string',
        'galleryGallery.button_text' => 'required|string',
        'galleryGallery.day' => 'required|string',
        'galleryGallery.views' => 'required|integer',
        'galleryGallery.description' => 'required|string',
        'galleryGallery.likes' => 'required|integer',
        'galleryGallery.link' => 'nullable|string',
    ];

    public function uploadGallery()
        {
        $this->validate();

        try {
            $filename = time() . '.' . $this->file->getClientOriginalExtension();
            // $filePath = $this->file->storeAs('images', $filename, 'public');
            $filePath = $this->file('file')->store('images', 'public', $filename);


            $file = File::create([
                'title' => $this->galleryGallery['latest_Gallery'],
                'content' => Str::limit(file_get_contents($this->file->getRealPath()), 255),
                'time' => now(),
                'name' => $filename,
                'mime_type' => $this->file->getMimeType(),
                'size' => $this->file->getSize(),
                'file_id' => Str::uuid()->toString(),
                'file_time' => now(),
                'likes' => $this->galleryGallery['likes'],
                'views' => $this->galleryGallery['views'],
                'file_path' => $filePath,
            ]);

            Gallery::create([
                'file' => $file->id,
                'latest_Gallery' => $this->galleryGallery['latest_Gallery'],
                'button_text' => $this->galleryGallery['button_text'],
                'day' => $this->galleryGallery['day'],
                'views' => $this->galleryGallery['views'],
                'description' => $this->galleryGallery['description'],
                'likes' => $this->galleryGallery['likes'],
                'link' => $this->galleryGallery['link'],
            ]);

            $this->file = null;
            $this->emit('galleryUploaded');

            session()->flash('message', 'gallery Uploaded Successfully.');
        } catch (\Exception $e) {
            $this->uploadError = 'Failed to upload gallery: ' . $e->getMessage();
        }
    }

    public function render()
    {
        $this->galleries = Gallery::all();
        return view('livewire.latest-Gallery', ['Gallery' => $this->galleries]);
    }
}





