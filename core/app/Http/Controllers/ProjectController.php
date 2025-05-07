<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\ProjectTeamMember;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Projects::with('teamMembers.user')->orderByRaw("FIELD(priority, 'high', 'medium', 'low')")
            ->orderByDesc('created_at')
            ->get();

        return view('projects.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::with('userPosition')->latest()->get();

        return view('projects.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedProject = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'badge' => 'required',
            'priority' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'nullable',
            'is_private' => 'required|boolean',
        ]);

        $selectedMember = array_keys($request->input('memberId', []));
        $validatedProject['status'] = 'On Going';

        try {
            $project = Projects::create($validatedProject);
            $member = [];
            foreach ($selectedMember as $dataMember) {
                $member[] = [
                    'users_id' => $dataMember,
                    'projects_id' => $project->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            if (!empty($member)) {
                ProjectTeamMember::insert($member);
            }
            return redirect('/project')->with('successProject', 'Project successfully created!.');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect('/project')->with('errorProject', 'Error, please try again later!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Projects::with('teamMembers.user.userPosition')->findOrFail($id);
        $user = User::with('userPosition')->get();
        return view('projects.detail', compact('data', 'user'));
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
        $project = Projects::findOrFail($id);

        $validatedProject = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'badge' => 'required',
            'priority' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'nullable',
            'is_private' => 'required|boolean',
        ]);

        try {
            $project->update($validatedProject);
            return redirect()->back()->with('successProject', 'Project successfully updated!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('errorProject', 'Error, please try again later!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateTeamMember(Request $request, string $id)
    {
        $selectedMemberId = array_keys($request->input('memberId', []));

        try {
            ProjectTeamMember::where('projects_id', $id)->delete();

            $memberData = [];
            foreach ($selectedMemberId as $memberId) {
                $memberData[] = [
                    'users_id' => $memberId,
                    'projects_id' => $id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            if (!empty($memberData)) {
                ProjectTeamMember::insert($memberData);
            }

            return redirect()->back()->with('successProject', 'Team Member updated successfully.');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('errorProject', 'Error, please try again later!.');
        }
    }
}
