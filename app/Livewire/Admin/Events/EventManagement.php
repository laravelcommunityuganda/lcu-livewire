<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;
class EventManagement extends Component
{
        use WithPagination;
    
    protected $paginationTheme = 'tailwind';
    public $search = '';
    public $perPage = 10;
    protected $queryString = ['search'];
    public $events;

    public function mount()
    {
        $this->events = Event::all();
        // Log::info('EventManagement component mounted. Events loaded: ' . $this->events->toJson());

    }

    public function render()
    {
        return view('livewire.admin.events.event-management');
    }
}
