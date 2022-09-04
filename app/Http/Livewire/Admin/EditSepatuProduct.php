<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSepatuProduct extends Component
{

    use WithFileUploads;
    public $title, $images = [];
    public $product_id;
  

    public function mount($id)
    {
        $product = Product::where('id', $id)->first();

        $this->product_id = $product->id;
        $this->title = $product->title;
    }

    public function render()
    {
        $ProductImages = ProductImage::where('product_id', $this->product_id)->get();
        return view('livewire.admin.edit-sepatu-product', ['ProductImages' => $ProductImages])->extends('layouts.app-admin')->section('content');
        
    }

    
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            
        ]);
    }

    public function updateProduct()
    {
        $this->validate([
            'title' => 'required',
            
        ]);

        

        $product = Product::where('id', $this->product_id)->first();
        $product->title = $this->title;
        $product->save();

     if($this->images != '')
     {
        foreach($this->images as $key => $image) {
            $pimage = new ProductImage();
            $pimage->product_id = $product->id;

            $imageName = Carbon::now()->timestamp . $key . '.' .$this->images[$key]->extension();
            $this->images[$key]->storeAs('all', $imageName);

            $pimage->image = $imageName;
            $pimage->save();
       

        $product->save();
        }   
        }
    $this->images = null;    
    session()->flash('message', 'Product update berhasil');
      
    }

    public function deleteImage($id)
    {
        $image = ProductImage::where('id', $id)->first();
        $image->delete();
        session()->flash('message', 'Gambar berhasil dihapus');
    }
}
