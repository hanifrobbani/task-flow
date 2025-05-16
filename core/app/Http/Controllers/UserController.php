<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Socials;
use App\Models\User;
use App\Models\UserPosition;
use App\Models\UserSkills;
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
        $data = User::with(['UserSocials.social', 'UserSkills.skills', 'userPosition', 'company'])->find(Auth::id());
        $userPosition = UserPosition::latest()->get();
        $userSocial = Socials::latest()->get();
        $skills = Skill::latest()->get();

        return view('users.index', compact('data', 'userPosition', 'userSocial', 'skills'));
    }

    public function update(Request $request)
    {
        $user = Auth::id();
        $validatedUser = $request->validate([
            'name' => 'string|max:199|required',
            'user_positions_id' => 'required',
            'address' => 'required|string',
            'phone_number' => 'string|max:99',
            'img_user' => 'nullable|image|file',
            'bio' => 'nullable'
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

        try {
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
            return redirect()->back()->with('successUser', 'User updated successfully!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('errorUser', 'Error, please try again later!.');
        }
    }

    public function updateSkills(Request $request)
    {
        $user = Auth::user();
        $selectedSkillIds = array_keys($request->input('skillsId', []));

        UserSkills::where('users_id', $user->id)->delete();

        $skillsData = [];
        foreach ($selectedSkillIds as $skillId) {
            $skillsData[] = [
                'skills_id' => $skillId,
                'users_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        try {
            if (!empty($skillsData)) {
                UserSkills::insert($skillsData);
            }

            return redirect()->back()->with('successUser', 'Skills updated successfully.');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('errorUser', 'Error, please try again later!.');
        }
    }

    public function updateCompanyUser(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        try {
            if ($request->token == $user->join_company_token) {
                $user->companies_id = $request->idCompany;
                $user->join_company_token = null;
                $user->save();
            }
            Auth::login($user);

            return redirect('/dashboard')->with('dashboardSuccess', 'successfully join the company');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

    }

}


