<x-app-layout>
    @include('pages.salesPerson.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <p class="text-right md:text-xl font-semibold text-blue-900 mb-4">المهام الغير منجزة</p>
                    <section class="justify-center text-sm md:text-lg ">
                        <table class="table-auto overflow-x-auto w-full border">
                            <thead>
                            <tr class="text-blue-500 bg-sky-100">
                                <th class="px-2 md:px-4 py-2">عرض التفاصيل</th>
                                <th class="px-2 md:px-4 py-2">وقت انتهاء المهمة</th>
                                <th class="px-2 md:px-4 py-2">موقغ المهمة</th>
                                <th class="px-2 md:px-4 py-2">عنوان المهمة</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr class="hover:bg-slate-200 text-indigo-900">
                                    <td class="border py-2">
                                        <a href="{{route('salesPerson.showMyTask',['task' => $task->id])}}">
                                            <x-primary-button>
                                                عرض التفاصيل
                                            </x-primary-button>
                                        </a>
                                    </td>
                                    <td class="border">
                                        {{$task->ends_at}}
                                    </td>
                                    <td class="border">
                                        {{$task->location}}
                                    </td>
                                    <td class="border">
                                        {{$task->title}}
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
