<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">داشبورد خبرنگار</h1>

    @if($newsList->isEmpty())
        <p class="text-gray-500">شما هیچ خبری برای ضبط ندارید.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($newsList as $news)
                <a href="{{ route('news.record', $news->id) }}" class="block bg-white shadow-md rounded-lg p-4">
                    <img src="{{ $news->image_url }}" class="w-full h-40 object-cover rounded">
                    <h2 class="text-lg font-semibold mt-2">{{ $news->title }}</h2>
                    <p class="text-gray-500">{{ $news->source->name }}</p>
                </a>
            @endforeach
        </div>
    @endif
</div>
