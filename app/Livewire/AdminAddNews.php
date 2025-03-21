<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;
use App\Models\NewsSource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminAddNews extends Component
{
    use WithFileUploads;

    public $title, $content, $source_id, $original_link, $image;
    public $sources;

    public function mount()
    {
        $this->sources = NewsSource::all();
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'source_id' => 'required|exists:news_sources,id',
            'original_link' => 'nullable|url',
            'image' => 'nullable|image|max:2048', // حداکثر حجم 2MB
        ]);

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('news_images', 'public');
        }

        News::create([
            'title' => $this->title,
            'content' => $this->content,
            'source_id' => $this->source_id,
            'original_link' => $this->original_link,
            'image_url' => $imagePath ? Storage::url($imagePath) : null,
        ]);

        session()->flash('message', 'خبر جدید با موفقیت اضافه شد.');
        $this->reset(['title', 'content', 'source_id', 'original_link', 'image']);
    }

    public function render()
    {
        return view('livewire.admin-add-news');
    }
}
