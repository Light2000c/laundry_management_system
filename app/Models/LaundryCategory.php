<?php

namespace App\Models;

use App\Models\LaundryItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaundryCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price"
    ];

  
    public function laundryItem(){
        return $this->hasMany(LaundryItem::class);
    }
}
