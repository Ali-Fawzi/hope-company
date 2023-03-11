<x-app-layout>
    <x-slot name="navLinks">
        <x-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
            {{ __('الصفحة الرئيسية') }}
        </x-nav-link>
    </x-slot>
    <x-slot name="responsiveNavLinks">
        <x-responsive-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
            {{ __('الصفحة الرئيسية') }}
        </x-responsive-nav-link>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-sky-900 leading-tight">
            {{ __('ادارة الحساب') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-blue-300 shadow sm:rounded-lg">
                <div class="max-w-xl ml-auto">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-blue-300 shadow sm:rounded-lg">
                <div class="max-w-xl ml-auto">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-blue-300 shadow sm:rounded-lg">
                <div class="max-w-xl ml-auto">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
