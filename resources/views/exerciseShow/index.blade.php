<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex justify-end m-2 p-2">
            <a href="{{ url()->previous() }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Exercise Index</a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-6 ">

                <p class="text-2xl pb-3">
                    {{ $exercise->name }}
                </p>
                <p class="pl-4 ">
                    {{ $exercise->description }}
                </p>               

                <div class="pt-3 text-center space-y-3 ">
                    <p class="text-green-500">
                       Level 1 {{ $exercise->level_1 }}
                    </p>
                    <p class="text-yellow-500">
                        Level 2 {{ $exercise->level_2 }}
                    </p>
                    <p class="text-red-500">
                        Level 3 {{ $exercise->level_3 }}
                    </p>
                </div>

            </div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <img src="{{ Storage::url($exercise->image) }}" class=" max-w-full h-auto rounded-lg">
            </div>

        </div>
    </div>
</x-admin-layout>
