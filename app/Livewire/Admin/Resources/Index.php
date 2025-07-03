<?php

namespace App\Livewire\Admin\Resources;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.resources.index')
            ->layout('components.layouts.custom');
    }
}
