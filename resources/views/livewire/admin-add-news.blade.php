<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">افزودن خبر جدید</h1>

    @if (session()->has('message'))
        <div class="text-green-500">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label class="block text-gray-700">عنوان خبر</label>
            <input type="text" wire:model="title" class="w-full p-2 border rounded">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">محتوای خبر</label>
            <textarea wire:model="content" class="w-full p-2 border rounded"></textarea>
            @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">منبع خبر</label>
            <select wire:model="source_id" class="w-full p-2 border rounded">
                <option value="">انتخاب کنید</option>
                @foreach ($sources as $source)
                    <option value="{{ $source->id }}">{{ $source->name }}</option>
                @endforeach
            </select>
            @error('source_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">لینک اصلی خبر (اختیاری)</label>
            <input type="url" wire:model="original_link" class="w-full p-2 border rounded">
            @error('original_link') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">تصویر خبر (اختیاری)</label>
            <input type="file" wire:model="image" class="w-full p-2 border rounded">
            @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">افزودن خبر</button>
    </form>
</div>
