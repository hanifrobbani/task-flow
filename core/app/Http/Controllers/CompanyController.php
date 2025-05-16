<?php

namespace App\Http\Controllers;

use App\Mail\JoinCompanyMail;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function companyUser(){
        $company = Company::with('employee.userPosition')->find(Auth::user()->companies_id);
        if(!$company){
            return redirect()->back();
        }

        return view('company.index', compact('company'));
    }

    public function joinCompany(Request $request, string $id){
        $validatedData = $request->validate([
            'email' => 'required|exists:users,email',
        ]);

        $user = User::where('email', $validatedData['email'])->first();
        $company = Company::findOrFail($id);
        $companyToken = Str::random(12);

        $user->update([
            'join_company_token' => $companyToken
        ]);

        $urlJoinCompany = url('/user/join-company/' . $user->id . '?token=' . $companyToken . '&idCompany=' . $company->id);
        Mail::to($user->email)->send(new JoinCompanyMail($user, $company->name, $urlJoinCompany));

        return redirect()->back()->with('successCompany', 'Email invitation has been sent!');
    }
}
