<?php

namespace App\Http\Controllers;

use App\Models\Socials;
use App\Models\User;
use App\Models\UserPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $data = User::with(['UserSocials.social', 'UserSkills.skills', 'userPosition'])->find(Auth::id());
        $userPosition = UserPosition::latest()->get();
        $userSocial = Socials::latest()->get(); 

        return view('users.index', compact('data', 'userPosition', 'userSocial'));
    }

    public function update(Request $request){
        $validated= $request->validate([
            'name' => 'string|max:199|required',
            'user_position_id' => 'required',
            'address' => 'required|string',
            'img_user' => 'image|file|max:1024',
            'link' => 'string'
        ]);


    }
}
