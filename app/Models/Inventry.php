<?php

namespace App\Models;

use App\Models\SupplyList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventry extends Model
{
    use HasFactory;

    protected $fillable = [
        "supply_list_id",
        "quantity",
        "type"
    ];

    public function supplyList(){
        return $this->belongsTo(SupplyList::class);
    }
}
