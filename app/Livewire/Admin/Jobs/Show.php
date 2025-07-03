<?php

namespace App\Livewire\Admin\Jobs;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.admin.jobs.show')
            ->layout('components.layouts.custom');
    }
}
