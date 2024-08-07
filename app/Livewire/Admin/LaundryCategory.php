<?php

namespace App\Livewire\Admin;

use App\Models\LaundryCategory as ModelsLaundryCategory;
use Livewire\Component;
use Livewire\WithPagination;

class LaundryCategory extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $displayForm = false;
    public $name;
    public $price;
    public $busy = false;
    private $laundryCategories;
    public $activeCategoryId;

    public $search = "";

    public $rules = [
        "name" => "required|unique:laundry_categories,name",
        "price" => "required",
    ];


    public function mount()
    {
        // $this->load();
    }


    public function render()
    {
        $this->load();

        return view('livewire.admin.laundry-category', [
            "laundryCategories" => $this->laundryCategories,
        ]);
    }


    public function updatedSearch($value)
    {

        $this->load();
    }

    public function load()
    {
        if (!$this->search) {
            $this->laundryCategories = ModelsLaundryCategory::orderBy("created_at", "DESC")->paginate(10);
        } else {
            $this->laundryCategories = ModelsLaundryCategory::where("name", "LIKE", '%' . $this->search . '%')->orderBy("created_at", "DESC")->paginate(10);
        }
    }


    public function showForm()
    {
        $this->name = "";
        $this->price = "";
        $this->displayForm = true;
    }

    public function hideForm()
    {
        $this->displayForm = false;
    }

    public function send()
    {

        $validate =  $this->validate($this->rules);

        $this->busy = true;

        $create = ModelsLaundryCategory::create($validate);

        if (!$create) {
            $this->busy = false;
            $this->showAlert("error", "Category was not successfully added.");
        }

        $this->busy = false;
        $this->resetFields();
        $this->load();
        $this->showAlert("success", "Category was successfully added.");
    }


    public function openUpdateModal($laundryCategoryId)
    {
        $this->displayForm = false;
        $this->activeCategoryId = $laundryCategoryId;
        $laundryCategory = ModelsLaundryCategory::find($laundryCategoryId);
        $this->name = $laundryCategory->name;
        $this->price = $laundryCategory->price;
        return $this->dispatch("updateModal", ["laundrycategoryId" => $laundryCategoryId]);
    }


    public function updateLaundryCategory()
    {


        $laundryCategory = ModelsLaundryCategory::find($this->activeCategoryId);

        if ($this->name === $laundryCategory->name) {
            $this->validate([
                "name" => "required",
                "price" => "required"
            ]);
        } else {
            $this->validate([
                "name" => "required|unique:laundry_categories,name",
                "price" => "required"
            ]);
        }

        $this->busy = true;

        $laundryCategory->name = $this->name;
        $laundryCategory->price = $this->price;
        $save = $laundryCategory->save();

        if (!$save) {
            $this->busy = false;
            $this->showAlert("error", "Category was not successfully updated.");
        }

        $this->busy = false;
        $this->load();
        $this->resetFields();
        $this->dispatch("closeUpdateModal");
        $this->showAlert("success", "Category was successfully updated.");
    }


    public function deleteCategory(ModelsLaundryCategory $laundryCategory)
    {

        $delete = $laundryCategory->delete();

        if (!$delete) {
            $this->showAlert("error", "Category was not successfully deleted.");
        }


        $this->load();
        $this->showAlert("success", "Category was successfully deleted.");
    }

    public function resetFields()
    {
        $this->name = "";
        $this->price = "";
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
