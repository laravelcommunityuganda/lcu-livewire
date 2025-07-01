<?php

namespace App\Http\Controllers;

use App\Http\Resources\ForumResource;
use App\Models\Forum;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::with('threads')
            ->paginate(12);
        return View::make('forum/index', [
            'forums' => ForumResource::collection($forums),
        ]);
    }

    public function create()
    {
        return View::make('forum/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Forum::create($request->only('name', 'description'));

        return redirect()->route('forum.index')->with('success', 'Forum created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        return View::make('forum/show', [
            'forum' => $forum,
            'threads' => Thread::with('user')
                ->where('forum_id', $forum->id)
                ->paginate(12),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        return View::make('forum/edit', [
            'forum' => $forum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $forum->update($request->only('name', 'description'));

        return redirect()->route('forum.show', $forum)->with('success', 'Forum updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
        $forum->delete();

        return redirect()->route('forum.index')->with('success', 'Forum deleted successfully.');
    }
}
