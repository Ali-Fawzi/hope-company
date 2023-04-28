<x-app-layout>
    @include('pages.supervisor.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <form method="POST" action="{{route('supervisor.tasks.store')}}" class="md:w-2/4 mx-auto bg-sky-100 px-6 py-8 rounded">
                        <a href="{{route('supervisor.tasks.index')}}" class="text-lg text-blue-700 hover:text-blue-900">المهام</a>
                        @csrf
                        <div class="mb-2">
                            <x-input-label for="title" :value="__('عنوان المهمة')"/>
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <x-input-label for="location" :value="__('موقع المهمة')"/>
                            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autofocus autocomplete="location" />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <x-input-label for="starting_at" :value="__('موعد بدء المهمة')"/>
                            <x-text-input id="starting_at" class="block mt-1 w-full" type="date" name="starting_at" :value="old('starting_at')" required autofocus autocomplete="starting_at" />
                            <x-input-error :messages="$errors->get('starting_at')" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <x-input-label for="ends_at" :value="__('موعد انتهاء المهمة')"/>
                            <x-text-input id="ends_at" class="block mt-1 w-full" type="date" name="ends_at" :value="old('ends_at')" required autofocus autocomplete="ends_at" />
                            <x-input-error :messages="$errors->get('ends_at')" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <x-input-label for="required_profit" :value="__('الارباح المطلوبة')"/>
                            <x-text-input id="required_profit" class="block mt-1 w-full" type="number" name="required_profit" :value="old('required_profit')" required autofocus autocomplete="required_profit" />
                            <x-input-error :messages="$errors->get('required_profit')" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <x-input-label for="commission_rate" :value="__('% نسبة الحوافز على الراتب')"/>
                            <x-text-input id="commission_rates" class="block mt-1 w-full" type="number" name="commission_rates" :value="old('commission_rates')" required autofocus autocomplete="commission_rates" />
                            <x-input-error :messages="$errors->get('commission_rates')" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <x-input-label for="item_name" :value="__('اسم العنصر')"/>
                            <x-text-input id="item_name" class="block mt-1 w-full" type="text" name="item_name" :value="old('item_name')" required autofocus autocomplete="item_name" />
                            <x-input-error :messages="$errors->get('item_name')" class="mt-2" />
                        </div>
                        <input type="hidden" id="user_id" name="user_id" value="{{request()->query('id')}}">
                        <x-primary-button class="mt-6">
                            {{ __('تعيين المهمة') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
