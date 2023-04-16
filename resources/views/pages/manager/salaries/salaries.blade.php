<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/delete&edit_manager.js'])
    @include('pages.manager.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <div class="flex mb-2 justify-end">
                        <a href="{{ route('manager.salaries.create') }}">
                            <x-primary-button>
                                {{ __('تحديد راتب لمستخدم') }}
                            </x-primary-button>
                        </a>
                    </div>
                    <section class="justify-center text-sm md:text-lg ">
                        <table class="table-auto overflow-x-auto w-full border">
                            <thead>
                            <tr class="bg-gradient-to-br from-indigo-400 to-sky-400 text-white">
                                <th class="px-2 md:px-4 py-2">المبلع بعد الحوافز</th>
                                <th class="py-2 md:px-4 py-2">نسبة الزيادة</th>
                                <th class="px-2 md:px-4 py-2">المبلغ الاصلي</th>
                                <th class="px-2 md:px-4 py-2">النوع</th>
                                <th class="px-2 md:px-4 py-2">الاسم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salaries as $salary)
                                <tr class="hover:bg-slate-200 text-indigo-900">
                                    <td class="border px-2 md:px-4 py-2">
                                        <span>{{ ($salary->base_salary *($salary->commission_rates/1000)+$salary->base_salary)}}</span>$
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        <span>{{$salary->commission_rates/10}}</span>%
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        <a href="#" class="xedit" data-name="item_in_stock" data-pk="{{ $salary->id }}" data-title="Enter item in stock" id="item_in_stock" data-type="number" data-url="/salaries/update">{{ $salary->base_salary }}</a>$
                                    <td class="border px-2 md:px-4 py-2">
                                        <p>{{ $salary->user->user_type }}</p>
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        <p>{{ $salary->user->name }}</p>
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
</x-app-layout>

