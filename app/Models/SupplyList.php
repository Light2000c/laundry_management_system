<?php

namespace App\Models;

use App\Models\Inventry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplyList extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function inventries(){
        return $this->hasMany(Inventry::class);
    }

    public function availableSupply($supply_id){
        return  Inventry::where("supply_list_id", $supply_id)->where("type", "in")->sum("quantity");
      }
  
}
