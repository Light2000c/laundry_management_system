<?php

namespace App\Livewire\Components;

use App\Models\Blog;
use Carbon\Carbon;
use Livewire\Component;

class BlogPostText extends Component
{
    public $blog;

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
    }
    
    public function render()
    {
        return view('livewire.components.blog-post-text');
    }


    public function formatDate($date)
    {
     
        $date = Carbon::parse($date);
        $formattedDate = $date->format('D, M j Y h:i A');

        return $formattedDate;
    }
}
