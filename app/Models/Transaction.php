<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Price;

class Transaction extends Model
{
    use HasFactory;

   
    public function prices(){
        return $this->hasMany(Price::class);
    }
}
