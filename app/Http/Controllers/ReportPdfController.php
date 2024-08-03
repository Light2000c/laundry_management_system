<?php

namespace App\Http\Controllers;

use App\Models\LaundryItem;
use App\Models\LaundryList;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class ReportPdfController extends Controller
{
    public function index($dateFrom, $dateTo)
    {

        $laundries = "";

        if ($dateFrom !== "undefined" && $dateTo !== "undefined") {
            $laundries = LaundryList::where("created_at", ">=", $dateFrom)->where("created_at", "<=", $dateTo)->orderBy("created_at", "DESC")->take(10)->get();
        } else {
            $laundries = LaundryList::orderBy("created_at", "DESC")->take(10)->get();
        }

        $total = $this->getLaundryTotal($laundries);

        $pdfData  = [
            "date" => date("m/d/y"),
            "laundries" => $laundries,
            "total" => $total
        ];

        $pdf = Pdf::loadView('reportpdf', $pdfData);

        return $pdf->download('invoice.pdf');
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

        return $laundry_total ? $laundry_total : null;
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


}
