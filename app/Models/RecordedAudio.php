<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordedAudio extends Model
{
    use HasFactory;

    protected $table = 'recorded_audios';
    protected $fillable = ['audio_path','status'];

    public function news()
    {
        return $this->hasMany(News::class, 'news_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
