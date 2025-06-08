<?php

namespace App\Http\Controllers;

use App\Http\Resources\LcmJobResource;
use App\Models\LcmJob;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LcmJobController extends Controller
{

    public function index()
    {
        $jobs = LcmJob::where('expires_at', '>=', now())
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('jobs/index', [
            'jobs' => LcmJobResource::collection($jobs),
        ]);
    }

    public function create()
    {
        return Inertia::render('jobs/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|max:2048',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,contract,internship,freelance',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric',
            'salary_currency' => 'nullable|string|size:3',
            'apply_url' => 'required|url',
            'is_remote' => 'boolean',
            'is_featured' => 'boolean',
            'expires_at' => 'required|date|after:today',
        ]);

        if ($request->hasFile('company_logo')) {
            $validated['company_logo'] = $request->file('company_logo')->store('company_logos', 'public');
        }

        $job = $request->user()->jobs()->create($validated);

        return redirect()->route('jobs.show', $job->id);
    }

    public function show(LcmJob $job)
    {
        return Inertia::render('jobs/show', [
            'job' => $job->load('user'),
        ]);
    }

    public function edit(LcmJob $job)
    {
        return Inertia::render('jobs/edit', [
            'job' => new LcmJobResource($job),
        ]);
    }

    public function update(Request $request, LcmJob $job)
    {
        $this->authorize('update', $job);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|max:2048',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,contract,internship,freelance',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric',
            'salary_currency' => 'nullable|string|size:3',
            'apply_url' => 'required|url',
            'is_remote' => 'boolean',
            'is_featured' => 'boolean',
            'expires_at' => 'required|date|after:today',
        ]);

        if ($request->hasFile('company_logo')) {
            $validated['company_logo'] = $request->file('company_logo')->store('company_logos', 'public');
        }

        $job->update($validated);

        return redirect()->route('jobs.show', $job->id);
    }

    public function destroy(LcmJob $job)
    {
        $this->authorize('delete', $job);

        $job->delete();

        return redirect()->route('jobs.index');
    }
}
