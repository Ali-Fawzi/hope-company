<x-slot name="navLinks">
    <x-nav-link :href="route(Auth::user()->user_type.'.reports.index')" :active="request()->routeIs(Auth::user()->user_type.'.reports.index')">
        {{ __('الابلاغات') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.sales.index')" :active="request()->routeIs(Auth::user()->user_type.'.sales.index')">
        {{ __('المبيعات') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.salaries.index')" :active="request()->routeIs(Auth::user()->user_type.'.salaries.index')">
        {{ __('الرواتب') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.storage.index')" :active="request()->routeIs(Auth::user()->user_type.'.storage.index')">
        {{ __('المخزن') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.users.index')" :active="request()->routeIs(Auth::user()->user_type.'.users.index')">
        {{ __('المستخدمين') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('الصفحة الرئيسية') }}
    </x-nav-link>
</x-slot>
<x-slot name="responsiveNavLinks">
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('الصفحة الرئيسية') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.users.index')" :active="request()->routeIs(Auth::user()->user_type.'.users.index')">
        {{ __('المستخدمين') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.storage.index')" :active="request()->routeIs(Auth::user()->user_type.'.storage.index')">
        {{ __('المخزن') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.salaries.index')" :active="request()->routeIs(Auth::user()->user_type.'.salaries.index')">
        {{ __('الرواتب') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.sales.index')" :active="request()->routeIs(Auth::user()->user_type.'.sales.index')">
        {{ __('المبيعات') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.reports.index')" :active="request()->routeIs(Auth::user()->user_type.'.reports.index')">
        {{ __('الابلاغات') }}
    </x-responsive-nav-link>
</x-slot>
