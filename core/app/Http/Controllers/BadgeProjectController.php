<?php

namespace App\Http\Controllers;

use App\Models\BadgeProject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BadgeProjectController extends Controller
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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'companies_id' => 'required'
        ]);

        try {
            BadgeProject::create($validated);
            return redirect()->back()->with('successCompany', 'Badge Project successfully created!');
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
        $badgeProject = BadgeProject::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'companies_id' => 'required'
        ]);

        try {
            $badgeProject->update($validated);
            return redirect()->back()->with('successCompany', 'Badge Project successfully updated!');
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
        $badgeProject = BadgeProject::findOrFail($id);
        $badgeProject->delete();

        return redirect()->back()->with('successCompany', 'Badge Project successfully deleted!');
    }
}
