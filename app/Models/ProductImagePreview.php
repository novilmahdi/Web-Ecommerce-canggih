<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImagePreview extends Model
{
    use HasFactory;
    protected $table = 'product_image_previews';
    protected $fillable = ['image_preview'];
}
