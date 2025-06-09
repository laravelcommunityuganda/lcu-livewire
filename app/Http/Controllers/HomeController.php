<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\LcmJob;
use App\Models\Resource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::latest()->limit(4)->get();
        $resources = Resource::latest()->limit(4)->get();
        $jobs = LcmJob::latest()->limit(4)->get();

        return view('home.index', [
            'title' => 'Welcome to Laravel Community Uganda',
            'events' => $events,
            'resources' => $resources,
            'jobs' => $jobs,
        ]);
    }

    public function about()
    {
        return view('home.about', [
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
}
