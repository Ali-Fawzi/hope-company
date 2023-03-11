<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Logo with Company name -->
        <section class="mix-blend-multiply flex items-center justify-center">
            <a href="/" class="flex flex-row">
                <span class="text-right text-blue-900 text-3xl text-transparent bg-clip-text bg-gradient-to-br from-sky-100 to-blue-500 pr-2">أمل</span>
                <img src="{{url('/favicon.ico')}}" alt="Logo Picture" height="50" width="50" class="bg-white rounded-lg">
            </a>
        </section>
        <!-- Form title -->
        <p class="text-center text-blue-900 text-2xl mt-2">تسجيل الدخول</p>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('البريد الالكتروني')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('رمز الدخول')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 text-right">
            <label for="remember_me" class="inline-flex items-center">
                <span class="mr-2 text-sm text-blue-900">{{ __('تذكر هذا الحساب') }}</span>
                <input id="remember_me" type="checkbox" class="rounded border-sky-900 bg-sky-100 text-sky-700 shadow-sm focus:ring-indigo-500" name="remember">
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            <x-primary-button>
                {{ __('التالي') }}
            </x-primary-button>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-blue-700 hover:text-sky-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('هل نسيت رمز الدخول؟') }}
                </a>
            @endif

        </div>
    </form>
</x-guest-layout>
