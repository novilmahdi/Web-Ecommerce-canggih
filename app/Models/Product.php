<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $flllable = ['image', 'image_p', 'nama_barang', 'harga', 'berat', 'ukuran', 'jenis_barang',
                           'gender', 'deskripsi', 'stock_barang', 'like'];
}
