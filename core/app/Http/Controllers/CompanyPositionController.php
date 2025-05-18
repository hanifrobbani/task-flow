<?php

namespace App\Http\Controllers;

use App\Models\CompanyPosition;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanyPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company_position = CompanyPosition::latest()->get();
        return view('company.index', compact('company_position'));
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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'companies_id' => 'required',
        ]);

        try{
            CompanyPosition::create($validated);
            return redirect()->back()->with('successCompany', 'Position successfully added!');
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->back();
        }
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
        $company_position = CompanyPosition::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        try{
            $company_position->update($validated);
            return redirect()->back()->with('successCompany', 'Position successfully updated!');
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('errorCompany', 'Error, try again later!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = CompanyPosition::findOrFail($id);
        $company->delete();
        return redirect()->back()->with('successCompany', 'Company successfuly updated!');
    }
}
