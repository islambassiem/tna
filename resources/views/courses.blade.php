<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('دوراتي') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                @if (count($courses))
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-right">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        اسم الدورة
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        تاريخ التسجيل
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $c = 1;
                                @endphp
                                @foreach ($courses as $course)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-right">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $c }}
                                        </th>
                                        <a href="#">
                                            <td class="px-6 py-4">
                                                {{ $course->name }}
                                            </td>
                                        </a>
                                        <td class="px-6 py-4">
                                            {{ date('d/m/Y h:i:s a', strtotime($course->created_at)) }}
                                        </td>
                                    </tr>
                                    @php
                                    $c++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-lg font-bold">
                        أنت ليس مسجل في أي دورات يمكنك التسجيل من الصفحة الرئيسية
                    </div>
                @endif



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
