<x-app-layout>
    @include('pages.salesPerson.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <p class="text-right md:text-xl font-semibold text-blue-900 mb-4">فضلا قم بتسجيل تفاصيل الصفقة</p>
                    <form method="POST" action="{{route('salesPerson.sales.store')}}" class="md:w-2/4 mx-auto bg-sky-100 px-6 py-8 rounded">
                        @csrf
                        <div class="mb-2">
                            <x-input-label for="item_name" :value="__('اسم العنصر')"/>
                            <x-text-input id="item_name" class="block mt-1 w-full" type="text" name="item_name" :value="old('item_name')" required autofocus autocomplete="item_name" />
                            <x-input-error :messages="$errors->get('item_name')" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <x-input-label for="quantity" :value="__('الكمية المباعة')"/>
                            <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')" required autofocus autocomplete="quantity" />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <x-input-label for="profit" :value="__('السعر')"/>
                            <x-text-input id="profit" class="block mt-1 w-full" type="number" name="profit" :value="old('profit')" required autofocus autocomplete="profit" />
                            <x-input-error :messages="$errors->get('profit')" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <x-input-label for="date" :value="__('التاريخ')"/>
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus autocomplete="date" />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>
                        <x-primary-button class="mt-6">
                            {{ __('اضافة') }}
                        </x-primary-button>
                    </form>
                    @if (session('status'))
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-right text-green-600 font-semibold "
                        >{{ session('status') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
