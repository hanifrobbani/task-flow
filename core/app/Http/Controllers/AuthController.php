<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function regis()
    {
        return view('auth.register');
    }
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email or Password Incorrect',
        ]);
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'name' => 'required|max:199',
            'password' => 'required',
        ]);

        $credentials['password'] = Hash::make($request->password);

        $user = User::create($credentials);
        Auth::login($user);
        return redirect()->intended('dashboard');
    }
}
