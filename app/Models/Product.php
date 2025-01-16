<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Price;


class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function prices(){
        //dd($this->id);
        return $this->hasMany(Price::class);
        //return $price->latest();
        //return Price::where('product_id',$this->id)->latest(); 
    }
}
