<x-slot name="navLinks">
    <x-nav-link :href="route(Auth::user()->user_type.'.test')" :active="request()->routeIs(Auth::user()->user_type.'.test')">
        {{ __('البلاغات') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.test')" :active="request()->routeIs(Auth::user()->user_type.'.test')">
        {{ __('الرواتب') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.storage')" :active="request()->routeIs(Auth::user()->user_type.'.storage')">
        {{ __('المخزن') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.users')" :active="request()->routeIs(Auth::user()->user_type.'.users')">
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
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.users')" :active="request()->routeIs(Auth::user()->user_type.'.users')">
        {{ __('المستخدمين') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.storage')" :active="request()->routeIs(Auth::user()->user_type.'.storage')">
        {{ __('المخزن') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.test')" :active="request()->routeIs(Auth::user()->user_type.'.test')">
        {{ __('الرواتب') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.test')" :active="request()->routeIs(Auth::user()->user_type.'.test')">
        {{ __('البلاغات') }}
    </x-responsive-nav-link>
</x-slot>
