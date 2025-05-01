<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $data = User::with(['UserSocials.social', 'UserSkills.skills', 'userPosition'])->find(Auth::id());

        return view('users.index', compact('data'));
    }
}
