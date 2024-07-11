<x-layout>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @auth
        <!-- User is authenticated, exclude the hero section -->
        @include('partials._search')
    @else
        <!-- User is not authenticated, include the hero section -->
        @include('partials._hero')
        @include('partials._search')

    @endauth

    <div class="list-items">

        @if (count($listings) == 0)
            <p>No listings</p>
        @endif

        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing" />
        @endforeach
    </div>

    <div>
        {{ $listings->links() }}
    </div>
</x-layout>
