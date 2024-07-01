<?php

namespace App\Livewire;

use Livewire\Component;

class Content extends Component
{
    public $posts = [];
    public $showModal = false;
    public $selectedPostIndex;

    public function mount($posts)
    {
        $this->posts = $posts;
    }

    public function selectPost($index)
    {
        $this->selectedPostIndex = $index;
        $this->showModal = true;
    }

    public function previousPost()
    {
        $this->selectedPostIndex = max($this->selectedPostIndex - 1, 0);
    }

    public function nextPost()
    {
        $this->selectedPostIndex = min($this->selectedPostIndex + 1, count($this->posts) - 1);
    }

    public function closePopup()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.content');
    }
}
