<?php

namespace App\Livewire\Admin;

use App\Models\LaundryList;
use App\Models\Payment;
use App\Models\SupplyList;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {

        $laundries = LaundryList::orderBy("created_at", "DESC")->get();
        $users = User::orderBy("created_at", "DESC")->get();
        $supplies = SupplyList::orderBy("created_at", "DESC")->get();

        $today = Carbon::today();
        $customers = LaundryList::orderBy("created_at", "DESC")->where("created_at", $today)->get();
        $payment = Payment::orderBy("created_at", "DESC")->where("created_at", $today)->get();


        return view('livewire.admin.dashboard', [
            "laundries" => $laundries,
            "users" => $users,
            "supplies" => $supplies,
            "customers" => $customers,
            "payment" => $payment
        ]);
    }
}
