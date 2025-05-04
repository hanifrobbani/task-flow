<?php

namespace App\Http\Controllers;

use App\Models\Socials;
use App\Models\User;
use App\Models\UserPosition;
use App\Models\UserSocial;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $data = User::with(['UserSocials.social', 'UserSkills.skills', 'userPosition'])->find(Auth::id());
        $userPosition = UserPosition::latest()->get();
        $userSocial = Socials::latest()->get();

        return view('users.index', compact('data', 'userPosition', 'userSocial'));
    }

    public function update(Request $request)
    {
        $user = Auth::id();
        $validatedUser = $request->validate([
            'name' => 'string|max:199|required',
            'user_positions_id' => 'required',
            'address' => 'required|string',
            'phone_number' => 'string|max:99',
            'img_user' => 'nullable|image|file|max:1024',
        ]);

        $validatedSocialUser = $request->validate([
            'socials' => 'array',
            'socials.*.socials_id' => 'nullable|integer',
            'socials.*.link' => 'nullable|string',
        ]);


        if ($request->hasFile('img_user')) {
            $oldImg = User::find($user)->img_user;
            if ($oldImg && Storage::disk('public')->exists($oldImg)) {
                Storage::disk('public')->delete($oldImg);
            }

            $file = $request->file('img_user');
            $newFileName = time() . '-' . $file->getClientOriginalName();
            $newFilePath = $file->storeAs('img-store/profile-user', $newFileName, 'public');
            $validatedUser['img_user'] = $newFilePath;
        }

        // dd($validatedUser, $validatedSocialUser);
        echo "test";

        // try {
            if ($validatedSocialUser && isset($validatedSocialUser['socials'])) {
                foreach ($validatedSocialUser['socials'] as $social) {
                    if (!empty($social['link'])) {
                        UserSocial::updateOrCreate(
                            [
                                'users_id' => $user,
                                'socials_id' => $social['socials_id']
                            ],
                            [
                                'link' => $social['link']
                            ]
                        );
                    } else {
                        UserSocial::where([
                            'users_id' => $user,
                            'socials_id' => $social['socials_id']
                        ])->delete();
                    }
                }
            }
            

        User::findOrFail($user)->update($validatedUser);
        return redirect('/user/profile')->with('successUpdateUser', 'User berhasil diperbarui!');
        // } catch (Exception $e) {
        //     Log::error($e);
        //     return redirect('/user/profile')->with('errorUpdateUser', 'Error!' . $e);
        // }



    }
}
