<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user', 'category'])
            ->latest()
            ->paginate(10);
        return View::make('posts/index', [
            'posts' => PostResource::collection($posts),
            'filters' => request()->all('search', 'trashed'),
            // 'can' => [
            //     'create' => auth()->user()->can('create', Post::class),
            //     'delete' => auth()->user()->can('delete', Post::class),
            //     'restore' => auth()->user()->can('restore', Post::class),
            //     'forceDelete' => auth()->user()->can('forceDelete', Post::class),
            // ],
        ]);
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
    public function store(PostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return View::make('posts/show', [
            'post' => new PostResource($post),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
