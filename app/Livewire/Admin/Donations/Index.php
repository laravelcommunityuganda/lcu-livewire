<?php

namespace App\Livewire\Admin\Donations;

use Livewire\Component;

class Index extends Component
{
  public function render()
  {
    return view('livewire.admin.donations.index')
      ->layout('components.layouts.custom');
  }
}
