<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/delete&edit_manager.js'])
    @include('pages.salesPerson.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <div x-data="" class="text-left">
                        <x-primary-button
                            x-on:click="$dispatch('open-modal', { name: 'confirm-user-deletion' });setId({{request()->segment(4)}})"
                        >{{ __('تم انجاز المهمة') }}
                        </x-primary-button>
                    </div>
                    <div class="container mb-4">
                        <ul>
                            @foreach ($taskDetails as $item)
                                <li class="bg-white shadow-lg rounded-lg p-4 m-2 text-right w-full text-xl text-indigo-900">
                                    <h3 class="font-bold text-2xl"> {{ $item->title }} :العنوان</h3>
                                    <p> {{ $item->location }} :الموقع</p>
                                    <p> {{ $item->starting_at }}: وقت البداء</p>
                                    <p> {{ $item->ends_at }} :وقت الانتهاء</p>
                                    <p> {{ $item->required_profit }} :الارباح المطلوبة</p>
                                    <p> {{ $item->commission_rates }} :نسبة الحوافز</p>
                                    <p> {{ $item->storage->item_name }} :اسم العنصر</p>
                                    <p> {{ $item->storage->item_price }} :سعر العنصر</p>
                                    <p> {{ $item->storage->item_in_stock }} :كمية العنصر الموجودة في المخزن</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="text-left">
                        <a href="{{route('salesPerson.tasks')}}">
                            <x-secondary-button>
                                {{'العودة الى قائمة المهام'}}
                            </x-secondary-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="confirm-user-deletion"
             x-data="{ open: false}"
             x-on:open-modal.window="if ($event.detail.name === 'confirm-user-deletion') { open = true}"
             focusable>
        <form method="post" action="{{ url('salesPerson/tasks/finished') }}" class="p-6">
            @csrf
            <input type="hidden" id="ID" name="taskID" value="taskID">

            <h2 class="text-lg font-bold text-white text-right drop-shadow-xl">
                {{ __('هل قمت بانجاز هذه المهمة بنجاح؟') }}
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
