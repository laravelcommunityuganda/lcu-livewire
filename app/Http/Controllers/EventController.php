<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('is_published', false)
            ->where('end_date', '>=', now())
            ->orderBy('start_date')
            ->get();

        return Inertia::render('events/index', [
            'events' => $events,
        ]);
    }

    public function create()
    {
        return Inertia::render('events/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048',
            'type' => 'required|in:meetup,workshop,conference,hackathon',
            'is_online' => 'boolean',
            'meeting_url' => 'nullable|url',
            'max_attendees' => 'nullable|integer|min:1',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event = $request->user()->organizedEvents()->create($validated);

        return redirect()->route('events.show', $event->id);
    }

    public function show(Event $event)
    {
        return Inertia::render('events/show', [
            'event' => $event->load('organizer'),
        ]);
    }

    public function edit(Event $event)
    {
        return Inertia::render('events/edit', [
            'event' => $event,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048',
            'type' => 'required|in:meetup,workshop,conference,hackathon',
            'is_online' => 'boolean',
            'meeting_url' => 'nullable|url',
            'max_attendees' => 'nullable|integer|min:1',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validated);

        return redirect()->route('events.show', $event->id);
    }

    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);

        $event->delete();

        return redirect()->route('events.index');
    }

    public function register(Request $request, Event $event)
    {
        $request->user()->events()->attach($event->id, ['status' => 'registered']);

        return back();
    }

    public function cancelRegistration(Request $request, Event $event)
    {
        $request->user()->events()->updateExistingPivot($event->id, ['status' => 'cancelled']);

        return back();
    }
}
