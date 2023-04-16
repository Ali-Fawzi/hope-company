<x-app-layout>
    @include('pages.manager.navbar')
    @vite(['resources/css/app.css', 'resources/js/delete&edit_manager.js'])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <div class="mb-4">
                        <a href="{{route('manager.users.index')}}" class="text-lg text-blue-700 hover:text-blue-900">قائمة المجموعات</a>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                        <tr class="bg-gradient-to-br from-indigo-400 to-sky-400 text-white">
                            <th class="px-4 py-2">حذف</th>
                            <th class="px-4 py-2">اعضاء الفريق</th>
                            <th class="px-4 py-2">عدد اعضاء الفريق</th>
                            <th class="px-4 py-2">اسم المشرف</th>
                        </tr>
                        </thead>
                        <tbody class="text-blue-700">
                        @foreach($groups as $supervisor)
                            @php($salespersonCount = $supervisor->supervisedSalespersons->count())
                            <tr class="hover:bg-slate-200 text-indigo-900">
                                <td class="border px-4 py-2">
                                    @foreach($supervisor->supervisedSalespersons as $salesPerson)
                                        <div x-data="">
                                            <button x-on:click="$dispatch('open-modal', { name: 'confirm-user-deletion' });setId({{$salesPerson->id}})" class="hover:text-red-700">
                                                ازالة المندوب
                                            </button>
                                        </div>
                                    @endforeach
                                </td>
                                <td class="border px-4 py-2">
                                    @foreach($supervisor->supervisedSalespersons as $salesPerson)
                                        <p>
                                            {{$salesPerson->name}}
                                        </p>
                                    @endforeach
                                </td>
                                <td class="border px-4 py-2">{{$salespersonCount}}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('manager.users.groups.addSalesPerson', ['id' => $supervisor->id]) }}">{{$supervisor->name}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-modal name="confirm-user-deletion"
             x-data="{ open: false}"
             x-on:open-modal.window="if ($event.detail.name === 'confirm-user-deletion') { open = true}"
             focusable>
        <form method="POST" action="{{ url('/users/unset') }}" class="p-6">
            @csrf
            @method('delete')
            <input type="hidden" id="ID" name="userId" :value="userId">

            <h2 class="text-lg font-bold text-white text-right drop-shadow-xl">
                {{ __('هل انت متاكد من انك تريد ازالة هذا المستخدم من الفريق؟') }}
            </h2>
            <p class="mt-1 text-sm font-semibold text-white text-right drop-shadow-xl">
                {{ __('.عند المضي قدما في عملية الازالة لن يمكنك الرجوع في ذلك ابدا') }}
            </p>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('الغاء') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('ازالة المندوب') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>

