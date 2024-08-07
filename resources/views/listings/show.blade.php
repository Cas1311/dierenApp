<x-layout>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @include('partials._search')
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div>
        <x-card>
            <div class="show-card">
                <img src="{{ $listing->picture ? asset('storage/' . $listing->picture) : asset('/images/no-image.png') }}"
                    alt="{{ $listing->petName }}" />

                <h3>{{ $listing->petBreed }}</h3>
                <div>{{ $listing->petName }}</div>
                <div>Starting Date: {{ $listing->startDate }}</div>
                <div>Ending Date: {{ $listing->endDate }}</div>
                <x-listing-tags :tagsCsv="$listing->tags" />
                <div>${{ $listing->hourRate }} per hour</div>
                <div>
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>
                <div>
                    <i class="fa-solid fa-user"></i> Owner: <a class="text-link"
                        href="/users/{{ $listing->user->id }}">{{ $listing->user->name }}</a>
                </div>

                <div>
                    <h3>Description/Important Needs</h3>
                    <div>
                        <p>{{ $listing->description }}</p>
                        {{-- Don't show if it's your own pet --}}
                        @auth
                            @if (auth()->user() != $listing->user)
                                <section class="listing-contact-button-container">
                                    <form method="POST" action="{{ route('listings.requests.store', $listing) }}">
                                        @csrf
                                        <button class="button" type="submit"><i class="fa-solid fa-dog mr-1"></i>Offer to
                                            take
                                            care of
                                            pet</button>
                                    </form>
                                    <a class="button" href="mailto:{{ $listing->user->email }}"><i
                                            class="fa-solid fa-envelope mr-1"></i>
                                        Contact Owner</a>
                                </section>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

        </x-card>
        @auth
            @if (auth()->user()->isAdmin)
                {{-- Only available for admins --}}
                <x-card>
                    <section class="admin-buttons">
                        <a class="button" href="/listings/{{ $listing->id }}/edit">
                            <i class="fa-solid fa-pencil"></i>
                            Edit</a>

                        <form method="POST" action="{{ $listing->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="button-red"><i class="fa-solid fa-trash"></i>Delete</button>

                        </form>
                    </section>
                </x-card>
            @endif
        @endauth
    </div>

</x-layout>
