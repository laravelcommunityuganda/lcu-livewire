<?php

namespace App\Livewire\Admin\Events;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public Event $event;
    public $image;
    public $isUploading = false;

    protected $rules = [
        'event.user_id' => 'required|exists:users,id',
        'event.title' => 'required|string|max:255',
        'event.slug' => 'required|string|max:255|unique:events,slug',
        'event.description' => 'required|string',
        'event.start_date' => 'required|date',
        'event.end_date' => 'required|date|after:event.start_date',
        'event.location' => 'required|string|max:255',
        'event.latitude' => 'nullable|numeric|between:-90,90',
        'event.longitude' => 'nullable|numeric|between:-180,180',
        'event.type' => 'required|in:meetup,workshop,conference,hackathon',
        'event.is_online' => 'boolean',
        'event.meeting_url' => 'nullable|url',
        'event.max_attendees' => 'nullable|integer|min:1',
        'event.is_published' => 'boolean',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount(Event $event)
    {
        $this->event = $event ?? new Event();

        if (!$this->event->exists) {
            $this->event->user_id = Auth::id();
            $this->event->is_online = false;
            $this->event->is_published = false;
        }
    }

    public function generateSlug()
    {
        $this->event->slug = str()->slug($this->event->title);
    }

    public function save()
    {
        $this->validate();

        if ($this->image) {
            $this->isUploading = true;
            $this->event->image = $this->image->store('events', 'public');
            $this->isUploading = false;
        }

        $this->event->save();

        $this->notification()->success(
            $title = 'Event saved',
            $description = 'Event has been saved successfully'
        );

        return redirect()->route('admin.events.index');
    }

    public function render()
    {
        return view('livewire.admin.events.form')
            ->layout('components.layouts.custom');
    }
}
