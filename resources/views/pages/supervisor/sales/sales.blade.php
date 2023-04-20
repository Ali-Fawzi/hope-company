<x-app-layout>
    @include('pages.supervisor.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <section class="justify-center text-sm md:text-lg ">
                        <table class="table-auto overflow-x-auto w-full border">
                            <thead>
                            <tr class="bg-gradient-to-br from-indigo-400 to-sky-400 text-white">
                                <th class="px-2 md:px-4 py-2">التاريخ</th>
                                <th class="px-2 md:px-4 py-2">كمية العنصر</th>
                                <th class="px-2 md:px-4 py-2">اسم العنصر</th>
                                <th class="px-2 md:px-4 py-2">الوارد</th>
                                <th class="px-2 md:px-4 py-2">اسم المندوب</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salesRecords as $salesDetails)
                                <tr class="hover:bg-slate-200 text-indigo-900">
                                    <td class="border px-2 md:px-4 py-2">
                                        {{$salesDetails->date}}
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        {{$salesDetails->quantity}}
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        {{$salesDetails->item_name}}
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        {{$salesDetails->profit}}
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        {{$salesDetails->name}}
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
