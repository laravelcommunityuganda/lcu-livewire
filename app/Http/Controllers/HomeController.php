<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Http\Resources\LcuJobResource;
use App\Http\Resources\ResourceResource;
use App\Models\Event;
use App\Models\LcuJob;
use App\Models\Resource;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::latest()->limit(4)->get();
        $resources = Resource::latest()->limit(4)->get();
        $jobs = LcuJob::orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        $sponsors = Sponsor::orderBy('created_at', 'desc')
            ->select('id', 'name', 'logo', 'website', 'tier')
            ->limit(3)
            ->get();

        return View::make('home/index', [
            'title' => 'Welcome to Laravel Community Uganda',
            'events' => EventResource::collection($events),
            'resources' => ResourceResource::collection($resources),
            'jobs' => LcuJobResource::collection($jobs),
            'sponsors' => $sponsors,
        ]);
    }

    public function about()
    {
        return View::make('home/about', [
            'title' => 'About US',
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
