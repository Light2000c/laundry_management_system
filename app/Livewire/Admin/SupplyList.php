<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class SupplyList extends Component
{

    public $displayForm = false;

    public function render()
    {
        return view('livewire.admin.supply-list');
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
