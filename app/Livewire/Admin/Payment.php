<?php

namespace App\Livewire\Admin;

use App\Models\Payment as ModelsPayment;
use Livewire\Component;
use Livewire\WithPagination;

class Payment extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $payments = ModelsPayment::orderBy("created_at", "DESC")->paginate(10);

        return view('livewire.admin.payment', [
            "payments" => $payments
        ]);
    }
}
