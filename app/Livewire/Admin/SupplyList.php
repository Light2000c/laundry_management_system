<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\SupplyList as Supply;
use Livewire\WithPagination;

class SupplyList extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    private $supplies;
    public $name;
    public $displayForm = false;
    public $busy = false;
    public $supply;
    public $is_update = false;

    public $search = "";

    public function mount()
    {
        // $this->load();
    }

    public function render()
    {
        $this->load();

        return view('livewire.admin.supply-list', [
            "supplies" => $this->supplies,
        ]);
    }

    public function updatedSearch($value)
    {
        $this->load();
    }

    public function load()
    {
        if (!$this->search) {
            $this->supplies = Supply::orderBy("created_at", "DESC")->paginate(10);
        } else {
            $this->supplies = Supply::orderBy("created_at", "DESC")->where("created_at", "LIKE", '%' . $this->search . '%')->paginate(10);
        }
    }

    public function showForm()
    {
        $this->displayForm = true;
    }

    public function hideForm()
    {
        $this->displayForm = false;
    }

    public function send()
    {

        if (!$this->is_update) {
            return  $this->create();
        }

        if ($this->is_update) {
            return $this->update($this->supply);
        }
    }

    public function create()
    {
        $this->validate([
            "name" => "required|unique:supply_lists,name",
        ]);

        $this->busy = true;

        $supply = Supply::create([
            "name" => $this->name,
        ]);

        if (!$supply) {
            $this->busy = false;
            return $this->showAlert("error", "Supply was not successfuly added.");
        }

        $this->busy = false;
        $this->resetField();
        $this->load();
        return $this->showAlert("success", "Supply has been successfuly added.");
    }

    public function update(Supply $supply)
    {


        if ($supply->name !== $this->name) {
            $this->validate([
                "name" => "required|unique:supply_lists,name",
            ]);
        }

        $supply->name = $this->name;
        $update = $supply->save();

        if (!$update) {
            return $this->showAlert("error", "Supply was not successfuly update.");
        }

        $this->supply = "";
        $this->is_update = false;
        $this->resetField();
        $this->load();
        return $this->showAlert("success", "Supply has been successfuly updated.");
    }

    public function isUpdate(Supply $supply)
    {
        $this->is_update = true;

        $this->name = $supply->name;
        $this->supply = $supply;
    }


    public function delete(Supply $supply)
    {

        $delete = $supply->delete();

        if (!$delete) {
            return $this->showAlert("error", "Supply was not successfuly deleted.");
        }

        $this->load();
        return $this->showAlert("success", "Supply has been successfuly deleted.");
    }


    public function resetField()
    {
        $this->name = "";
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
