<x-app-layout>
    @include('pages.supervisor.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <section class="justify-center text-sm md:text-lg ">
                        <p class="text-right md:text-xl font-semibold text-blue-900 mb-4">مهام الفريق</p>
                        <table class="table-auto overflow-x-auto w-full border">
                            <thead>
                            <tr class="bg-gradient-to-br from-indigo-400 to-sky-400 text-white">
                                <th class="px-2 md:px-4 py-2">تعيين مهمة جديدة</th>
                                <th class="px-2 md:px-4 py-2">عرض التفاصيل</th>
                                <th class="px-2 md:px-4 py-2">المهمة</th>
                                <th class="px-2 md:px-4 py-2">اسم المندوب</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr class="hover:bg-slate-200 text-indigo-900">
                                    <td class="border px-2 md:px-4 py-2">
                                        <a href="{{route('supervisor.tasks.create',['id'=> $task->user->id])}}">
                                            <x-secondary-button>
                                                {{'تعيين مهمة'}}
                                            </x-secondary-button>
                                        </a>

                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        @foreach($task->task as $taskDetails)
                                            <div>
                                                <a href="{{route('supervisor.tasks.show',['task'=>$taskDetails->id])}}" class="hover:text-xl hover:text-amber-400">عرض التفاصيل</a>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                    @foreach($task->task as $taskDetails)
                                        <p>*{{$taskDetails->title}}</p>
                                    @endforeach
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        {{$task->user->name}}
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
