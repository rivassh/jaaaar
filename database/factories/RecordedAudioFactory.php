<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecordedAudio>
 */
class RecordedAudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'news_id' => \App\Models\News::factory(),
            'user_id' => \App\Models\User::factory(),
            'audio_path' => 'recordings/sample.mp3', // فایل تستی
            'status' => 'pending',
        ];
    }
}
