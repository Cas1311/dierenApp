<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">My Jobs</h1>
        </header>
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @foreach ($jobs as $job)
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p>Pet from: {{ $job->listing->user->name }}</p>
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
            </tbody>
        </table>
    </x-card>
</x-layout>
