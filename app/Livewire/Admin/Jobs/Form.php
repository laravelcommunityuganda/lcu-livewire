<?php

namespace App\Livewire\Admin\Jobs;

use Livewire\Component;

class Form extends Component
{
    public function render()
    {
        return view('livewire.admin.jobs.form')
            ->layout('components.layouts.custom');
    }
}
