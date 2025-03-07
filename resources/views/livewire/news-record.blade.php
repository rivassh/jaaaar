<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold">{{ $news->title }}</h1>
    <p class="text-gray-500">{{ $news->source->name }} - {{ $news->created_at->format('Y-m-d') }}</p>
    <img src="{{ $news->image }}" class="w-full h-64 object-cover my-4">

    <div class="bg-gray-100 p-4 rounded-lg">
        <p>{{ $news->content }}</p>
    </div>

    <!-- ضبط صدا -->
    <div class="mt-4">
        <input type="file" wire:model="audio" accept="audio/*" class="block w-full border p-2 rounded">
        <button wire:click="saveRecording" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">ارسال ضبط</button>
        @error('audio') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    @if (session()->has('message'))
        <div class="text-green-500 mt-2">{{ session('message') }}</div>
    @endif
</div>
