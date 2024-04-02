<x-layout>
    @include('partials._search')
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10 bg-black">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ $listing->picture ? asset('storage/' . $listing->picture) : asset('/images/no-image.png') }}"
                    alt="" />

                <h3 class="text-2xl mb-2">{{ $listing->petBreed }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->petName }}</div>
                <div class="text-xl mb-4">Starting Date: {{ $listing->startDate }}</div>
                <div class="text-xl mb-4">Ending Date: {{ $listing->endDate }}</div>
                <x-listing-tags :tagsCsv="$listing->tags" />
                <div class="text-xl pt-5 mb-4">${{ $listing->hourRate }} per hour</div>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Description/important Needs
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>{{ $listing->description }}</p>

                        <form method="POST" action="{{ route('listings.requests.store', $listing) }}">
                            @csrf
                            <button class="bg-laravel text-white m-6 p-2 rounded-xl hover:opacity-80" type="submit"
                                class="btn btn-primary">Send Request</button>
                        </form>
                        {{-- @dd($listing->user()) --}}
                        <a href="mailto:{{ $listing->user->email }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-envelope"></i>
                            Contact Owner</a>

                    </div>
                </div>
            </div>
        </x-card>
        @auth
            @if (auth()->user()->isAdmin)
                {{-- Only available for admins --}}
                <x-card class="mt-4 p-2 flex space-x-6">
                    <a href="/listings/{{ $listing->id }}/edit">
                        <i class="fa-solid fa-pencil"></i>
                        Edit</a>

                    <form method="POST" action="{{ $listing->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>

                    </form>
                </x-card>
            @endif
        @endauth
    </div>

</x-layout>
