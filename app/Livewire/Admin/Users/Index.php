<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use function Laravel\Prompts\confirm;

class Index extends Component
{
  use WithPagination;

  public $search = '';
  public $role = '';
  public $status = '';
  public $perPage = 10;

  protected $queryString = [
    'search' => ['except' => ''],
    'role' => ['except' => ''],
    'status' => ['except' => ''],
  ];

  public function mount()
  {
    $this->search = request()->query('search', $this->search);
    $this->role = request()->query('role', $this->role);
    $this->status = request()->query('status', $this->status);
  }

  public function updatingSearch()
  {
    $this->resetPage();
  }

  public function updatingRole()
  {
    $this->resetPage();
  }

  public function updatingStatus()
  {
    $this->resetPage();
  }

  public function resetFilters()
  {
    $this->reset(['search', 'role', 'status']);
    $this->resetPage();
  }

  public function deleteUser($userId)
  {
    $user = User::findOrFail($userId);

    if (confirm('Are you sure you want to delete this user?')) {
      $user->delete();
      session()->flash('success', 'User deleted successfully.');
    }
  }

  public function render()
  {
    $query = User::query()
      ->when($this->search, function ($query) {
        $query->where(function ($q) {
          $q->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%');
        });
      })
      ->when($this->role, function ($query) {
        $query->where('role', $this->role);
      })
      ->when($this->status, function ($query) {
        if ($this->status === 'active') {
          $query->where('is_active', true)->where('is_banned', false);
        } elseif ($this->status === 'inactive') {
          $query->where('is_active', false);
        } elseif ($this->status === 'banned') {
          $query->where('is_banned', true);
        }
      })
      ->latest();

    $users = $query->paginate($this->perPage);

    return view('livewire.admin.users.index', [
      'users' => $users,
    ]);
  }
}
