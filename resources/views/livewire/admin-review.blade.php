<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold">مدیریت ضبط‌های صوتی خبرنگاران</h1>

    @if (session()->has('message'))
        <div class="text-green-500 mt-2">{{ session('message') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        @foreach ($recordings as $recording)
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h2 class="font-semibold">{{ $recording->news->title }}</h2>
                <p class="text-sm text-gray-500">خبرنگار: {{ $recording->user->name }}</p>

                <!-- پخش صوت -->
                <audio controls class="w-full mt-2">
                    <source src="{{ asset('storage/' . $recording->audio_path) }}" type="audio/mpeg">
                    مرورگر شما از پخش صوتی پشتیبانی نمی‌کند.
                </audio>

                <div class="flex space-x-2 mt-4">
                    <button wire:click="approve({{ $recording->id }})" class="bg-green-500 text-white px-4 py-2 rounded">
                        تایید
                    </button>
                    <button wire:click="reject({{ $recording->id }})" class="bg-red-500 text-white px-4 py-2 rounded">
                        رد
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
