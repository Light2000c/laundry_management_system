<?php

namespace App\Livewire\Pages;

use App\Livewire\Components\BlogPost;
use App\Models\Blog as ModelsBlog;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    private $blogs;
    private $latests;

    public function render()
    {
        $this->load();

        return view('livewire.pages.blog', [
            "blogs" => $this->blogs,
            "latests" => $this->latests,
        ])->layout("components.pages.app");
    }

    public function load(){
        $this->blogs = ModelsBlog::paginate(6);
        $this->latests = ModelsBlog::orderBy("created_at", "DESC")->take(3)->get();
    }
}
