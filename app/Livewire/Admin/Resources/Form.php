<?php

namespace App\Livewire\Admin\Resources;

use Livewire\Component;

class Form extends Component
{
    public function render()
    {
        return view('livewire.admin.resources.form')
            ->layout('components.layouts.custom');
    }
}
