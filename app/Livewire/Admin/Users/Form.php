<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
  public $user;
  public $isEdit = false;

  // Form fields
  public $name = '';
  public $email = '';
  public $password = '';
  public $password_confirmation = '';
  public $is_active = true;
  public $is_banned = false;

  public function mount(?int $id = null)
  {
    if ($id) {
      $this->user = User::findOrFail($id);
      $this->isEdit = true;

      // Populate form fields
      $this->name = $this->user->name;
      $this->email = $this->user->email;
      $this->is_active = $this->user->is_active;
      $this->is_banned = $this->user->is_banned;
    }
  }

  protected function rules()
  {
    $rules = [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email' . ($this->isEdit ? ',' . $this->user->id : '')],
      'is_active' => ['boolean'],
      'is_banned' => ['boolean'],
    ];

    if (!$this->isEdit) {
      $rules['password'] = ['required', 'string', Password::defaults(), 'confirmed'];
      $rules['password_confirmation'] = ['required'];
    }

    return $rules;
  }

  public function save()
  {
    $validated = $this->validate();

    if ($this->isEdit) {
      // Update existing user
      $this->user->update($validated);
      session()->flash('success', 'User updated successfully.');
    } else {
      // Create new user
      $validated['password'] = Hash::make($validated['password']);
      User::create($validated);
      session()->flash('success', 'User created successfully.');
    }

    return $this->redirect(route('admin.users.index'), navigate: true);
  }

  public function render()
  {
    return view('livewire.admin.users.form', [
      'user' => $this->user,
      'isEdit' => $this->isEdit,
    ]);
  }
}
