<?php

namespace App\Livewire\Components;

use Livewire\Component;

class BlogPostText extends Component
{
    public $title;
    
    public function render()
    {
        return view('livewire.components.blog-post-text');
    }
}
