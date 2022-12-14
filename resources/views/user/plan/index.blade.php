<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($userPlan->isEmpty())
                <p>You don't have a training plan yet</p>
            @else
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Program name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Comment
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Program status
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            
                            @foreach ($userPlan as $plan)
                                @if ($plan->pivot->completed == 0)
                            
                                    <form method="POST" action="{{ route('user.programComplete', $plan->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        @error('feedback-'.$plan->id)
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
            

                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <a class="text-blue-700 no-underline hover:underline "
                                                    href="{{ route('user.plan.show', $plan->id) }}">
                                                    {{ $plan->programName }} </a>
                                            </td>

                                            <td>

                                                <input type="text" name="feedback-{{ $plan->id }}"
                                                    placeholder="comment your workout session"
                                                    class=" block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5      @error('feedback-'.$plan->id) border-red-400 @enderror "/>
                                               
                                                   

                                            </td>

                                            <td>
                                                <button type="submit" name="complete" 
                                                    class="px-4 py-2 ml-4 bg-sky-500 hover:bg-sky-700 rounded-lg text-white">Mark
                                                    Complete</button>
                                            </td>
                                        </tr>

                                    </form>
                                @else
                                    <tr class=" bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a class="visited:text-red-600 text-blue-700 no-underline hover:underline "
                                                href="{{ route('user.plan.show', $plan->id) }}">
                                                {{ $plan->programName }}</a>
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <p class="text-red-600">{{ $plan->pivot->notes }}</p>
                                        </td>

                                        <td
                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <p class="text-red-600">Completed</p>
                                    </td>

                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('user.plan.show', $plan->id) }}"
                                                    class="px-4 py-2 bg-sky-500 hover:bg-sky-700 rounded-lg  text-white">Details</a>
                                            </div>
                                        </td>                                       

                                    </tr>
                                @endif
                            @endforeach
                 @endif
             </tbody>
            </table>
        </div>
    </div>
    
</div>
    </div>
    </div>

    <script type="text/javascript">
        $("#order").click(
            function() {
                $("#appear").show();
            }
        )
    </script>
</x-user-layout>
