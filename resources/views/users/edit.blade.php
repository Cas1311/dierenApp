<x-layout>
    <x-card>
        <header class="text-center">
            <h2 class="header">
                Edit your Profile
            </h2>
        </header>

        <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="listing-section">
                <label for="name" class="question-header">Name</label>
                <input class="question-box" type="text" name="name" value="{{ $user->name }}" />
            </div>

            @error('name')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="email" class="question-header">Email</label>
                <input class="question-box" type="text" name="email" value="{{ $user->email }}" />
            </div>

            @error('email')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="homeImage" class="question-header">
                    Image of where you keep your pets
                </label>
                <input class="question-box" type="file" accept="image/*" name="homeImage" />
            </div>

            @error('homeImage')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <button class="button">
                    Edit Profile
                </button>

                <a href="/users/{{ $user->id }}"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
