<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RecordedAudio;

class AdminReview extends Component
{
    public function render()
    {
        return view('livewire.admin-review', [
            'recordings' => RecordedAudio::where('status', 'pending')->with('news', 'user')->get()
        ]);
    }

    public function approve($id)
    {
        $recording = RecordedAudio::findOrFail($id);
        $recording->update(['status' => 'approved']);

        session()->flash('message', 'صدای ضبط شده تأیید شد و منتشر شد.');
    }

    public function reject($id)
    {
        $recording = RecordedAudio::findOrFail($id);
        $recording->update(['status' => 'rejected']);

        session()->flash('message', 'صدای ضبط شده رد شد.');
    }
}
