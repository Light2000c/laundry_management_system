<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class LaundryCategory extends Component
{

    public $displayForm = false;

    public function render()
    {
        return view('livewire.admin.laundry-category');
    }


    public function showForm()
    {
        $this->displayForm = true;
    }

    public function hideForm()
    {
        $this->displayForm = false;
    }
}
