<x-app-layout>
    <x-slot name="navLinks">
        <x-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dash')">
            {{ __('الصفحة الرئيسية') }}
        </x-nav-link>
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
        <h2 class="font-semibold lg:text-xl text-sky-900 text-right leading-tight">
            {{ __('لوحة القيادة الخاصة بالمدير') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-sky-900 text-center">
                        {{ __("انت هو التالي") }}
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
