<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold">{{ $news->title }}</h1>
    <p class="text-gray-500">{{ $news->source->name }} - {{ $news->created_at->format('Y-m-d') }}</p>
    <img src="{{ $news->image_url }}" alt="News Image" class="w-full h-64 object-cover my-4">

    <!-- پخش کننده صوتی -->
    <audio controls class="w-full">
        <source src="{{ $news->audio_url }}" type="audio/mpeg">
        مرورگر شما از پخش صوتی پشتیبانی نمی‌کند.
    </audio>

    <!-- متن خبر (مخفی برای کاربران، فقط برای SEO) -->
    <div class="hidden">
        {{ $news->content }}
    </div>

    <a href="{{ $news->original_link }}" target="_blank" class="text-blue-600 underline">لینک اصلی خبر</a>
</div>
