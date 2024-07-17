<?php

namespace App\Livewire\Pages;

use App\Models\LaundryCategory;
use Livewire\Component;

class Price extends Component
{
    public function render()
    {

        $prices = LaundryCategory::orderBy("created_at",)->get();

        return view('livewire.pages.price', [
            "prices" => $prices
        ])->layout("components.pages.app");
    }
}
