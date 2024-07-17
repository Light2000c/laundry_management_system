<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Agreement extends Component
{
    public function render()
    {
        return view('livewire.pages.agreement')->layout("components.pages.app");
    }
}
