<x-layout>
    <div>
        <x-card>
            <header class="text-center">
                <h2 class="header">
                    Register
                </h2>
                <p>Create an account to take care of a pet</p>
            </header>

            <form method="POST" action="/users">
                @csrf
                <div class="listing-section">
                    <label for="name" class="question-header">
                        Name
                    </label>
                    <input class="question-box" type="text" name="name" value="{{ old('name') }} " />

                    @error('name')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="listing-section">
                    <label for="email" class="question-header">Email</label>
                    <input class="question-box" type="email" name="email" value="{{ old('email') }}" />
                    @error('email')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="listing-section">
                    <label for="password" class="question-header">
                        Password
                    </label>
                    <input class="question-box" type="password" name="password" value="{{ old('password') }}" />
                    @error('password')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="listing-section">
                    <label for="password2" class="question-header">
                        Confirm Password
                    </label>
                    <input class="question-box" type="password" name="password_confirmation" />
                    @error('password_confirmation')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="listing-section-bottom">
                    <button type="submit" class="button">
                        Sign Up
                    </button>
                    <div>
                        <p>
                            Already have an account?
                            <a href="/login" class="text-link">Login</a>
                        </p>
                    </div>
                </div>


            </form>
        </x-card>
    </div>
</x-layout>
