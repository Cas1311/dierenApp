<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                List your pet
            </h2>
            <p class="mb-4">Make a listing for your pet</p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf

            <div class="listing-section">
                <label for="petBreed" class="question-header">Pet Breed</label>
                <input type="text" class="question-box" name="petBreed" value="{{ old('petBreed') }}"
                    placeholder="Example: Labradoodle" />
            </div>

            @error('petBreed')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="hourRate" class="question-header">Hour Rate</label>
                <input type="text" class="question-box" name="hourRate" value="{{ old('hourRate') }}"
                    placeholder="Example: $15" />
            </div>

            @error('hourRate')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="location" class="question-header">location</label>
                <input type="text" class="question-box" name="location" value="{{ old('location') }}"
                    placeholder="Example: P Sherman 42 Wallaby Way, Sydney" />
            </div>

            @error('location')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="startDate" class="question-header">
                    Starting Date
                </label>
                <input type="text" class="question-box" name="startDate" value="{{ old('startDate') }}" />
            </div>

            @error('startDate')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="endDate" class="question-header">
                    Ending Date
                </label>
                <input type="text" class="question-box" name="endDate" value="{{ old('endDate') }}" />
            </div>

            @error('endDate')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="email" class="question-header">Contact Email</label>
                <input type="text" class="question-box" name="email" value="{{ old('email') }}" />
            </div>

            @error('email')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="petName" class="question-header">Pet Name</label>
                <input type="text" class="question-box" name="petName" value="{{ old('petName') }}" />
            </div>

            @error('petName')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="tags" class="question-header">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="question-box" name="tags" value="{{ old('tags') }}"
                    placeholder="Example: Dog, Cat, Playful, etc" />
            </div>

            @error('tags')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="picture" class="question-header">
                    Picture
                </label>
                <input type="file" accept="image/*" class="question-box" name="picture"
                    value="{{ old('picture') }}" />
            </div>

            @error('picture')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="description" class="question-header">
                    Description/Important Needs
                </label>
                <textarea class="question-box" name="description" value="{{ old('description') }}" rows="10"
                    placeholder="Include neccesary description, important needs, etc"></textarea>
            </div>

            @error('description')
                <p class="text-red-500" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section-bottom">
                <button class="button">
                    Post Listing
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
