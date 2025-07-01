<?php

namespace App\Http\Controllers;

use App\Enum\UserRolesEnum;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class EventController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $events = Event::where('is_published', false)
            ->where('end_date', '>=', now())
            ->orderBy('start_date')
            ->paginate(12);

        return View::make('events/index', [
            'events' => EventResource::collection($events),
        ]);
    }

    public function create()
    {
        return View::make('events/create');
    }

    public function store(EventRequest $request)
    {
        $validated = $request->validated();

        if (request()->hasFile('image')) {
            $validated['image'] = request()->file('image')->store('events', 'public');
        }

        $event = $request->user()->organizedEvents()->create($validated);

        return redirect()->route('events.show', $event->id);
    }

    public function show(Event $event)
    {
        $event = $event->load('user');
        return View::make('events/show', [
            'event' => new EventResource($event),
        ]);
    }

    public function edit(Event $event)
    {
        return View::make('events/edit', [
            'event' => new EventResource($event),
        ]);
    }

    public function update(EventUpdateRequest $request, Event $event)
    {
        $this->authorize('update', $event);
        $validated = $request->validated();

        if (request()->hasFile('image')) {
            $validated['image'] = request()->file('image')->store('events', 'public');
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
