<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class JournalistDashboard extends Component
{
    public $newsList;

    public function mount()
    {
        // اگر کاربر ادمین باشد، به داشبورد ادمین هدایت شود
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        // دریافت خبرهایی که به خبرنگار اختصاص داده شده است
        $this->newsList = News::whereDoesntHave('recordings', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
    }

    public function render()
    {
        return view('livewire.journalist-dashboard');
    }
}
