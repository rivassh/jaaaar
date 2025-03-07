<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsSource;
use App\Models\RecordedAudio;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ایجاد کاربر ادمین
        $admin = User::factory()->create([
            'name' => 'ادمین',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        // ایجاد خبرنگار
        $journalist = User::factory()->create([
            'name' => 'خبرنگار',
            'email' => 'journalist@example.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);

        // ایجاد منابع خبری
        $sources = NewsSource::factory()->count(3)->create();

        // ایجاد اخبار برای هر منبع خبری
        $sources->each(function ($source) use ($journalist) {
            $newsItems = News::factory()->count(5)->create([
                'source_id' => $source->id,
            ]);

            // ایجاد ضبط صوت برای برخی از اخبار
            $newsItems->each(function ($news) use ($journalist) {
                if (rand(0, 1)) { // 50% احتمال برای داشتن ضبط صدا
                    RecordedAudio::factory()->create([
                        'news_id' => $news->id,
                        'user_id' => $journalist->id,
                        'audio_path' => 'recordings/sample.mp3',
                        'status' => rand(0, 1) ? 'approved' : 'pending',
                    ]);
                }
            });
        });

        $this->command->info('Seeder با موفقیت اجرا شد و داده‌ها مقداردهی شدند.');
    }
}
