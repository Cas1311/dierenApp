<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">{{ $user->name }}'s Profile</h1>
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
                <tr>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p>Where i keep my pets:</p>
                        <img class="w-48 mr-6 mb-6"
                            src="{{ $user->homeImage ? asset('storage/' . $user->homeImage) : asset('/images/no-image.png') }}"
                            alt="" />
                    </td>
                </tr>
                @auth
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/users/{{ $user->id }}/edit"
                            class="bg-laravel text-white m-6 p-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-pen-to-square"></i>
                            Edit Profile</a>
                    @endauth
                </td>
            </tbody>
        </table>
    </x-card>
</x-layout>
