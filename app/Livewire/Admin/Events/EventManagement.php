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
    public $perPage = 16;
     public $searchActive = false;

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        // Reset to page 1 when search changes
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->search = '';
    }   

    public function render()
    {
        $events = Event::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->perPage);

        return view('livewire.admin.events.event-management', [
            'events' => $events,
        ]);
    }
}
