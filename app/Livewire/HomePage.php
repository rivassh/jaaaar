<?php

namespace App\Livewire;

use App\Models\News;
use App\Models\NewsSource;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page', [
            'sources' => NewsSource::all(),
            'newsGroups' => NewsSource::all(),
            'newses' => News::query()->whereHas('recordings',function($query){$query->where('status', 'approved');})->get()
            ]);
    }
}
