<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/delete&edit_manager.js'])
    @include('pages.manager.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <section class="justify-center text-sm md:text-lg ">
                        <table class="table-auto overflow-x-auto w-full border">
                            <thead>
                            <tr class="bg-gradient-to-br from-indigo-400 to-sky-400 text-white">
                                <th class="py-2 md:px-4 py-2">تاريخ الابلاغ</th>
                                <th class="px-2 md:px-4 py-2">محتوى الابلاغ</th>
                                <th class="px-2 md:px-4 py-2">نوع الابلاغ</th>
                                <th class="px-2 md:px-4 py-2">نوع المستخدم</th>
                                <th class="px-2 md:px-4 py-2">اسم المستخدم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                                <tr class="hover:bg-slate-200 text-indigo-900">
                                    <td class="border px-2 md:px-4 py-2">
                                        {{$report->date}}
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        {{$report->content}}
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        {{$report->report_type}}
                                    </td>
                                    <td class="border px-2 md:px-4 py-2">
                                        <p>{{ $report->user_type }}</p>
                                    </td>

                                    <td class="border px-2 md:px-4 py-2" x-data="">
                                        <a href="#" class="hover:text-red-700"                                             x-on:click="$dispatch('open-modal', { name: 'confirm-user-deletion' });setId({{$report->id}})">{{ $report->name }}</a>
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
        <form method="post" action="{{ url('manager/reports/delete') }}" class="p-6">
            @csrf
            @method('delete')
            <input type="hidden" id="ID" name="reportId" :value="reportId">

            <h2 class="text-lg font-bold text-white text-right drop-shadow-xl">
                {{ __('هل تريد حذف هذا الابلاغ') }}
            </h2>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('الغاء') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('حذف الابلاغ') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>

