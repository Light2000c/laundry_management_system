<?php

namespace App\Livewire\Admin;

use App\Models\LaundryItem;
use App\Models\LaundryList;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class Report extends Component
{

    public $laundries;
    public $laundry_total = 0;
    public $dateFrom;
    public $dateTo;

    public function mount()
    {
        $this->load();
    }

    public function render()
    {
        return view('livewire.admin.report');
    }

    public function load()
    {

        $laundries = LaundryList::orderBy("created_at", "DESC")->take(10)->get();
        $this->laundries = $laundries;

        $this->getLaundryTotal($laundries);

    }

    public function getLaundryTotal($laundries){
        $laundry_total = 0;

        foreach ($laundries as $laundry) {
            $total = 0;
            $laundry_items = LaundryItem::where("laundry_list_id", $laundry->id)->get();

            foreach ($laundry_items as $item) {
                $total = $total + ($item->weight * $item->laundryCategory->price);
            }

            $laundry_total = $laundry_total + $total;
        }

        $this->laundry_total = $laundry_total ? $laundry_total : null;
    }


    public function getTotal($laundryId)
    {
        $total = 0;

        $laundry_items = LaundryItem::where("laundry_list_id", $laundryId)->get();


        foreach ($laundry_items as $item) {
            $total = $total + ($item->weight * $item->laundryCategory->price);
        }

        return $total;
    }

    public function filterByDate()
    {

        // dd($this->dateFrom, $this->dateTo);
        if(!$this->dateFrom || !$this->dateFrom){
            return;
        }

        $laundries = LaundryList::where("created_at", ">=", $this->dateFrom)->where("created_at", "<=", $this->dateTo)->orderBy("created_at", "DESC")->take(10)->get();

        $this->laundries = $laundries;

        $this->getLaundryTotal($laundries);
    }


    public function downloadPdf(){

        if(!$this->laundries){
            return;
        }

        return redirect()->route("generate-report-pdf", ["dateFrom" => $this->dateFrom? $this->dateFrom : "undefined", "dateTo" => $this->dateTo? $this->dateTo : "undefined"]);

    }

   
}
