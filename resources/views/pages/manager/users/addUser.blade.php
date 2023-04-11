<x-app-layout>
    @include('pages.manager.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <form method="POST" action="{{url('/users/add')}}" class="md:w-2/4 mx-auto">
                        <a href="{{route('manager.users')}}" class="text-lg text-blue-700 hover:text-blue-900">اضافة مستخدم</a>
                        @csrf
                        <div class="mb-2">
                            <x-input-label for="name" :value="__('اسم المستخدم')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <x-input-label for="email" :value="__('البريد الالكتروني')"/>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <label for="user_type" class="block font-medium text-blue-900 text-right ">نوع المستخدم</label>
                            <select id="user_type" name="user_type" class="border-sky-900 bg-sky-100 text-sky-900 focus:border-indigo-600 focus:ring-indigo-500 ml-auto rounded-md shadow-sm w-full">
                                <option value="salesPerson">مندوب</option>
                                <option value="supervisor">مشرف</option>
                                <option value="manager">مدير</option>
                            </select>
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

                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('تأكيد رمز الدخول')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation"
                                          required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <x-primary-button class="mt-6">
                            {{ __('اضافة') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

