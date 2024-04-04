<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit your Profile
            </h2>
        </header>

        <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ $user->name }}" />
            </div>

            @error('name')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ $user->email }}" />
            </div>

            @error('email')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="homeImage" class="inline-block text-lg mb-2">
                    Image of where you keep your pets
                </label>
                <input type="file" accept="image/*" class="border border-gray-200 rounded p-2 w-full"
                    name="homeImage" />
            </div>

            @error('homeImage')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit Profile
                </button>

                <a href="/users/{user}" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
