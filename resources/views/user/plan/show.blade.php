<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex justify-end m-2 p-2">
            <a href="{{ route('user.plan.index') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Plan index</a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th> 
                            <th scope="col" class="px-6 py-3">
                                Method
                            </th>                             
                        </tr>
                    </thead>                   
                    <tbody>
                        @foreach ($program as $program)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $program['name'] }}
                                </td>
                                <td class="w-44 py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ Storage::url($program['image']) }}"  class="hover:scale-125 w-32 h-28 rounded">
                                </td>
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    {{ $program['description'] }}
                                </td>  
                                <td
                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-wrap dark:text-white">
                                {{ $methods }}
                            </td>                               
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-user-layout>
