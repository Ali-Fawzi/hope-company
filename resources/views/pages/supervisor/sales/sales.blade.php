<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/delete&edit_manager.js'])
    @include('pages.supervisor.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <section class="justify-center text-sm md:text-lg">
                        <p class="text-right md:text-xl font-semibold text-blue-900 mb-4">مبيعات الفريق</p>
                        <table class="table-auto overflow-x-auto w-full border">
                            <thead>
                            <tr class="text-blue-500 bg-sky-100">
                                <th class="px-2 md:px-4 py-2">التاريخ</th>
                                <th class="px-2 md:px-4 py-2">كمية العنصر</th>
                                <th class="px-2 md:px-4 py-2">اسم العنصر</th>
                                <th class="px-2 md:px-4 py-2">الوارد</th>
                                <th class="px-2 md:px-4 py-2">اسم المندوب</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($salesRecords as $salesRecord)
                                @foreach ($salesRecord->sales as $sale)
                                    <tr class="hover:bg-slate-200 text-indigo-900">
                                        <td class="border">
                                            {{$sale->date}}
                                        </td>
                                        <td class="border">
                                            {{$sale->quantity}}
                                        </td>
                                        <td class="border">
                                            {{$sale->storage->item_name}}
                                        </td>
                                        <td class="border">
                                            {{$sale->profit}}
                                        </td>
                                        <td class="border" x-data="">
                                            <a href="#" x-on:click="$dispatch('open-modal', { name: 'confirm-sale-deletion' });setId({{$sale->id}})">
                                                <x-danger-button>
                                                    {{$salesRecord->user->name}}
                                                </x-danger-button>
                                                </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <x-modal name="confirm-sale-deletion"
             x-data="{ open: false}"
             x-on:open-modal.window="if ($event.detail.name === 'confirm-sale-deletion') { open = true}"
             focusable>
        <form method="post" action="{{ url('supervisor/sales/delete') }}" class="p-6">
            @csrf
            @method('delete')
            <input type="hidden" id="ID" name="saleId" :value="saleId">

            <h2 class="text-lg font-bold text-blue-900 text-right">
                {{ __('هل تريد حذف هذا التسجيل') }}
            </h2>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('الغاء') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('حذف التسجيل') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>
