@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $listing->picture ? asset('storage/' . $listing->picture) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->petBreed }}</a>
            </h3>
            <div class="text-xl font- mb-4">${{ $listing->hourRate }} per hour</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
            <div class="text-lg">
                <i class="fa-solid fa-user"></i>Owner: <a
                    href="/users/{{ $listing->user->id }}">{{ $listing->user->name }}</a>
            </div>
        </div>
    </div>
</x-card>
