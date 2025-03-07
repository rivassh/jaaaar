<?php

namespace App\Livewire;

use App\Models\News;
use App\Models\RecordedAudio;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewsRecord extends Component
{
    use WithFileUploads;

    public $news;
    public $audio;

    public function mount($id)
    {
        $this->news = News::findOrFail($id);
    }

    public function saveRecording()
    {
        $this->validate([
            'audio' => 'required|mimes:mp3,wav|max:10240', // حداکثر 10MB
        ]);

        $path = $this->audio->store('recordings', 'public');

        RecordedAudio::create([
            'news_id' => $this->news->id,
            'user_id' => Auth::id(),
            'audio_path' => $path,
            'status' => 'pending',
        ]);

        session()->flash('message', 'صدای شما با موفقیت ذخیره شد و در انتظار تأیید است.');
    }
    public function render()
    {
        return view('livewire.news-record');
    }
}
