@props(['listing'])
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<x-card><a href="/listings/{{ $listing->id }}">
        <section class="listing-card">
            <section class="listing-details">
                <h3 class="listing-title">
                    <i class="fa-solid fa-dog"></i> {{ $listing->petBreed }}
                </h3>
                <p class="listing-rate"><i class="fa-solid fa-dollar"> </i>{{ $listing->hourRate }} per hour</p>
                <p class="listing-location">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </p>
                <p class="listing-owner">
                    <i class="fa-solid fa-user"></i> Owner: <a
                        href="/users/{{ $listing->user->id }}">{{ $listing->user->name }}</a>
                </p>
                <x-listing-tags :tagsCsv="$listing->tags" />
            </section>

            <img class="listing-image"
                src="{{ $listing->picture ? asset('storage/' . $listing->picture) : asset('/images/no-image.png') }}"
                alt="" />

        </section>
    </a>
</x-card>
