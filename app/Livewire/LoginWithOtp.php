<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class LoginWithOtp extends Component
{
    public $phone;
    public $otp;
    public $isOtpSent = false;

    public function sendOtp()
    {
        $this->otp = rand(1000, 9999);

        Http::post('https://sms.raygansms.com/send', [
            'apikey' => 'YOUR_API_KEY',
            'number' => $this->phone,
            'message' => "کد تایید شما: $this->otp"
        ]);

        $this->isOtpSent = true;
    }

    public function verifyOtp()
    {
        if ($this->otp == session('otp')) {
            $user = User::firstOrCreate(['phone' => $this->phone]);
            auth()->login($user);
            return redirect()->route('dashboard');
        }
    }
    public function render()
    {
        return view('livewire.login-with-otp');
    }
}
