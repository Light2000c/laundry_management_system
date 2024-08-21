<?php

namespace App\Livewire\Components;

use App\Models\User;
use Livewire\Component;

class Test extends Component
{
    public function render()
    {
        return view('livewire.components.test');
    }

    public function send(){

        $count = 7000;
        while($count > 6000){
            $count = $count + 1;
   
        }
    }
}
