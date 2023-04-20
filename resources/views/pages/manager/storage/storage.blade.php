<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/delete&edit_manager.js'])
    @include('pages.manager.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <div class="flex mb-2 justify-end">
                        <a href="{{ route('manager.storage.create') }}">
                            <x-primary-button>
                                {{ __('اضافة عنصر') }}
                            </x-primary-button>
                        </a>
                    </div>
                    <section class="justify-center text-sm md:text-lg ">
                        <table class="table-auto overflow-x-auto w-full border">
                            <thead>
                            <tr class="bg-gradient-to-br from-indigo-400 to-sky-400 text-white">
                                <th class="px-2 md:px-4 py-2">حذف</th>
                                <th class="px-2 md:px-4 py-2">العدد</th>
                                <th class="px-2 md:px-4 py-2">السعر</th>
                                <th class="px-2 md:px-4 py-2">الاسم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="hover:bg-slate-200 text-indigo-900">
                                    <td class="border px-2 md:px-4 py-2">
                                        <div x-data="">
                                            <x-danger-button
                                                x-on:click="$dispatch('open-modal', { name: 'confirm-user-deletion' });setId({{$item->id}})"
                                            >{{ __('حذف') }}
                                            </x-danger-button>
                                        </div>
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        <a href="#" class="xedit" data-name="item_in_stock" data-pk="{{ $item->id }}" data-title="Enter item in stock" id="item_in_stock" data-type="number" data-url="/manager/storage/update">{{ $item->item_in_stock }}</a>
                                    <td class="border px-2 md:px-4 py-2 overflow-hidden overflow-ellipsis whitespace-nowrap max-w-xs sm:max-w-full break-all">
                                        <a href="#" class="xedit" data-name="item_price" data-type="number" data-pk="{{ $item->id }}" data-title="Enter item price" data-url="/manager/storage/update">{{ $item->item_price }}</a>$
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        <a href="#" class="xedit" data-name="item_name" data-type="text" data-pk="{{ $item->id }}" data-title="Enter item name" data-url="/manager/storage/update">{{ $item->item_name }}</a>
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
        <form method="post" action="{{ url('manager/storage/delete') }}" class="p-6">
            @csrf
            @method('delete')
            <input type="hidden" id="ID" name="itemId" :value="itemId">

            <h2 class="text-lg font-bold text-white text-right drop-shadow-xl">
                {{ __('هل انت متاكد من انك تريد حذف هذا العنصر؟') }}
            </h2>
            <p class="mt-1 text-sm font-semibold text-white text-right drop-shadow-xl">
                {{ __('.عند المضي قدما في عملية الحذف لن يمكنك الرجوع في ذلك ابدا') }}
            </p>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('الغاء') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('حذف العنصر') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>

