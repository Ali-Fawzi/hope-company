<x-slot name="navLinks">
    <x-nav-link :href="route(Auth::user()->user_type.'.reports.create')" :active="request()->routeIs(Auth::user()->user_type.'.reports.create')">
        {{ __('الابلاغ عن مشكلة') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.sales.show',['sale'=>'0'])" :active="request()->routeIs(Auth::user()->user_type.'.sales.show',['sale'=>'0'])">
        {{ __('المبيعات') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.tasks.index')" :active="request()->routeIs(Auth::user()->user_type.'.tasks.index')">
        {{ __('المهام') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.storage.index')" :active="request()->routeIs(Auth::user()->user_type.'.storage.index')">
        {{ __('المخزن') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.salesPersons')" :active="request()->routeIs(Auth::user()->user_type.'.salesPersons')">
        {{ __('المندوبين') }}
    </x-nav-link>
    <x-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('الصفحة الرئيسية') }}
    </x-nav-link>
</x-slot>
<x-slot name="responsiveNavLinks">
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.dashboard')" :active="request()->routeIs(Auth::user()->user_type.'.dashboard')">
        {{ __('الصفحة الرئيسية') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.salesPersons')" :active="request()->routeIs(Auth::user()->user_type.'.salesPersons')">
        {{ __('المندوبين') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.storage.index')" :active="request()->routeIs(Auth::user()->user_type.'.storage.index')">
        {{ __('المخزن') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.tasks.index')" :active="request()->routeIs(Auth::user()->user_type.'.tasks.index')">
        {{ __('المهام') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.sales.show',['sale'=>'0'])" :active="request()->routeIs(Auth::user()->user_type.'.sales.show',['sale'=>'0'])">
        {{ __('المبيعات') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route(Auth::user()->user_type.'.reports.create')" :active="request()->routeIs(Auth::user()->user_type.'.reports.create')">
        {{ __('الابلاغ عن مشكلة') }}
    </x-responsive-nav-link>
</x-slot>
