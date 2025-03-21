<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsSource;
use App\Models\RecordedAudio;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('fa_IR');

        // ایجاد ادمین
        User::factory()->admin()->create([
            'name' => 'مدیر سایت',
            'email' => 'admin@example.com',
            'phone' => config('phone.admin'),
        ]);

        // ایجاد خبرنگار
        User::factory()->create([
            'name' => 'خبرنگار ارشد',
            'email' => 'journalist@example.com',
        ]);

        // ایجاد منابع خبری
        $sources = [
            'خبرگزاری فارس',
            'ایرنا',
            'تسنیم',
            'مهر',
            'ایسنا'
        ];

        foreach ($sources as $sourceName) {
            NewsSource::create(['name' => $sourceName]);
        }

        // آپلود یک تصویر تستی در سرور
        $uploadedImagePath = 'news_images/uploaded_sample.jpg';
        Storage::disk('public')->put($uploadedImagePath, file_get_contents('https://www.dummyimage.com/600x400/000/fff'));

        // ایجاد اخبار
        NewsSource::all()->each(function ($source) use ($faker, $uploadedImagePath) {
            for ($i = 0; $i < 5; $i++) {
                $news = News::factory()->create([
                    'source_id' => $source->id
                ]);

                // ایجاد ضبط صوت برای برخی از اخبار
                if (rand(0, 1)) {
                    RecordedAudio::create([
                        'news_id' => $news->id,
                        'user_id' => User::where('is_admin', false)->inRandomOrder()->first()->id,
                        'audio_path' => 'recordings/sample.mp3',
                        'status' => rand(0, 1) ? 'approved' : 'pending',
                    ]);
                }
            }
        });

        $this->command->info('Seeder با داده‌های فارسی و یک تصویر آپلودی اجرا شد.');
    }
}
