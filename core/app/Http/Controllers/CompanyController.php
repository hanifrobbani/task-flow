<?php

namespace App\Http\Controllers;

use App\Mail\JoinCompanyMail;
use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::with('employee')->search()->paginate(30);
        return view('company.join', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'background_img' => 'nullable|image|file',
            'profile_img' => 'nullable|image|file',
            'address' => 'nullable',
            'field_of_work' => 'required',
        ]);
        
        $validated['owner_id'] = Auth::user()->id;

        try {
        if ($request->hasFile('profile_img')) {
            $file = $request->file('profile_img');
            $newFileName = time() . '-' . $file->getClientOriginalName();
            $newFilePath = $file->storeAs('img-store/profile-company', $newFileName, 'public');
            $validated['profile_img'] = $newFilePath;
        }
        if ($request->hasFile('background_img')) {
            $file = $request->file('background_img');
            $newFileName = time() . '-' . $file->getClientOriginalName();
            $newFilePath = $file->storeAs('img-store/background-company', $newFileName, 'public');
            $validated['background_img'] = $newFilePath;
        }

        $company = Company::create($validated);
        Auth::user()->update(['companies_id' => $company->id]);
        return redirect('/my-company')->with('successCompany', 'Company successfully created!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('errorCompany', 'Error, please try again later!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        return view('company.show', compact('company'));
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
        $company = Company::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'background_img' => 'nullable|image|file',
            'profile_img' => 'nullable|image|file',
            'address' => 'nullable',
            'field_of_work' => 'nullable',
        ]);

        try {
            if ($request->hasFile('profile_img')) {
                $oldProfileImg = $company->profile_img;
                ;
                if ($oldProfileImg && Storage::disk('public')->exists($oldProfileImg)) {
                    Storage::disk('public')->delete($oldProfileImg);
                }

                $file = $request->file('profile_img');
                $newFileName = time() . '-' . $file->getClientOriginalName();
                $newFilePath = $file->storeAs('img-store/profile-company', $newFileName, 'public');
                $validated['profile_img'] = $newFilePath;
            }
            if ($request->hasFile('background_img')) {
                $oldBackgroundImg = $company->background_img;
                if ($oldBackgroundImg && Storage::disk('public')->exists($oldBackgroundImg)) {
                    Storage::disk('public')->delete($oldBackgroundImg);
                }

                $file = $request->file('background_img');
                $newFileName = time() . '-' . $file->getClientOriginalName();
                $newFilePath = $file->storeAs('img-store/background-company', $newFileName, 'public');
                $validated['background_img'] = $newFilePath;
            }

            $company->update($validated);
            return redirect()->back()->with('successCompany', 'Company successfuly updated!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('errorCompany', 'Error, please try again later!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function companyUser()
    {
        $company = Company::with(['employee.userPosition', 'companyPosition'])->find(Auth::user()->companies_id);
        if (!$company) {
            return redirect()->back();
        }

        return view('company.index', compact('company'));
    }

    public function joinCompany(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'email' => 'required|exists:users,email',
            'user_position' => 'required'
        ]);

        $user = User::where('email', $validatedData['email'])->first();
        $company = Company::findOrFail($id);
        $companyToken = Str::random(15);

        try {
            $user->update([
                'join_company_token' => $companyToken
            ]);

            $urlJoinCompany = url('/user/join-company/' . $user->id . '?token=' . $companyToken . '&idCompany=' . $company->id . '&idPosition=' . $validatedData['user_position']);
            Mail::to($user->email)->send(new JoinCompanyMail($user, $company->name, $urlJoinCompany));

            return redirect()->back()->with('successCompany', 'Email invitation has been sent!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('errorCompany', 'Error while send email invitation!');
        }
    }
}
