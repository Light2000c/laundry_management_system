<?php

namespace App\Livewire\Admin;

use App\Mail\LaundryMail;
use App\Models\LaundryCategory;
use App\Models\LaundryItem;
use App\Models\LaundryList as ModelsLaundryList;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class LaundryList extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    private $laundry_lists;
    public $laundry_categories;
    public $active_laundry;
    public $laundry_items = array();
    public $category_id;
    public $weight;
    public $errorMessage;
    public $customer_name;
    public $email;
    public $remark;
    public $weights = [];
    public $busy = false;
    public $status;
    public $reference;

    public $search = "";

    public $weightRules = [];

    public $laundryItemRules = [
        "category_id" => "required",
        "weight" => "required|numeric|min:1"
    ];

    public $rules = [
        "customer_name" => "required",
        "email" => "required",
        "remark" => "required"
    ];



    public function mount()
    {

        // $this->load();
    }

    public function render()
    {

        $this->load();

        return view('livewire.admin.laundry-list', [
            "laundry_lists" => $this->laundry_lists,
        ]);
    }

    public function updatedSearch($value)
    {
        $this->load();
    }

    public function load()
    {
        if (!$this->search) {
            $this->laundry_lists = ModelsLaundryList::paginate(5);
        } else {
            $this->laundry_lists = ModelsLaundryList::where("customer_name", "LIKE", '%' . $this->search . '%')->orWhere("reference", "LIKE", '%' . $this->search . '%')->paginate(5);
        }

        $this->laundry_categories = LaundryCategory::get();
    }

    public function refreshList()
    {
        $this->laundry_items = array();
        $this->weights = [];
        $this->weight = [];
        $this->customer_name = "";
        $this->email = "";
        $this->remark = "";
        $this->errorMessage = "";
        $this->resetPage();
    }


    public function openCreateModal()
    {

        $this->refreshList();

        return  $this->dispatch("createModal");
    }


    public function updateWeights()
    {

        $this->weightRules["weights." . $this->category_id] = "required|numeric|min:1";

        // dd($this->weightRules);

        $this->weights[$this->category_id] = $this->weight;
    }

    public function addToLaundryItem()
    {
        $this->errorMessage = "";

        $this->validate($this->laundryItemRules);

        if ($this->itemExist($this->category_id)) {
            return $this->errorMessage = "Item already exist in list you can increase the count";
        }


        $this->updateWeights();


        $new_item = [
            "id" => "unknown",
            "category_id" => $this->category_id,
            "weight" => $this->weight
        ];

        array_push($this->laundry_items, $new_item);

        return $this->resetItemField();
    }


    public function updateLaundryItem($id)
    {
        $this->errorMessage = "";

        $this->validate($this->laundryItemRules);

        if ($this->itemExist($this->category_id)) {
            // return $this->errorMessage = "Item already exist in list you can increase the count";
        }


        $this->updateWeights();


        $new_item = [
            "id" => $id,
            "category_id" => $this->category_id,
            "weight" => $this->weight
        ];

        array_push($this->laundry_items, $new_item);

        return $this->resetItemField();
    }


    public function openUpdateModal($id)
    {
        $this->refreshList();

        $laundry = ModelsLaundryList::find($id);
        $this->active_laundry = $laundry;
        $this->customer_name  = $laundry->customer_name;
        $this->email  = $laundry->email;
        $this->remark  = $laundry->remark;
        $this->status  = $laundry->status;

        $laundry_items = LaundryItem::where("laundry_list_id", $laundry->id)->get();


        foreach ($laundry_items as $item) {
            $this->category_id = $item->laundry_category_id;
            $this->weight = $item->weight;

            $this->updateLaundryItem($item->id);
        }


        return $this->dispatch("updateModal", ["id" => $id]);
    }


    public function updateWeight($category_id, $value)
    {
        //  dd($category_id);

        $index = $this->findIndex($this->laundry_items, $category_id);

        // dd($index);

        if (!array_key_exists($category_id, $this->weights)) {
            return;
        }

        $this->weights[$category_id] = $value;

        if ($index == -1) {
            return;
        }

        $this->laundry_items[$index]["weight"] = $value;
    }


    public function itemExist($id)
    {

        foreach ($this->laundry_items as $item) {
            if ($item["category_id"] == $id) {
                return true;
            }
        }
    }


    public function getLaundryItemName($id)
    {
        $laundryCategory = LaundryCategory::find($id);

        return $laundryCategory ? $laundryCategory->name : null;
    }


    public function getLaundryItemPrice($id)
    {
        $laundryCategory = LaundryCategory::find($id);

        return $laundryCategory ? $laundryCategory->price : null;
    }



    public function send()
    {



        $this->errorMessage = "";
        

        if($this->busy){
            return;
        }

        $this->validate($this->rules);

        if ($this->laundry_items) {
            $this->validate($this->weightRules);
        }

        if (!$this->laundry_items) {
            $this->busy = false;
            return $this->errorMessage = "You haven't added any item to the list";
        }

        $this->generateReference();

        $this->busy = true;

        $laundry =  ModelsLaundryList::create([
            "customer_name" => $this->customer_name,
            "email" => $this->email,
            "remark" => $this->remark,
            "reference" => $this->reference,
        ]);

        if (!$laundry) {
            $this->busy = false;
            return;
        }

        foreach ($this->laundry_items as $item) {
            LaundryItem::create([
                "laundry_list_id" => $laundry->id,
                "laundry_category_id" => $item["category_id"],
                "weight" => $item["weight"]
            ]);
        }

        $details = [
            "data" => $laundry,
        ];

       $this->sendMail($details);

        $this->busy = false;
        $this->load();
        $this->dispatch("closeCreateModal");
        return $this->showAlert("success", "Laundry has been successfully added.");
    }



    public function updateLaundry()
    {

        $this->errorMessage = "";

        // dd($this->weights);

        if ($this->laundry_items) {
            $this->validate($this->weightRules);
        }
        $this->validate($this->rules);

        $this->busy = true;

        $laundry = $this->active_laundry->update([
            "customer_name" => $this->customer_name,
            "email" => $this->email,
            "remark" => $this->remark,
            "status" => $this->status
        ]);

        if (!$laundry) {
            $this->busy = false;
            return;
        }

        if (!$this->laundry_items) {
            $this->busy = false;
            return $this->errorMessage = "You haven't added any item to the list";
        }


        foreach ($this->laundry_items as $item) {
            if ($item["id"] === "unknown") {
                LaundryItem::create([
                    "laundry_list_id" => $this->active_laundry->id,
                    "laundry_category_id" => $item["category_id"],
                    "weight" => $item["weight"]
                ]);
            } else {
                $laundry_item = LaundryItem::find($item["id"]);


                if ($laundry_item) {
                    $laundry_item->update([
                        "weight" => $item["weight"]
                    ]);
                }
            }
        }

        $this->busy = false;
        $this->load();
        $this->dispatch("closeUpdateModal");
        return $this->showAlert("success", "Laundry has been successfully updated.");
    }



    public function resetItemField()
    {
        $this->category_id = "";
        $this->weight = "";
    }


    public function findIndex($array, $id)
    {

        foreach ($array as $index => $item) {
            if ($item["category_id"] == $id) {
                return $index;
            }
        }

        return -1;
    }


    public function generateReference()
    {
        $random_number = "TN" . random_int(100000, 999999);
        return $this->reference = $random_number;
    }


    public function deleteLaundry($id)
    {
        $laundry = ModelsLaundryList::find($id);

        $delete = $laundry->delete();

        if (!$delete) {
            return $this->showAlert("error", "Laundry was not successfully deleted.");
        }

        $this->load();
        return $this->showAlert("success", "Laundry has been successfully deleted.");
    }

    public function deleteLaundryItem($category_id)
    {


        foreach ($this->laundry_items as $key => $value) {
            if ($value["category_id"] == $category_id) {
                unset($this->laundry_items[$key]);
            }
        }


        unset($this->weights[$category_id]);



        // $laundry_item = LaundryItem::find($id);

        // if ($laundry_item) {
        //     $delete = $laundry_item->delete();
        // }

        $this->laundry_items = array_values($this->laundry_items);

        // dd($this->laundry_items);

    }

    public function generateNewPdf($id)
    {

        return redirect()->route("generate-pdf", ["id" => $id]);
    }

    public function sendMail($details)
    {
      Mail::to($details["data"]->email)->send(new LaundryMail($details));
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
