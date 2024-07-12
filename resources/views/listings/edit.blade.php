<x-layout>
    <x-card>
        <header class="text-center">
            <h2 class="header">
                Edit your listing
            </h2>
            <p class="mb-4">Edit your listing for: {{ $listing->petName }}</p>
        </header>

        <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="listing-section">
                <label for="petBreed" class="question-header">Pet Breed</label>
                <input type="text" class="question-box" name="petBreed" value="{{ $listing->petBreed }}"
                    placeholder="Example: Labradoodle" />
            </div>

            @error('petBreed')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="hourRate" class="question-header">Hour Rate</label>
                <input type="text" class="question-box" name="hourRate" value="{{ $listing->hourRate }}"
                    placeholder="Example: $15" />
            </div>

            @error('hourRate')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="location" class="question-header">location</label>
                <input type="text" class="question-box" name="location" value="{{ $listing->location }}"
                    placeholder="Example: P Sherman 42 Wallaby Way, Sydney" />
            </div>

            @error('location')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="startDate" class="question-header">
                    Starting Date
                </label>
                <input type="text" class="question-box" name="startDate" value="{{ $listing->startDate }}" />
            </div>

            @error('startDate')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="endDate" class="question-header">
                    Ending Date
                </label>
                <input type="text" class="question-box" name="endDate" value="{{ $listing->endDate }}" />
            </div>

            @error('endDate')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="email" class="question-header">Contact Email</label>
                <input type="text" class="question-box" name="email" value="{{ $listing->email }}" />
            </div>

            @error('email')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="petName" class="question-header">Pet Name</label>
                <input type="text" class="question-box" name="petName" value="{{ $listing->petName }}" />
            </div>

            @error('petName')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="tags" class="question-header">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="question-box" name="tags" value="{{ $listing->tags }}"
                    placeholder="Example: Dog, Cat, Playful, etc" />
            </div>

            @error('tags')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="picture" class="question-header">
                    Picture
                </label>
                <input type="file" class="question-box" name="picture" />
            </div>
            <img class="listing-section"
                src="{{ $listing->picture ? asset('storage/' . $listing->picture) : asset('/images/no-image.png') }}"
                alt="" />

            @error('picture')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section">
                <label for="description" class="question-header">
                    Description/Important Needs
                </label>
                <textarea class="question-box" name="description" value="{{ $listing->description }}" rows="10"
                    placeholder="Include neccesary description, important needs, etc"></textarea>
            </div>

            @error('description')
                <p class="error-text" text-xs mt-1>{{ $message }}</p>
            @enderror

            <div class="listing-section-bottom">
                <button class="button">
                    Edit Listing
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
