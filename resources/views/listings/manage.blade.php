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
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <p class="font-bold">Pet Name:</p>
                                <a href="/listings/{{ $listing->id }}">
                                    {{ $listing->petName }}
                                </a>
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
                                        Pet is now taken care of by <a class="text-link"
                                            href="/users/{{ $request->user->id }}">{{ $request->user->name }}</a>

                                        {{-- Check if reviewMessage exists --}}
                                        @if ($listing->jobs->reviewMessage)
                                            <p class="font-bold">Review:</p>
                                            {{ $listing->jobs->reviewMessage }}
                                        @else
                                            {{-- Show the review form --}}
                                            <form class="flex flex-col mt-6" method="POST" action="/submit">
                                                @csrf
                                                <input type="hidden" name="job_id" value={{ $listing->jobs->id }}>
                                                <textarea name="reviewMessage" placeholder="Leave a review"></textarea>
                                                <button type="submit" class="text-green-500 mt-6"><i
                                                        class="fa-solid fa-check"></i>
                                                    Submit Review</button>
                                            </form>
                                        @endif
                                    @else
                                        {{-- Display the name of the user who offered --}}
                                        Petsitting Offer from <a
                                            href="/users/{{ $request->user->id }}">{{ $request->user->name }}</a>
                                        {{-- Accept request form --}}
                                        <form method="POST" action="{{ route('listings.accept-request', $listing) }}">
                                            @csrf
                                            <button type="submit" class="text-green-500"><i class="fa-solid fa-check"></i>
                                                Accept Offer</button>
                                        </form>
                                        {{-- Form to deny request --}}
                                        <form method="POST" action="{{ route('listings.deny-request', $listing) }}">
                                            @csrf
                                            <button type="submit" class="text-red-500"><i class="fa-solid fa-times"></i>
                                                Deny Request</button>
                                        </form>
                                    @endif
                                @else
                                    No requests
                                @endif
                            </td>

                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/listings/{{ $listing->id }}/edit" class="text-blue-400 "><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
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
