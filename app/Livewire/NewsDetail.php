<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;

class NewsDetail extends Component
{
    public $news;

    public function mount($id)
    {
        $this->news = News::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.news-detail');
    }
}
