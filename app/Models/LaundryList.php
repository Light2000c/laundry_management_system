<?php

namespace App\Models;

use App\Models\LaundryItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaundryList extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_name",
        "email",
        "status",
        "queue",
        "remark",
        "reference"
    ];

    public function laundryItem(){
        return $this->hasMany(LaundryItem::class);
    }
}
