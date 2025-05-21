<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::latest()->get();
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
            'title' => 'required',
            'message' => 'nullable',
            'send_to' => 'required',
            'users_id' => 'required',
            'companies_id' => 'required',
        ]);

        try{
            Message::create($validated);
            return redirect()->back()->with('successMessage', 'Message successfully send!');
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
        try{
            $message->delete();
            return redirect()->back()->with('successMessage', 'Message successfully deleted!');
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('errorMessage', 'Error, please try again later!');

        }

    }
}
