<?php

namespace App\Livewire\Admin\Forums;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.forums.index')
            ->layout('components.layouts.custom');
    }
}
