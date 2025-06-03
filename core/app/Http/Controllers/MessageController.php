<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::where('send_to', 'user')->orWhere('users_id', Auth::id())->latest()->paginate(10);
        return view('message.index', compact('message'));
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
            'title' => 'nullable',
            'message' => 'nullable',
            'send_to' => 'required',
            'users_id' => 'required',
            'send_by' => 'required',
            'companies_id' => 'required',
            'type' => 'nullable',
        ]);

        try {
            Message::create($validated);
            return redirect()->back()->with('successMessage', 'Message successfully send!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        $message->is_read = true;
        $message->save();

        return view('message.show', compact('message'));
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
        $message = Message::findOrFail($id);
        try {
            $message->delete();
            return redirect()->back()->with('successMessage', 'Message successfully deleted!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('errorMessage', 'Error, please try again later!');
        }

    }
    public function messageCompany()
    {
        $message = Message::where('send_to', 'company')->get();
        return view('message.company', compact('message'));
    }

    public function requestJoinCompany(Request $request)
    {
        $validated = $request->validate([
            'companies_id' => 'required|exists:companies,id',
        ]);

        $userId = Auth::id();
        $user = User::where('id', '=', $userId)->firstOrFail();
        $messageUser = $user->name . " has request to join your company, if you don't know him, you can just ignore this message";

        $message = new Message();
        $message->title = "Request Join Company";
        $message->product_id = $validated['companies_id'];
        $message->users_id = $userId;
        $message->send_by = $userId;
        $message->message = $messageUser;
        $message->send_to = 'company';
        $message->type = 'join-message';
        $message->save();

    }
}
