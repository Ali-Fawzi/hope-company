<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/delete&edit_manager.js'])
    @include('pages.manager.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 md:p-6 text-sky-900 text-center">
                    <p class="text-right md:text-xl font-semibold text-blue-900 mb-4">جميع المستخدمين</p>

                    <div class="flex mb-2 justify-between">
                        <a href="{{ route('manager.users.create') }}">
                            <x-primary-button>
                                {{ __('اضافة مستخدم') }}
                            </x-primary-button>
                        </a>
                        <a href="{{ route('manager.users.groups') }}">
                            <x-primary-button>
                                {{ __('المجموعات') }}
                            </x-primary-button>
                        </a>
                    </div>
                    <section class="justify-center text-sm md:text-lg ">
                        <table class="table-auto overflow-x-auto w-full border">
                            <thead>
                            <tr class="bg-gradient-to-br from-indigo-400 to-sky-400 text-white">
                                <th class="px-1 md:px-4 py-2">حذف المستخدم</th>
                                <th class="px-1 md:px-4 py-2">نوع المستخدم</th>
                                <th class="px-1 md:px-4 py-2">البريد الالكرتوني</th>
                                <th class="px-1 md:px-4 py-2">اسم المستخدم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="hover:bg-slate-200 text-indigo-900">
                                    <td class="border px-1 md:px-4 py-2">
                                        <div x-data="">
                                            <x-danger-button
                                                x-on:click="$dispatch('open-modal', { name: 'confirm-user-deletion' });setId({{$user->id}})"
                                            >{{ __('حذف') }}
                                            </x-danger-button>
                                        </div>
                                    </td>
                                    <td class="border px-1 md:px-4 py-2">
                                        <a href="#" class="xedit" data-name="user_type" data-pk="{{ $user->id }}" data-title="Enter user type" id="user_type" data-type="select" data-url="/manager/users/update">{{ $user->user_type }}</a>
                                    <td class="border px-1 md:px-4 py-2 overflow-hidden overflow-ellipsis whitespace-nowrap max-w-xs sm:max-w-full break-all">
                                        <a href="#" class="xedit" data-name="email" data-type="text" data-pk="{{ $user->id }}" data-title="Enter email" data-url="/manager/users/update">{{ $user->email }}</a>
                                    </td>
                                    <td class="border px-1 md:px-4 py-2">
                                        <a href="#" class="xedit" data-name="name" data-type="text" data-pk="{{ $user->id }}" data-title="Enter name" data-url="/manager/users/update">{{ $user->name }}</a>
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
    <x-modal name="confirm-user-deletion"
             x-data="{ open: false}"
             x-on:open-modal.window="if ($event.detail.name === 'confirm-user-deletion') { open = true}"
             focusable>
        <form method="post" action="{{ url('manager/users/delete') }}" class="p-6">
            @csrf
            @method('delete')
            <input type="hidden" id="ID" name="userId" :value="userId">

            <h2 class="text-lg font-bold text-white text-right drop-shadow-xl">
                {{ __('هل انت متاكد من انك تريد حذف هذا المستخدم؟') }}
            </h2>
            <p class="mt-1 text-sm font-semibold text-white text-right drop-shadow-xl">
                {{ __('.عند المضي قدما في عملية الحذف لن يمكنك الرجوع في ذلك ابدا') }}
            </p>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('الغاء') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('حذف المستخدم') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
