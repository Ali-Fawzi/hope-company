<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/delete&edit_manager.js'])
    @include('pages.manager.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <a href="{{ route('manager.salaries.index') }}" class="text-xl text-blue-700 hover:text-blue-900">اسماء المستخدمين الغير مسجله لهم رواتب</a>
                    <div class="hidden sm:block my-4">
                        <form
                            action="{{ route('manager.salaries.create') }}"
                            method="GET"
                            class="justify-end"
                        >
                            <div class="w-full sm:w-auto flex justify-end items-center">
                                <div class="mt-4 sm:mt-0 mr-6">
                                    <x-primary-button>
                                        {{__('ابحث')}}
                                    </x-primary-button>
                                </div>
                                <select
                                    name="user_type"
                                    id="user_type"
                                    class="border rounded-md py-2 px-3 mt-1 sm:mt-0 mr-6 block w-full sm:w-1/3"
                                >
                                    <option value="">اختر النوع</option>
                                    <option value="manager">مدير</option>
                                    <option value="supervisor">مشرف</option>
                                    <option value="salesPerson">مندوب</option>
                                </select>

                                <label for="user_type" class="block sm:inline-block mr-2 text-indigo-900"
                                >ابحث عن المستخدمين حسب النوع</label
                                >
                            </div>
                        </form>
                    </div>
                    <div class="sm:hidden my-4">
                        <form
                            action="{{ route('manager.salaries.create') }}"
                            method="GET"
                            class="flex flex-wrap items-center max-w-4xl mx-auto"
                        >
                            <div class="w-full sm:w-auto flex-1 flex flex-col sm:flex-row items-center">
                                <label for="user_type" class="block sm:inline-block mr-2 text-indigo-900"
                                >ابحث عن المستخدمين حسب النوع</label
                                >
                                <select
                                    name="user_type"
                                    id="user_type"
                                    class="border rounded-md py-2 px-3 mt-1 sm:mt-0 block w-full sm:w-auto"
                                >
                                    <option value="">اختر النوع</option>
                                    <option value="manager">مدير</option>
                                    <option value="supervisor">مشرف</option>
                                    <option value="salesPerson">مندوب</option>
                                </select>
                                <x-primary-button>
                                    {{__('ابحث')}}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>

                    <section class="justify-center text-sm md:text-lg">
                        <table class="table-auto overflow-x-auto w-full border">
                            <thead>
                            <tr class="text-blue-500 bg-sky-100">
                                <th class="px-2 md:px-4 py-2">تسجيل راتب</th>
                                <th class="px-2 md:px-4 py-2">النوع</th>
                                <th class="px-2 md:px-4 py-2">الاسم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="hover:bg-slate-200 text-indigo-900">
                                    <td class="border px-2 md:px-4 py-2">
                                        <div x-data="">
                                            <x-submit-button
                                                x-on:click="$dispatch('open-modal', { name: 'confirm-user-deletion' });setId({{$user->id}})"
                                            >{{ __('تسجيل') }}
                                            </x-submit-button>
                                        </div>
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        {{ $user->user_type }}
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        {{ $user->name }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>

                </div>
            </div>
        </div>
    </div>
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="POST" action="{{ route('manager.salaries.store') }}" class="p-6">
            @csrf
            <h2 class="text-lg font-bold text-blue-900 text-right">
                {{ __('حدد راتب للموضف') }}
            </h2>

            <p class="mt-1 text-sm font-semibold text-blue-900 text-right">
                {{ __('ادخل رقم الراتب المراد تحديده للموضف') }}
            </p>
            <input type="hidden" id="ID" name="userId" :value="userId">

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('الراتب') }}" class="sr-only" />

                <x-text-input
                    id="salary"
                    name="salary"
                    type="number"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('الراتب') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('salary')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('الغاء') }}
                </x-secondary-button>

                <x-submit-button class="ml-3">
                    {{ __('تسجيل الراتب') }}
                </x-submit-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>

