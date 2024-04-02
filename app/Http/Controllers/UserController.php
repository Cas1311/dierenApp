<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create()
    {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],

        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'Succesfully registered and logged in');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Succesfully logged out');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // Login User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    // Show User Profile
    public function showProfile(User $user)
    {

        return view('users.profile')->with('user', $user);
    }

    // Edit User profile
    public function editProfile(User $user)
    {
        return view('users.edit', compact('user'));
    }


    // Update Profile
    public function update(Request $request, User $user)
    {


        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],

        ]);
        if ($request->hasFile('homeImage')) {

            $formFields['homeImage'] = $request->file('homeImage')->store('homeImages', 'public');
        }

        $user->update($formFields);

        return redirect('/users/{user}')->with('message', 'Profile updated succesfully');
    }
}
