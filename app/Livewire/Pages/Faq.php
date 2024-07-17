<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Faq extends Component
{
    public function render()
    {
        return view('livewire.pages.faq')->layout("components.pages.app");
    }
}
