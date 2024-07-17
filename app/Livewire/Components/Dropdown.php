<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dropdown extends Component
{
    public function render()
    {
        return view('livewire.components.dropdown');
    }

    public function logout(){

        if(Auth::user()){
            Auth::logout();

            return redirect()->route("login");
        }
    }
}
