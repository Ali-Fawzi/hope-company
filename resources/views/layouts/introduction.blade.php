<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>أمل</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Scheherazade+New:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 flex flex-col min-h-screen font-arabic relative">
    @if (Route::has('login'))
        <div class="sm:fixed flex items-center justify-between sm:p-2 w-full text-right absolute ">
            @auth
                <a href="{{ route(Auth::user()->user_type.'.dashboard') }}">
                    <x-primary-button>
                        {{ __('الصفحة الرئيسية') }}
                    </x-primary-button>
                </a>
            @else
                <a href="{{ route('login') }}">
                    <x-primary-button>
                        {{ __('تسجيل الدخول') }}
                    </x-primary-button>
                </a>
            @endauth
            <div class="px-1 sm:px-4 flex flex-row">
                <section class="px-1 sm:px-4">
                    <a href="#الوصف_العام" class="text-right text-blue-500 hover:text-blue-900 text-sm md:text-lg px-0 sm:px-2">الوصف العام</a>
                    <a href="#الرؤية" class="text-right text-blue-500 hover:text-blue-900 text-sm md:text-lg px-0 sm:px-2 ">الرؤية</a>
                    <a href="#خدمة_الزبون" class="text-right text-blue-500 hover:text-blue-900 text-sm md:text-lg px-0 sm:px-2">خدمة الزبون</a>
                    <a href="#الاهداف" class="text-right text-blue-500 hover:text-blue-900 text-sm md:text-lg px-0 sm:px-2">الاهداف</a>
                </section>
                <a href="{{ url('/') }}" class="flex flex-row">
                    <span class="text-right text-blue-700 hover:text-blue-900 text-xl pr-2">أمل</span>
                    <img src="{{url('/favicon.ico')}}" alt="Logo Picture" width="30" height="30" class="hidden sm:block">
                </a>
            </div>
        </div>
    @endif
    <section class="h-full md:h-screen w-full bg-gray-50 flex items-center">
        <img src="{{url('/landing.png')}}" alt="Logo Picture" class=" object-contain object-left h-full w-full">
        <div class="absolute w-1/4 xl:w-1/3 right-10 rounded-lg sm:block hidden text-center ">
            <p class="text-right font-medium p-4 text-transparent bg-clip-text bg-gradient-to-bl from-sky-300 to-blue-700 text-7xl">أمل</p>
            <p class="text-right text-blue-500 font-medium p-4 text-5xl">صحتكم تهمنا</p>
        </div>
    </section>
    <div class=" sm:hidden p-4 text-center mt-2">
        <span class="text-right text-blue-500 font-medium py-4 text-transparent bg-clip-text bg-gradient-to-bl from-sky-300 to-blue-700 text-3xl md:text-4xl lg:text-5xl">أمل</span>
        <span class="text-right text-blue-500 font-medium py-4 text-2xl md:text-3xl lg:text-4xl">صحتكم تهمنا</span>
    </div>
    <section class="mt-10 mx-6 lg:mx-10 xl:mx-20 text-sm text-right text-blue-900 xl:text-base">
        {{ $slot }}
    </section>
<footer class="flex-shrink-0">
    @include('layouts/footer')
</footer>
</body>
</html>
