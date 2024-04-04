<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">My Jobs</h1>
        </header>
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($jobs->isEmpty())
                    @foreach ($jobs as $job)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <p>Pet from: <a
                                        href="/users/{{ $job->listing->user->id }}">{{ $job->listing->user->name }}</a></p>
                                <p>Pet's Name: {{ $job->listing->petName }}</p>
                                <p>Starting/Ending Date: {{ $job->listing->startDate }} - {{ $job->listing->endDate }}</p>
                            </td>
                            <td>
                                @if ($job->reviewMessage)
                                    <p class="font-bold">Review:</p>
                                    {{ $job->reviewMessage }}
                                @else
                                    <p>No Review Yet</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-grey-300">
                        <td class="px-4 py-7 border-t border-b-grey-300 text-lg">
                            <p class="text-center">No Jobs Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
