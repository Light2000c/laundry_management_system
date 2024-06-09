<?php

namespace App\Models;

use App\Models\LaundryList;
use App\Models\LaundryCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaundryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "laundry_list_id",
        "laundry_category_id",
    ];

    public function laundryList(){
        return $this->belongsTo(LaundryList::class);
    }

    public function laundryCategory(){
        return $this->belongsTo(LaundryCategory::class);
    }
}
