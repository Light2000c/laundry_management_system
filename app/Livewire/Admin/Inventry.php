<?php

namespace App\Livewire\Admin;

use App\Models\Inventry as ModelsInventry;
use App\Models\SupplyList;
use Livewire\Component;
use Livewire\WithPagination;

class Inventry extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    private $inventries;
    public $supply_list_id;
    public $quantity;
    public $type;
    public $busy = false;
    public $supplies;
    public $currentInventryId;

    public $search = "";

    public function render()
    {

        $this->load();

        return view('livewire.admin.inventry', [
            "inventries" => $this->inventries
        ]);
    }

    public function mount()
    {
        $this->load();
    }

    public function updatedSearch($value)
    {
        $this->load();
    }

    public function load()
    {
        if (!$this->search) {
            $this->inventries = ModelsInventry::paginate(10);
        } else {
            $this->inventries = ModelsInventry::where("created_at", "LIKE", '%' . $this->search . '%')->paginate(10);
        }

        $this->supplies = SupplyList::get();
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

        $supply = SupplyList::find($this->supply_list_id);


        $create = "";

        if ($supply && $this->type === "used") {
            $total = (int) $supply->total - (int) $validate["quantity"];

            if ((int)$total < 0) {
                $this->busy = false;
                return $this->showAlert("error", "Available " . $supply->name . " is less than " . $validate["quantity"]);
            } else {

                $supply->update([
                    "total" => $total
                ]);
                $create =  ModelsInventry::create($validate);
            }
        } else {
            $total = (int) $supply->total + (int) $validate["quantity"];

            $supply->update([
                "total" => $total
            ]);
            $create =  ModelsInventry::create($validate);
        }



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
        $this->busy = false;

        $this->dispatch('showCreateModal');
    }

    public function openUpdateModal($inventryId)
    {
        $inventry = ModelsInventry::find($inventryId);
        $this->currentInventryId = $inventry->id;
        $this->supply_list_id = $inventry->supply_list_id;
        $this->quantity = $inventry->quantity;
        $this->type = $inventry->type;
        $this->busy = false;

        $this->dispatch('showUpdateModal', ['id' => $inventry->id]);
    }


    public function updateInventry()
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


        $inventry = ModelsInventry::find($this->currentInventryId);

        $inventry->supply_list_id = $this->supply_list_id;
        $inventry->quantity = $this->quantity;
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

    public function deleteInventry(ModelsInventry $inventry)
    {

        $delete = $inventry->delete();

        if (!$delete) {
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
