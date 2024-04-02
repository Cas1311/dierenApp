<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Listings
            </h1>
        </header>
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($listings->isEmpty())
                    @foreach ($listings as $listing)
                        {{-- @dd($listing->jobs->reviewMessage); --}}
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/listings/{{ $listing->id }}">
                                    {{ $listing->petName }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/listings/{{ $listing->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                @if ($listing->requests()->exists())
                                    {{-- Get the first request related to the listing --}}
                                    @php $request = $listing->requests()->first(); @endphp
                                    {{-- Check if the request is accepted --}}
                                    @if ($request->accepted)
                                        {{-- Get the user who made the request --}}
                                        @php $user = $request->user; @endphp
                                        {{-- Display the message with the user ID --}}
                                        Pet is now taken care of by {{ $user->name }}
                                        {{-- @dd($jobs) --}}
                                        <form class="flex flex-col" method="POST" action="/submit">
                                            @csrf
                                            <input type="hidden" name="job_id" value={{ $listing->jobs->id }}>
                                            <textarea name="reviewMessage" placeholder="Leave a review"></textarea>
                                            <button type="submit" class="text-green-500"><i class="fa-solid fa-check"></i>
                                                Submit Review</button>

                                        </form>
                                    @else
                                        {{-- Display the name of the user who offered --}}
                                        Petsitting Offer from {{ $request->user->name }}
                                        {{-- Accept request form --}}
                                        <form method="POST" action="{{ route('listings.accept-request', $listing) }}">
                                            @csrf
                                            <button type="submit" class="text-green-500"><i class="fa-solid fa-check"></i>
                                                Accept Offer</button>
                                        </form>
                                    @endif
                                @else
                                    No requests
                                @endif
                            </td>



                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="{{ $listing->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-grey-300">
                        <td class="px-4 py-7 border-t border-b-grey-300 text-lg">
                            <p class="text-center">No Listings Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
