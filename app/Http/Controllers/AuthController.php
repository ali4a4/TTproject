<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showRegister() {
        activity()->causedBy(auth()->user())->log('registration shown');
        return view('auth.register');
    }

    public function showLogin() {
        activity()->causedBy(auth()->user())->log('login shown');
        return view('auth.login');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);
        $user = User::create($validated);
        Auth::login($user);
        activity()->causedBy(auth()->user())->log('user created');
        return redirect()->route('offer.index')->with('success', 'Auth created successfully!');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            activity()->causedBy(auth()->user())->log('login success');
            return redirect()->intended('offer');
        }
        activity()->causedBy(auth()->user())->log('login fail');
        return back()->with('error', 'Invalid credentials');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        activity()->causedBy(auth()->user())->log('logout success');
        return redirect()->route('offer.index');
    }
}
