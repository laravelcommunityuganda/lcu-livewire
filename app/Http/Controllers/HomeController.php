<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Http\Resources\LcmJobResource;
use App\Http\Resources\ResourceResource;
use App\Models\Event;
use App\Models\LcmJob;
use App\Models\Resource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::latest()->limit(4)->get();
        $resources = Resource::latest()->limit(4)->get();
        $jobs = LcmJob::orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return Inertia::render('home/index', [
            'title' => 'Welcome to Laravel Community Uganda',
            'events' => EventResource::collection($events),
            'resources' => ResourceResource::collection($resources),
            'jobs' => LcmJobResource::collection($jobs)
        ]);
    }

    public function about()
    {
        return Inertia::render('home/about', [
            'title' => 'About Laravel Community Uganda',
            'mission' => 'Empowering Ugandan developers by enhancing their skills in Laravel PHP and modern web technologies.',
            'goals' => [
                'Promote Laravel Development',
                'Skill Development',
                'Community Building',
                'Job Creation',
                'Open Source Advocacy',
                'Technology Accessibility',
                'Social Impact',
            ],
            'coreValues' => [
                'Inclusivity',
                'Innovation',
                'Collaboration',
                'Integrity',
                'Excellence',
                'Empowerment',
                'Social Responsibility',
            ],
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
