<?php

namespace App\Livewire\Admin;

use App\Models\Inventry as ModelsInventry;
use App\Models\SupplyList;
use Livewire\Component;

class Inventry extends Component
{

    public $supply_list_id;
    public $quantity;
    public $type;
    public $busy = false;
    public $supplies;
    public $inventries;
    public $currentInventryId;

    public function render()
    {
        return view('livewire.admin.inventry');
    }

    public function mount()
    {
        $this->load();
    }

    public function load()
    {
        $this->supplies = SupplyList::get();
        $this->inventries = ModelsInventry::get();
    }


    public function send()
    {


        $validate = $this->validate(
            [
                "supply_list_id" => "required",
                "quantity" => "required",
                "type" => "required"
            ],
            ["supply_list_id.required" => "The supply name is required"]
        );

        $this->busy = true;


        $create =  ModelsInventry::create($validate);

        if (!$create) {
            $this->busy = false;
            return $this->showAlert("error", "Inventry was not not successfully aded.");
        }


        $this->load();
        $this->resetField();
        $this->busy = false;
        $this->showAlert("success", "Inventry has been successfuly deleted.");
        return $this->dispatch('closeCreateInventory');
    }

    public function openCreateModal()
    {
        $this->currentInventryId = "";
        $this->supply_list_id = "";
        $this->quantity = "";
        $this->type = "";

        $this->dispatch('showCreateModal');
    }

    public function openUpdateModal($inventryId)
    {
        $inventry = ModelsInventry::find($inventryId);
        $this->currentInventryId = $inventry->id;
        $this->supply_list_id = $inventry->supply_list_id;
        $this->quantity = $inventry->quantity;
        $this->type = $inventry->type;

        $this->dispatch('showUpdateModal', ['id' => $inventry->id]);
    }


    public function updateInventry(){

        $validate = $this->validate(
            [
                "supply_list_id" => "required",
                "quantity" => "required",
                "type" => "required"
            ],
            ["supply_list_id.required" => "The supply name is required"]
        );

        $this->busy = true;


        $inventry = ModelsInventry::find($this->currentInventryId);

        $inventry->supply_list_id = $this->supply_list_id;
        $inventry->quantity= $this->quantity;
        $inventry->type = $this->type;
        $saved =  $inventry->save();

        if (!$saved) {
            $this->busy = false;
            return $this->showAlert("error", "Inventry was not not successfully updated.");
        }


        $this->load();
        $this->resetField();
        $this->busy = false;
        $this->currentInventryId = "";
        $this->showAlert("success", "Inventry has been successfuly updated.");
        return $this->dispatch('closeUpdateModal');
    }

    public function deleteInventry(ModelsInventry $inventry){

        $delete = $inventry->delete();

        if(!$delete){
            return $this->showAlert("error", "Inventry was not successfully deleted");
        }

        $this->load();
        return $this->showAlert("success", "Inventry has been successfully deleted");
    }


    public function resetField()
    {
        $this->supply_list_id  = "";
        $this->quantity  = "";
        $this->type  = "";
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
