<x-layout>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @include('partials._search')
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
