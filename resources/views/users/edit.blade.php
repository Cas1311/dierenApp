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
            {{-- <div class="mb-6">
                <label for="hourRate" class="inline-block text-lg mb-2">Hour Rate</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="hourRate"
                    value="{{ $listing->hourRate }}" placeholder="Example: $15" />
            </div>

            @error('hourRate')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    value="{{ $listing->location }}" placeholder="Example: P Sherman 42 Wallaby Way, Sydney" />
            </div>

            @error('location')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="startDate" class="inline-block text-lg mb-2">
                    Starting Date
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="startDate"
                    value="{{ $listing->startDate }}" />
            </div>

            @error('startDate')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="endDate" class="inline-block text-lg mb-2">
                    Ending Date
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="endDate"
                    value="{{ $listing->endDate }}" />
            </div>

            @error('endDate')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ $listing->email }}" />
            </div>

            @error('email')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="petName" class="inline-block text-lg mb-2">Pet Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="petName"
                    value="{{ $listing->petName }}" />
            </div>

            @error('petName')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    value="{{ $listing->tags }}" placeholder="Example: Dog, Cat, Playful, etc" />
            </div>

            @error('tags')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="picture" class="inline-block text-lg mb-2">
                    Picture
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="picture" />
            </div>
            <img class="w-48 mr-6 mb-6"
                src="{{ $listing->picture ? asset('storage/' . $listing->picture) : asset('/images/no-image.png') }}"
                alt="" />

            @error('picture')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Description/Important Needs
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" value="{{ $listing->description }}"
                    rows="10" placeholder="Include neccesary description, important needs, etc"></textarea>
            </div>

            @error('description')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror --}}

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit Profile
                </button>

                <a href="/users/{user}" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
