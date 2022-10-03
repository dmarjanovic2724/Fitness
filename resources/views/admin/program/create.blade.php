<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <form method="POST" action="{{ route('admin.program.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mt-6 p-4">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                </div>

                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Program Name </label>
                    <div class="mt-1">
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="block w-full appearance-none bg-white border rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                    </div>
                    @error('name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>


                <div class="sm:col-span-6">
                    <label for="method" class="block text-sm font-medium text-gray-700"> Method </label>
                    <div class="mt-1">
                        <input type="text" id="method" name="method" value="{{ old('method') }}"
                            class="block w-full appearance-none bg-white border rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('method') border-red-400 @enderror" />
                    </div>
                    @error('method')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>




                <table class=" w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Num of workout
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Select exercise
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($exercises as $exercise)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name="order[]"
                                        class="block w-full appearance-none bg-white borderrounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                                </td>
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="checkbox" id="exercise" name="selected[]" value="{{ $exercise->id }}">
                                </td>
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $exercise->name }}
                                </td>
                                <td>
                                    <img src="{{ Storage::url($exercise->image) }}"
                                        class="hover:scale-125 w-24 h-24 rounded">
                                </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    {{ $exercise->description }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </form>
        </div>

    </div>
</x-admin-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
