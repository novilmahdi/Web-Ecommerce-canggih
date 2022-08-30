<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belanja extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'produk_id', 'total_harga', 'status'];
}
