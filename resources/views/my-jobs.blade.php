<x-layout>
    <x-card>
        <header>
            <h1 class="header text-center">My Jobs</h1>
        </header>
        <table class="table">
            <tbody>
                @unless ($jobs->isEmpty())
                    @foreach ($jobs as $job)
                        <tr class="table-row">
                            <td class="">
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
                    <tr class="">
                        <td class="">
                            <p class="text-center">No Jobs Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
