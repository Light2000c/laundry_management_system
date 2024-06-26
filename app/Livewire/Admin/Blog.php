<?php

namespace App\Livewire\Admin;

use App\Models\Blog as ModelBlog;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Blog extends Component
{

    use WithFileUploads;


    public $blogs;
    public $title;
    public $image;
    public $description;
    public $busy = false;
    public $activeBlog;
    public $toggle = "option2";


    public $rules = [
        "title" => "required|unique:blogs,title",
        "image" => "required|mimes:jpeg,png,jpg,webp,avif",
        "description" => "required",
    ];


    public function mount()
    {
        $this->load();
    }


    public function render()
    {
        return view('livewire.admin.blog');
    }


    public function load()
    {
        $this->blogs = ModelBlog::get();
    }


    public function openCreateModal()
    {
        $this->resetFields();
        return $this->dispatch("createModal");
    }


    public function send()
    {

        $this->validate($this->rules);

        $this->busy = true;


        $upload_name = time() . "-" . $this->title . '.' . $this->image->guessExtension();

        $upload = $this->image->storeAs('blog_images', $upload_name, 'public');

        if (!$upload) {
            $this->busy = false;
            $this->showAlert("error", "Something went wrong, please try again.");
        }

        $blog = Auth::user()->blog()->create([
            "title" => $this->title,
            "image" => $upload_name,
            "description" => $this->description,
        ]);


        if (!$blog) {
            $this->busy =  false;
            $this->showAlert("error", "Blog post was not successfully added.");
        }

        $this->resetFields();
        $this->load();
        $this->dispatch("closeCreateModal");
        $this->showAlert("success", "Blog post has been successfully added.");
    }

    public function openUpdateModal($id)
    {
        $this->resetFields();
        $blog = ModelBlog::find($id);
        $this->activeBlog = $blog;
        $this->title = $blog->title;
        $this->image = $blog->image;
        $this->description = $blog->description;
        $this->dispatch("updateModal");
    }

    public function update()
    {


        $this->busy = true;

        if ($this->toggle === "option1") {

            $this->validate([
                "title" => $this->activeBlog->title === $this->title ? "required" : "required|unique:blogs,title",
                "image" => "required|mimes:jpeg,png,jpg,webp,avif",
                "description" => "required"
            ]);


            $upload_name = time() . "-" . $this->title . '.' . $this->image->guessExtension();

            $upload = $this->image->storeAs('blog_images', $upload_name, 'public');
    
            if (!$upload) {
                $this->busy = false;
                $this->showAlert("error", "Something went wrong, please try again.");
            }

            $update = $this->activeBlog->update([
                "title" => $this->title,
                "image" => $upload_name,
                "description" => $this->description,
            ]);

            if (!$update) {
                $this->busy =  false;
                $this->showAlert("error", "Blog post was not successfully updated.");
            }

        } else {

            $this->validate([
                "title" => $this->activeBlog->title === $this->title ? "required" : "required|unique:blogs,title",
                "description" => "required"
            ]);


            $update = $this->activeBlog->update([
                "title" => $this->title,
                "description" => $this->description,
            ]);

            if (!$update) {
                $this->busy =  false;
                $this->showAlert("error", "Blog post was not successfully updated.");
            }
        }



        $this->resetFields();
        $this->load();
        $this->dispatch("closeUpdateModal");
        $this->showAlert("success", "Blog post has been successfully updated.");
    }



    public function delete(ModelBlog $blog)
    {

        $delete = $blog->delete();

        if (!$delete) {
            $this->showAlert("error", "Blog post was not successfully deleted.");
        }

        $this->load();
        $this->showAlert("success", "Blog post has been deleted.");
    }



    public function updateToggle($value)
    {
        $this->toggle = $value;
    }



    public function resetFields()
    {

        $this->title = "";
        $this->description = "";
        $this->activeBlog = "";
        $this->image =  "";
        $this->toggle = "";
        $this->busy = false;
    }


    public function showAlert($icon, $title)
    {
        $this->dispatch(
            'message',
            icon: $icon,
            title: $title,
        );
    }
}
