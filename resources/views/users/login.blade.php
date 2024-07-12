<x-layout>
    <div>
        <x-card>
            <header class="text-center">
                <h2 class="header">
                    Login
                </h2>
                <p>Login to your account</p>
            </header>

            <form method="POST" action="/users/authenticate">
                @csrf

                <div class="listing-section">
                    <label for="email" class="question-header">Email</label>
                    <input type="email" class="question-box" name="email" value="{{ old('email') }}" />
                    @error('email')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="listing-section">
                    <label for="password" class="question-header">
                        Password
                    </label>
                    <input type="password" class="question-box" name="password" value="{{ old('password') }}" />
                    @error('password')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>


                <div class="listing-section-bottom">
                    <button type="submit" class="button">
                        Sign In
                    </button>
                    <div>
                        <p>
                            Don't have an account?
                            <a href="/register" class="text-link">Register</a>
                        </p>
                    </div>
                </div>


            </form>
        </x-card>
    </div>
</x-layout>
