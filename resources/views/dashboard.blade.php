<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список пользователей') }}
        </h2>
    </x-slot>

    <table class="w-full">
            <thead>
                <tr class="border border-gray-400">
                    <th class="text-center">ID</th>
                    <th class="text-center">Ім'я та прізвище</th>
                    <th class="text-center">Організація</th>
                    <th class="text-center">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="even:bg-gray-200 h-12">
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-center">{{ $user->name . ' ' . $user->surname }}</td>
                        <td class="text-center">{{ $user->organization }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">
                            @auth
                                @if(auth()->user()->id == $user->id)
                                    <a href="{{ route('profile.edit', ['id' => $user->id]) }}" class="text-blue-500 hover:underline">Edit</a>
                                @endif
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> -->
</x-app-layout>
