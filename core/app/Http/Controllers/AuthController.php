<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
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
            if (Auth::user()->companies_id == null) {
                return redirect('/company');
            }
            return redirect('/dashboard');
        }

        return back()->with('loginError', 'Email or Password Incorrect');
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
            'email' => 'required|email:dns|unique:users,email',
            'name' => 'required|max:199',
            'password' => 'required',
        ]);

        $credentials['password'] = Hash::make($request->password);
        $credentials['user_positions_id'] = 1;

        try {
            $user = User::create($credentials);
            Auth::login($user);
            return redirect('/company');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->with('registerError', 'Error, cannot register a new user');
        }
    }
}
