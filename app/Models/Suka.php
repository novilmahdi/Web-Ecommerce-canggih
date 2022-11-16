<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suka extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'suka'];

    //dimiliki atau terhubung dengan tabel product
    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
