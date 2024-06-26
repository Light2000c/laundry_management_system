<?php

namespace App\Models;

use App\Models\LaundryList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    public $fillable = [
        "laundry_list_id",
        "amount",
        "type",
    ];

    public function laundryList()
    {
        return $this->belongsTo(LaundryList::class);
    }
}
