<x-app-layout>
    @include("pages.".Auth::user()->user_type.".navbar")
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            {{ __('ادارة الحساب') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 sm:rounded-lg bg-white">
                <div class="sticky top-0 hidden md:block">
                    <div class="mb-2 text-blue-900 hover:text-xl">
                        <a href="#معلومات_الحساب">
                            معلومات الحساب
                        </a>
                    </div>
                    <div class="mb-2 text-blue-900 hover:text-xl">
                        <a href="#تحديث_رمز_الدخول">
                            تحديث رمز الدخول
                        </a>
                    </div>
                    <div class="mb-2 text-blue-900 hover:text-xl">
                        <a href="#حذف_الحساب">
                            حذف الحساب
                        </a>
                    </div>
                </div>
                <div class="max-w-xl ml-auto mb-4" id="معلومات_الحساب">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="max-w-xl ml-auto mb-4" id="تحديث_رمز_الدخول">
                    @include('profile.partials.update-password-form')
                </div>
                <div class="max-w-xl ml-auto mb-4" id="حذف_الحساب">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
