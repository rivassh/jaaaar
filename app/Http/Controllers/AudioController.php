<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\RecordedAudio;
use Illuminate\Support\Facades\Auth;

class AudioController extends Controller
{
    public function save(Request $request, $newsId)
    {

        try {
            $request->validate([
                'audio' => 'required|file|max:10240',
            ]);

            $path = $request->file('audio')->store('recordings', 'public');

            RecordedAudio::create([
                'news_id' => $newsId,
                'user_id' => Auth::id(),
                'audio_path' => $path,
                'status' => 'pending',
            ]);

        }catch (\Throwable $throwable){
            dd($throwable);
        }
        return response()->json(['message' => 'ضبط با موفقیت ذخیره شد.']);
    }
}
