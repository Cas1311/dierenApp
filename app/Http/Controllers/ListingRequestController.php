<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingRequestController extends Controller
{
    public function store(Listing $listing)
    {
        // Ensure the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to login to make a request.');
        }

        // Retrieve the authenticated user
        $user = auth()->user();

        // Ensure the authenticated user exists
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        // Create a new request associated with the listing
        $listing->requests()->create([
            'user_id' => $user->id,
        ]);

        return redirect('/')->with('message', 'Request sent successfully.');
    }
}
