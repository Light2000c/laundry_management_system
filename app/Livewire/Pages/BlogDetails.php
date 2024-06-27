<?php

namespace App\Livewire\Pages;

use App\Models\Blog;
use Carbon\Carbon;
use Livewire\Component;

class BlogDetails extends Component
{
    public $blog;
    public $latests;

    public function mount(Blog $blog){
        $this->blog = $blog;
        $this->latests = Blog::orderBy("created_at", "DESC")->take(4)->get();
    }

    public function render()
    {
        return view('livewire.pages.blog-details')->layout("components.pages.app");
    }


    public function formatDate($date)
    {
        // $dateString = '2024-06-27 15:20:08';
        $date = Carbon::parse($date);
        $formattedDate = $date->format('D, M j Y h:i A');

        return $formattedDate;
    }
}
