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
                            <input type="text" id="name" name="name" value="{{ $programName }}"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                        </div>
                        @error('name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                  

                    <div class="sm:col-span-6">
                        <label for="method" class="block text-sm font-medium text-gray-700"> Method </label>
                        <div class="mt-1">
                            <input type="text" id="method" name="method" value="{{ $programMethod }}"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('method') border-red-400 @enderror" />
                        </div>
                        @error('method')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>                 
               

                   

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
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @foreach ($program as $exercise) 
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td                               
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="checkbox" name="selected[]" value="">
                                </td> 
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    
                                    {{ $exercise['name']}}
                                </td>                                                 
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ Storage::url($exercise->image) }}" class="w-16 h-16 rounded">
                                </td>
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-wrap dark:text-white">
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

<script language="javascript">
    $("#checkAll").click(function () {
       $('input:checkbox').not(this).prop('checked', this.checked);
    });
 </script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
