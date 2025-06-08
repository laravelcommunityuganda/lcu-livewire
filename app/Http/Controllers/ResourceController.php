<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResourceResource;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ResourceController extends Controller
{

    public function index()
    {
        $resources = Resource::where('access_level', 'free')
            ->orderBy('created_at', 'desc')
            ->get();
        return Inertia::render('resources/index', [
            'resources' => ResourceResource::collection($resources),
        ]);
    }

    public function create()
    {
        return Inertia::render('resources/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|max:10240', // 10MB max
            'thumbnail' => 'nullable|image|max:2048',
            'type' => 'required|in:document,video,code,presentation',
            'access_level' => 'required|in:free,premium',
        ]);

        $validated['file_path'] = $request->file('file')->store('resources', 'public');

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $resource = $request->user()->resources()->create($validated);

        return redirect()->route('resources.show', $resource->id);
    }
public function show(Resource $resource)
{
    return Inertia::render('resources/show', [
        'resource' => $resource->load('user'),
        'auth' => [
            'user' => Auth::user() ? [
                'id' => Auth::id(),
                'role' => Auth::user()->role
            ] : null
        ]
    ]);
}

    public function edit(Resource $resource)
    {
        return Inertia::render('resources/edit', [
            'resource' => $resource,
        ]);
    }

    public function update(Request $request, Resource $resource)
    {
        $this->authorize('update', $resource);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|max:10240',
            'thumbnail' => 'nullable|image|max:2048',
            'type' => 'required|in:document,video,code,presentation',
            'access_level' => 'required|in:free,premium',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('resources', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $resource->update($validated);

        return redirect()->route('resources.show', $resource->id);
    }

    public function destroy(Resource $resource)
    {
        $this->authorize('delete', $resource);

        $resource->delete();

        return redirect()->route('resources.index');
    }

    public function download(Resource $resource)
    {
        $resource->increment('download_count');

        return response()->download(storage_path('app/public/' . $resource->file_path));
    }
}
