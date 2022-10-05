<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-center">
                                        <thead class="border-b bg-gray-800">
                                            <tr>
                                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                    User
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                    Status
                                                </th>
                                            </tr>
                                        </thead class="border-b">
                                        <tbody>
                                            {{-- Online users display --}}
                                            @foreach ($users as $user)
                                                <tr class="bg-white border-b">
                                                    @if (Cache::get('user-is-online' . $user->id))
                                                        <td>

                                                            {{ $user->name }}
                                                        </td>
                                                        <td>
                                                            online
                                                        </td>
                                                    @else
                                                        <td>
                                                            {{ $user->name }}
                                                        </td>
                                                        <td>
                                                            offline
                                                        </td>
                                                </tr>
                                            @endif
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
