<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت خبری</title>

    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "m30vdzf781");
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <script src="/css/tailwindcss.es"></script>

    <!-- اضافه کردن فونت یکان -->
    <link href="/css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Yekan', sans-serif;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<!-- ناوبری -->
<nav class="bg-gradient-to-r from-blue-600 to-purple-700 shadow-lg text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- لوگو -->
                <div class="flex-shrink-0 flex items-center text-lg font-bold">
                    <a href="{{ route('home') }}" class="text-white">🌍 خبرگزاری</a>
                </div>

                <!-- لینک‌های دسکتاپ -->
                <div class="hidden md:flex space-x-4 rtl:space-x-reverse ml-10">
                    <a href="{{ route('home') }}" class="nav-link">صفحه اصلی</a>

                    @auth
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">داشبورد ادمین</a>
                            <a href="{{ route('admin.news.add') }}" class="nav-link">افزودن خبر</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="nav-link">داشبورد خبرنگار</a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- منوی موبایل -->
            <div class="-mr-2 flex items-center md:hidden">
                <button id="mobile-menu-btn" class="inline-flex items-center justify-center p-2 rounded-md text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- منوی موبایل -->
    <div id="mobile-menu" class="hidden md:hidden bg-blue-700 border-t">
        <a href="{{ route('home') }}" class="block px-4 py-2 text-white">صفحه اصلی</a>

        @auth
            @if(auth()->user()->is_admin)
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-white">داشبورد ادمین</a>
                <a href="{{ route('admin.news.add') }}" class="block px-4 py-2 text-white">افزودن خبر</a>
            @else
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-white">داشبورد خبرنگار</a>
            @endif
        @endauth
    </div>
</nav>

<div class="container mx-auto p-4">
    {{ $slot }}
</div>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

@livewireScripts
</body>
</html>
