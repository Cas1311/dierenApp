<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Review;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        $user = Auth::user();
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6),
            'user' => $user
        ]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show create Form
    public function create()
    {
        return view('listings.create');
    }

    // Show Edit Form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }



    // Store listing Data
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'petName' => '',
            'petBreed' => 'required',
            'hourRate' => 'required',
            'location' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => '',

        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created succesfully');
    }

    // Update listing Data
    public function update(Request $request, Listing $listing)
    {

        if ($listing->user_id != auth()->id()) {
            // Check if the user is an admin
            if (!auth()->user()->isAdmin) {
                // If not the owner and not an admin, abort with 403 Forbidden
                abort(403, 'Unauthorized action');
            }
            // If the user is an admin, proceed with the update action
        }

        $formFields = $request->validate([
            'petName' => '',
            'petBreed' => 'required',
            'hourRate' => 'required',
            'location' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => '',

        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $listing->update($formFields);

        return redirect('/')->with('message', 'Listing updated succesfully');
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {
        if ($listing->user_id != auth()->id()) {
            // Check if the user is an admin
            if (!auth()->user()->isAdmin) {
                // If not the owner and not an admin, abort with 403 Forbidden
                abort(403, 'Unauthorized action');
            }
            // If the user is an admin, proceed with the update action
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Succesfully');
    }

    // Manage Listing
    public function manage()
    {
        $user = auth()->user();
        // Retrieve the jobs for the authenticated user
        $jobs = Job::where('user_id', auth()->id())->get();

        return view('listings.manage', ['listings' => $user->listings()->with('jobs')->get()]);
    }

    public function acceptRequest(Listing $listing)
    {
        // Find the request associated with the listing
        $request = $listing->requests()->first();


        // Create a new job entry in the database
        Job::create([
            'user_id' => $request->user_id,
            'listing_id' => $listing->id,

        ]);

        // Check if a request exists
        if ($request) {
            // Mark the request as accepted
            $request->update([
                'accepted' => true,
            ]);

            return redirect()->back()->with('message', 'Request accepted successfully.');
        } else {
            // If no request is found, handle the case appropriately
            return redirect()->back()->with('message', 'No request found for this listing.');
        }
    }

    public function myJobs()
    {
        $user = auth()->user();
        // Retrieve the jobs for the authenticated user
        $jobs = Job::where('user_id', auth()->id())->get();

        // Pass the $jobs variable to the view

        return view('my-jobs', compact('jobs'));
    }

    public function submitReview(Request $request, Job $job)
    {
        // Validate the incoming request
        $request->validate([
            'reviewMessage' => 'required|string|max:255',
        ]);
        // Retrieve the job based on the job_id from the request
        $job = Job::findOrFail($request->input('job_id'));

        // Update the reviewMessage attribute of the job
        $job->reviewMessage = $request->input('reviewMessage');

        // Save the changes to the database
        $job->save();


        return redirect()->back()->with('message', 'Review submitted successfully.');
    }
}
