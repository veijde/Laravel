<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create form
    public function create()
    {
        return view('users.register');
    }

    // Create new user
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
            'birthday' => ['required', 'date_format:d/m/Y']
        ]);

        // 
        $myDateTime = DateTime::createFromFormat('d/m/Y', $formFields['birthday']);
        $formFields['birthday'] = $myDateTime->format('Y-m-d');

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Not admin by default
        $formFields['admin'] = false;

        // Create user
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created succesfully');
    }

    // Logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    // Show login form
    public function login()
    {
        return view('users.login');
    }

    // Login user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields, $request->input('remember'))) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    // Show edit form
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    // Update User data
    public function update(Request $request, User $user)
    {

        // Logged in user is owner
        if($user->id != auth()->id()) {
            abort(403, 'Unautherized');
        }

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('picture', 'public');
        }

        $formFields['aboutme'] = $request->input('aboutme');

        $user->update($formFields);

        return back()->with('message', 'User data updated succesfully');
    }

    public function promote(User $user)
    {
        if(!auth()->user()->admin) {
            abort(403, 'Unautherized');
        }

        $user->update(['admin' => true]);

        return back()->with('message', 'User promoted succesfully');
    }
}
