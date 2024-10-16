<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('الصفحة الرئيسية') }}
        </h2>
    </x-slot>

    <div class="py-12" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-2xl ms-10 mt-10 mb-5">يرجى إختيار الدورات</div>
                @session('error')
                    <x-error>{{ session('error') }}</x-error>
                @endsession
                @session('size')
                    <x-error>{{ session('size') }}</x-error>
                @endsession
                @session('type')
                    <x-error>{{ session('type') }}</x-error>
                @endsession
                @session('attachment')
                    <x-error>{{ session('attachment') }}</x-error>
                @endsession
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('dashboard.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($courses as $course)
                            <div class="flex items-center mb-4">
                                <input id="{{ $course->id }}" type="checkbox" value="{{ $course->name }}"
                                    name="{{ $course->id }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="{{ $course->id }}"
                                    class="ms-2 font-medium text-gray-900 dark:text-gray-300">{{ $course->name }}</label>
                            </div>
                        @endforeach

                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">إضغط لرفع إيصال الدفع أو أسحب أرمي</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">يمكنك رفع صورة او بي دي اف بحد أقصى 1 ميجابايت</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" name="file[]" multiple/>
                            </label>
                        </div>

                        <x-primary-button type="submit" class="float-end my-5">تقديم</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
