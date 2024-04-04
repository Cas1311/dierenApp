<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\ListingRequestController;
use PhpParser\Node\Expr\List_;

// All listings
Route::get('/', [ListingController::class, 'index']);


// Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');


// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Send Request Offer
Route::post('/listings/{listing}/requests', [ListingRequestController::class, 'store'])
    ->name('listings.requests.store');

// Accept Request
Route::post('/listings/{listing}/accept-request', [ListingController::class, 'acceptRequest'])->name('listings.accept-request');

// Deny Request
Route::post('/listings/{listing}/deny-request', [ListingController::class, 'denyRequest'])->name('listings.deny-request');

// View joblist
Route::get('/my-jobs', [ListingController::class, 'myJobs'])->name('my-jobs');

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Submit a Review
Route::post('/submit', [ListingController::class, 'submitReview']);

// Show User Profile
Route::get('/users/{user}', [UserController::class, 'showProfile']);

// Show Edit User Form
Route::get('/users/{user}/edit', [UserController::class, 'editProfile']);

// Update Profile
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');
