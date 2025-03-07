<div class="max-w-md mx-auto p-6 bg-white shadow-md rounded">
    <h2 class="text-lg font-bold mb-4">ورود با شماره موبایل</h2>

    @if (!$isOtpSent)
        <input type="text" wire:model="phone" class="w-full p-2 border rounded" placeholder="شماره موبایل">
        <button wire:click="sendOtp" class="mt-2 w-full bg-blue-500 text-white py-2 rounded">ارسال کد</button>
    @else
        <input type="text" wire:model="otp" class="w-full p-2 border rounded" placeholder="کد تایید">
        <button wire:click="verifyOtp" class="mt-2 w-full bg-green-500 text-white py-2 rounded">تایید</button>
    @endif
</div>
