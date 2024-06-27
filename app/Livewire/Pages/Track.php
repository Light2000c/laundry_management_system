<?php

namespace App\Livewire\Pages;

use App\Models\LaundryItem;
use App\Models\LaundryList;
use Exception;
use Livewire\Component;
use Nette\Utils\Random;
use Unicodeveloper\Paystack\Facades\Paystack;

class Track extends Component
{

    public $laundry_lists;
    public $laundry_items;
    public $active_laundry;
    public $keyword = "";
    public $busy = false;

    public $rules = [
        "keyword" => "required"
    ];

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.pages.track')->layout("components.pages.app");
    }

    public function search()
    {
        $this->refresh();
        $this->laundry_lists = null;

        if ($this->busy) {
            return;
        }

        // $this->validate($this->rules);
        $this->validate([
            "keyword" => "required",
        ], ["keyword.required" => "Please enter a tracking number to continue"]);

        $this->busy = true;

        $laundry = LaundryList::where("reference", $this->keyword)->get();

        if (!$laundry->count()) {
            $this->busy = false;
            return $this->showAlert("Track Laundry", "We couldn't find any laundry associated with tracking number " . $this->keyword, "info");
        }


        $this->busy = false;
        $this->laundry_lists = $laundry;
    }

    public function openItemsModal($id)
    {
        $this->refresh();

        $laundry = LaundryList::find($id);

        $this->active_laundry = $laundry;

        $this->laundry_items = LaundryItem::where("laundry_list_id", $id)->get();

        return $this->dispatch("listItems");
    }

    public function getItemsCount($id)
    {
        return $this->laundry_items = LaundryItem::where("laundry_list_id", $id)->sum("weight");
    }


    public function pay($laundry)
    {
        // dd($laundry);

        $amount = 0;

        $laundry_items = LaundryItem::where("laundry_list_id", $laundry["id"])->get();


        foreach($laundry_items as $item){
            $amount = $amount + ($item->weight * $item->laundryCategory->price);
        }


        $data = array(
            "amount" => $amount * 100,
            "reference" => $this->generateOrderId(),
            "email" => $laundry["email"],
            "currency" => "NGN",
            "callback_url" => route('payment.callback'),
            "metadata" => [
                "laundry_id" => $laundry["id"]
            ]
        );

        try {
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (Exception $e) {
            dd($e->getMessage());
            // return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    public function refresh()
    {
        $this->active_laundry = null;
        $this->laundry_items = "";
    }

    public function generateOrderId(){
        return time().random_int(0, 99);
    }

    public function generateNewPdf($id){

        return redirect()->route("generate-pdf", ["id" => $id]);
    }

    public function showAlert($title, $text, $icon)
    {

        return $this->dispatch(
            "message",
            title: $title,
            text: $text,
            icon: $icon
        );
    }

    
}
