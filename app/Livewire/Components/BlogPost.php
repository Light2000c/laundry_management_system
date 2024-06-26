<?php

namespace App\Livewire\Components;

use Livewire\Component;

class BlogPost extends Component
{

    public $image;
    
    public function render()
    {
        return view('livewire.components.blog-post');
    }
}
