<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.admin.posts.show')
            ->layout('components.layouts.custom');
    }
}
