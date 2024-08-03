<?php

namespace App\Http\Controllers;

use App\Models\LaundryItem;
use App\Models\LaundryList;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfReceiptController extends Controller
{
    public function index($id)
    {


        $laundry_list = LaundryList::find($id);

        $laundry_items =  LaundryItem::where("laundry_list_id", $laundry_list->id)->get();

        $total_items = LaundryItem::where("laundry_list_id", $laundry_list->id)->sum("weight");

        //    dd($laundry_items);

        $data = [
            "date" => date("m/d/y"),
            "laundry_list" => $laundry_list,
            "laundry_items" => $laundry_items,
            "total_items" => $total_items,
        ];

        $pdf = Pdf::loadView('receiptpdf', $data);

    //    return $pdf->download('payment_receipt.pdf');

    return $pdf->stream('payment_receipt.pdf');
    }
}
