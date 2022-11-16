<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $flllable = ['image_p', 'nama_barang', 'harga', 'berat', 'ukuran',
                           'gender_id', 'deskripsi', 'stock_barang'];


    // memberitahu bahwa product bisa mempunyai banyak "suka" (sukas = ditambahkan 's' berarti jamak)
    public function sukas()
    {
    	return $this->hasMany(Suka::class);
    }

    public function gender()
    {
    
        return $this->belongsTo(Gender::class);  

    }
}
