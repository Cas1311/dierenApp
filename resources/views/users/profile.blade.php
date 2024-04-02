<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">Your Profile</h1>
        </header>
        <table class="w-full table-auto rounded-sm">
            <tbody>
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p>Name: {{ $user->name }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p>Email: {{ $user->email }}</p>
                    </td>
                </tr>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/users/{{ $user->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                            class="fa-solid fa-pen-to-square"></i>
                        Edit</a>
                </td>
            </tbody>
        </table>
    </x-card>
</x-layout>
