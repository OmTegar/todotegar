<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginate = 10;
        $user = auth()->user();
        $todolists = Todolist::where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate($paginate);
        return view('dashboard', compact('todolists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validated(
                [
                    'title' => 'required|string',
                    'description' => 'required|string',
                ]
            );

            DB::beginTransaction();
            Todolist::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $user->id,
            ]);
            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Task created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to create task', ['error' => $e->getMessage()]);
            return redirect()->route('dashboard')->with('error', 'Failed to create task');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validated(
                [
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'status' => 'required|string|in:unfinished,progressing,complete',
                ]
            );
            DB::beginTransaction();
            $todolist = Todolist::where('id', $id);
            $todolist->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
            ]);
            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Task updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to update task', ['error' => $e->getMessage()]);
            return redirect()->route('dashboard')->with('error', 'Failed to update task');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todolist $todolist, $id)
    {
        try {
            DB::beginTransaction();
            $todolist = Todolist::where('id', $id);
            $todolist->delete();
            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Task deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to delete task', ['error' => $e->getMessage()]);
            return redirect()->route('dashboard')->with('error', 'Failed to delete task');
        }
    }
}
