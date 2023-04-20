<x-app-layout>
    @include('pages.'.Auth::user()->user_type.'.navbar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sky-900 text-center">
                    <p class="text-center text-xl font-semibold text-blue-900 mb-4">الابلاغ عن مشكلة</p>
                    <form method="POST" action="{{route(Auth::user()->user_type.'.reports.store')}}" class="md:w-2/4 mx-auto">
                        @csrf
                        <div class="mb-4">
                            <label for="report_type" class="block font-medium text-blue-900 text-right ">نوع الابلاغ</label>
                            <select id="report_type" name="report_type" class="border-sky-900 bg-sky-100 text-sky-900 focus:border-indigo-600 focus:ring-indigo-500 ml-auto rounded-md shadow-sm w-full">
                                <option value="sales">المبيعات</option>
                                <option value="location">الموقع</option>
                                <option value="items">العناصر</option>
                                <option value="environment">بيئة العمل</option>
                                <option value="other">غيرها</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <x-input-label for="content" :value="__('محتوى الابلاغ')"/>
                            <textarea id="content" class="block mt-4 w-full h-36" type="text" name="content" required autofocus autocomplete="content"></textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <x-primary-button class="mt-6">
                            {{ __('اضافة') }}
                        </x-primary-button>
                    </form>
                    @if (session('status'))
                        <div class="text-right text-green-600 font-semibold ">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
