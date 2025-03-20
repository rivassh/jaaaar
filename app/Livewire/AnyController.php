<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AnyController extends Component
{

    public function render()
    {
        dd(1);
        Log::info('ok');
        return true;
    }
}
