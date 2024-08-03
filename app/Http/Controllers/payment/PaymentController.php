<?php

namespace App\Http\Controllers\payment;

use Carbon\Carbon;
use App\Models\LaundryList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    public function handleGatewayCallback()
    {

        // dd(Carbon::now()->toDateTimeString());
        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);
        // dd($paymentDetails["data"]["metadata"]["laundry_id"]);

        $id = $paymentDetails["data"]["metadata"]["laundry_id"];
        $laundry = LaundryList::find($id);

        if ($paymentDetails["status"]) {

            $paid = $laundry->payment()->create([
                "amount" => (int) $paymentDetails["data"]["amount"] / 100,
                "type" => "online"
            ]);

            if (!$paid) {
            }

            $updateLaundry = $laundry->update([
                "paid_at" => Carbon::now()->toDateTimeString(),
            ]);

            if (!$updateLaundry) {
            }

           return redirect()->route("track", ["message" => "Payment successful. you can download a receipt of your laundry to confirm payment status."]);
        }
    }

    public function generateNewPdf($id)
    {

        return redirect()->route("receipt-pdf", ["id" => $id]);
    }




    // public function showAlert($icon, $title)
    // {
    //     $this->dispatch(
    //         'message',
    //         icon: $icon,
    //         title: $title,
    //     );
    // }
}
