<?php

namespace App\Http\Controllers;

use App\Http\Requests\LcuJobRequest;
use App\Http\Resources\LcuJobResource;
use App\Models\LcuJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LcuJobController extends Controller
{

    public function index()
    {
        $jobs = LcuJob::where('expires_at', '>=', now())
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return View::make('jobs/index', [
            'jobs' => LcuJobResource::collection($jobs),
        ]);
    }

    public function create()
    {
        return View::make('jobs/create');
    }

    public function store(LcuJobRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        if (request()->hasFile('company_logo')) {
            $validated['company_logo'] = request()->file('company_logo')->store('company_logos', 'public');
        }

        $job = $request->user()->jobs()->create($validated);

        return redirect()->route('jobs.show', $job->id);
    }

    public function show(LcuJob $job)
    {
        return View::make('jobs/show', [
            'job' => $job->load('user'),
        ]);
    }

    public function edit(LcuJob $job)
    {
        return View::make('jobs/edit', [
            'job' => new LcuJobResource($job),
        ]);
    }

    public function update(Request $request, LcuJob $job)
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

    public function destroy(LcuJob $job)
    {
        $this->authorize('delete', $job);

        $job->delete();

        return redirect()->route('jobs.index');
    }
}
