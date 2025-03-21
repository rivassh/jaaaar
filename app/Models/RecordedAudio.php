<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordedAudio extends Model
{
    use HasFactory;

    protected $table = 'recorded_audios';
    protected $fillable = ['audio_path','status','news_id','user_id'];

    public function news()
    {
        return $this->hasOne(News::class,'id','news_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
