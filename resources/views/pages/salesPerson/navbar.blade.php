<x-slot name="navLinks">
    <x-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('الابلاغ عن مشكلة') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('المبيعات') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('المهام') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('الصفحة الرئيسية') }}
    </x-nav-link>
</x-slot>
<x-slot name="responsiveNavLinks">
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('الصفحة الرئيسية') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('المهام') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('المبيعات') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('الابلاغ عن مشكلة') }}
    </x-responsive-nav-link>
</x-slot>
