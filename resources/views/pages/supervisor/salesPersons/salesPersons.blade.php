<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/delete&edit_manager.js'])
    @include('pages.supervisor.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <section class="justify-center text-sm md:text-lg ">
                        <table class="table-auto overflow-x-auto w-full border">
                            <thead>
                            <tr class="bg-gradient-to-br from-indigo-400 to-sky-400 text-white">
                                <th class="px-2 md:px-4 py-2">طرد</th>
                                <th class="px-2 md:px-4 py-2">اجمالي المبيعات</th>
                                <th class="px-2 md:px-4 py-2">البريد الالكرتوني</th>
                                <th class="px-2 md:px-4 py-2">اسم المندوب</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salesPersons as $salesPerson)
                                <tr class="hover:bg-slate-200 text-indigo-900">
                                    <td class="border px-2 md:px-4 py-2">
                                        <div x-data="">
                                            <x-danger-button
                                                x-on:click="$dispatch('open-modal', { name: 'confirm-user-deletion' });setId({{$salesPerson->salesperson_id}})"
                                            >{{ __('طرد') }}
                                            </x-danger-button>
                                        </div>
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        <a>{{ $salesPerson->sales_sum_profit }}</a>
                                    <td class="border px-2 md:px-4 py-2 overflow-hidden overflow-ellipsis whitespace-nowrap max-w-xs sm:max-w-full break-all">
                                        <a>{{ $salesPerson->user->email }}</a>
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        <a>{{ $salesPerson->user->name }}</a>
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
        <form method="post" action="{{ route('supervisor.kickSalesPerson') }}" class="p-6">
            @csrf
            @method('post')
            <input type="hidden" id="ID" name="userId" :value="userId">

            <h2 class="text-lg font-bold text-white text-right drop-shadow-xl">
                {{ __('هل انت متاكد من انك تريد طرد هذا المندوب؟') }}
            </h2>
            <p class="mt-1 text-sm font-semibold text-white text-right drop-shadow-xl">
                {{ __('ما هو سبب الطرد؟') }}
            </p>
            <div class="mt-6">
                <x-input-label for="content" value="{{ __('سبب الطرد') }}" class="sr-only" />

                <x-text-input
                    id="content"
                    name="content"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('سبب الطرد') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('content')" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('الغاء') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('طرد المندوب') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
