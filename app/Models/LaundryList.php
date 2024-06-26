<?php

namespace App\Models;

use App\Models\Payment;
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
        "reference",
        "paid_at",
    ];

    public function laundryItem(){
        return $this->hasMany(LaundryItem::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
