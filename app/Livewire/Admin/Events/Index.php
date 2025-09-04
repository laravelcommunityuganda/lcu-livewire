<?php

namespace App\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
  use WithPagination;

  public $search = '';
  public $perPage = 10;
  public $sortField = 'created_at';
  public $sortDirection = 'desc';
  public $selected = [];
  public $filters = [
    'type' => null,
    'is_online' => null,
    'is_published' => null,
  ];

  protected $queryString = [
    'search' => ['except' => ''],
    'perPage' => ['except' => 10],
    'sortField' => ['except' => 'start_date'],
    'sortDirection' => ['except' => 'desc'],
    'filters' => ['except' => []],
  ];

  public function sortBy($field)
  {
    if ($this->sortField === $field) {
      $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    } else {
      $this->sortDirection = 'asc';
    }
    $this->sortField = $field;
  }

  public function deleteSelected()
  {
    $this->dialog()->confirm([
      'title' => 'Are you sure?',
      'description' => 'You are about to delete selected events. This action cannot be undone.',
      'icon' => 'error',
      'accept' => [
        'label' => 'Yes, delete them',
        'method' => 'performDeleteSelected',
      ],
      'reject' => [
        'label' => 'No, cancel',
      ],
    ]);
  }

  public function performDeleteSelected()
  {
    Event::whereIn('id', $this->selected)->delete();
    $this->selected = [];
    $this->notification()->success(
      $title = 'Events deleted',
      $description = 'Selected events have been deleted successfully'
    );
  }

  public function resetFilters()
  {
    $this->reset('filters');
  }

  public function render()
  {
    return view('livewire.admin.events.index', [
      'events' => Event::query()
        ->when($this->search, function ($query) {
          $query->where('title', 'like', '%' . $this->search . '%')
            ->orWhere('location', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%');
        })
        ->when($this->filters['type'], function ($query, $type) {
          $query->where('type', $type);
        })
        ->when(isset($this->filters['is_online']), function ($query) {
          $query->where('is_online', $this->filters['is_online']);
        })
        ->when(isset($this->filters['is_published']), function ($query) {
          $query->where('is_published', $this->filters['is_published']);
        })
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->perPage),
    ]);
  }
}
