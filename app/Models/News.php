<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'source_id',
        'original_link',
    ];

    public function source()
    {
        return $this->belongsTo(NewsSource::class, 'source_id');
    }

    public function recordings()
    {
        return $this->hasMany(RecordedAudio::class, 'news_id');
    }
}
