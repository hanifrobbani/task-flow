<?php

namespace App\Http\Controllers;

use App\Models\BadgeTask;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BadgeTaskController extends Controller
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
            'color' => 'required',
            'companies_id' => 'required'
        ]);

        try {
            BadgeTask::create($validated);
            return redirect()->back()->with('successCompany', 'Badge Task successfully created!');
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
        $badgeTask = BadgeTask::findOrFail($id);

         $validated = $request->validate([
            'name' => 'required|max:255',
            'color' => 'required',
            'companies_id' => 'required'
        ]);

        try {
            $badgeTask->update($validated);
            return redirect()->back()->with('successCompany', 'Badge Task successfully updated!');
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
        $badgeTask = BadgeTask::findOrFail($id);
        $badgeTask->delete();

        return redirect()->back()->with('successCompany', 'Badge Task successfully deleted!');
    }
}
