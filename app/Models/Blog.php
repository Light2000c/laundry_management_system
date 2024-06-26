<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    public $fillable = [
        "user_id",
        "title",
        "image",
        "description",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
