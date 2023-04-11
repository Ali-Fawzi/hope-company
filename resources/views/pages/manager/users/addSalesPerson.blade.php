<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/delete&edit_manager.js'])
    @include('pages.manager.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <div class="mb-4">
                        <a href="{{route('manager.users.groups')}}" class="text-lg text-blue-700 hover:text-blue-900">المندوبين الغير مرتبطين بمشرف مبيعات</a>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                        <tr class="bg-gradient-to-br from-blue-300 to-sky-300 text-blue-900">
                            <th class="px-4 py-2">تعيين المندوب</th>
                            <th class="px-4 py-2">الاسم</th>
                        </tr>
                        </thead>
                        <tbody class="text-blue-700">
                        @foreach($unsupervisedSalesPersons as $SalesPerson)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2">
                                        <div x-data="">
                                            <button x-on:click="$dispatch('open-modal', { name: 'confirm-user-deletion' });setUserId({{$SalesPerson->id}})" class="hover:text-green-700">
                                                تعيين
                                            </button>
                                        </div>
                                </td>
                                <td class="border px-4 py-2">{{$SalesPerson->name}}</td>
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
        <form method="POST" action="{{ url('/users/setSalesPerson') }}" class="p-6">
            @csrf
            @method('POST')
            <input type="hidden" id="userId" name="userId" :value="userId">
            <input type="hidden" id="supervisorId" name="supervisorId" :value="{{request()->route('id')}}">

            <h2 class="text-lg font-medium text-blue-700 text-right">
                {{ __('هل تريد تعيين هذا المندوب؟') }}
            </h2>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('الغاء') }}
                </x-secondary-button>

                <x-submit-button class="ml-3">
                    {{ __('نعم') }}
                </x-submit-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>

