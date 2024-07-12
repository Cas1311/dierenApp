<x-layout>
    <x-card>
        <section class="profile-content">
            <header class="profile-header">
                <h1>{{ $user->name }}'s Profile</h1>
                @auth
                    @if (auth()->user()->id === $user->id)
                        <a class="text-link" href="/users/{{ $user->id }}/edit">
                            <i class="fa-solid fa-pen-to-square"></i> Edit Profile
                        </a>
                    @endif
                @endauth
            </header>


            <section class="profile-section">
                <section>
                    <p class="profile-info"><strong>Name:</strong> {{ $user->name }}</p>
                    <p class="profile-info"><strong>Email:</strong> {{ $user->email }}</p>
                </section>
                <section>
                    <p class="profile-info"><strong>Where I keep my pets:</strong></p>
                    <img class="profile-image"
                        src="{{ $user->homeImage ? asset('storage/' . $user->homeImage) : asset('/images/no-image.png') }}"
                        alt="User's home image" />
                </section>
            </section>
    </x-card>
</x-layout>
