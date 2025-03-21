<div>
    <!-- اسلایدر اخبار -->
    <div class="relative w-full">
        <div class="flex overflow-x-auto scrollbar-hide">
            @foreach ($newsGroups->take(5) as $source)
                @foreach ($newses as $news)
                    @if(!is_array($news) && $source->id === $news?->source_id)
                    <div class="w-full min-w-full">
                        <img src="{{ $news->image_url }}" alt="News Image" class="w-full h-64 object-cover">
                        <div class="absolute bottom-0 left-0 p-4 bg-black bg-opacity-50 text-white">
                            <h2 class="text-lg font-bold">{{ $news->title }}</h2>
                            <p class="text-sm">{{ $source->name }}</p>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>

    <!-- لیست منابع خبری -->
    <div class="flex overflow-x-auto space-x-4 mt-4 p-2 bg-gray-100 rounded-lg">
        @foreach ($sources as $source)
            <button class="bg-blue-500 text-white px-4 py-2 rounded-full">{{ $source->name }}</button>
        @endforeach
    </div>

    <!-- بخش اخبار -->
    @foreach ($newsGroups as $source)

        <div class="mt-6">
            <h3 class="text-xl font-bold">{{ $source->name }}</h3>
            <div class="flex overflow-x-auto space-x-4">

                @foreach ($newses as $news)
                    @if(!is_array($news) && $source->id === $news?->source_id)
                        {{-- @todo --}}
                    <a href="{{ route('news.show', $news->id) }}" class="block w-60 bg-white shadow-lg rounded-lg">
                        <img src="{{ $news->image_url }}" alt="News Image" class="w-full h-32 object-cover rounded-t-lg">
                        <div class="p-2">
                            <h4 class="text-sm font-semibold">{{ $news->title }}</h4>
                        </div>
                    </a>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</div>
