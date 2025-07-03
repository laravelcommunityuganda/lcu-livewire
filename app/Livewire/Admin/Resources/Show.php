<?php

namespace App\Livewire\Admin\Resources;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.admin.resources.show')
            ->layout('components.layouts.custom');
    }
}
