<?php

namespace App\Http\Livewire\Admin;


use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahSepatu extends Component
{
    
    use WithFileUploads;
    
    public $title, $images = [];

    public function render()
    {
        return view('livewire.admin.tambah-sepatu')->extends('layouts.app-admin')->section('content');
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'images' => 'required',
        ]);
    }

    public function storeProduct()
    {
        $this->validate([
            'title' => 'required',
            'images' => 'required',
        ]);

        

        $product = new Product();
        $product->title = $this->title;
        $product->save();

        foreach($this->images as $key => $image) {
            $pimage = new ProductImage();
            $pimage->product_id = $product->id;

            $imageName = Carbon::now()->timestamp . $key . '.' .$this->images[$key]->extension();
            $this->images[$key]->storeAs('all', $imageName);

            $pimage->image = $imageName;
            $pimage->save();
        }

        $product->save();
        session()->flash('message', 'Product berhasil');

        $this->title = null;
        $this->images = null;
    }
 
    // public function uploadImages()
    // {
    //     // $this->validate([
    //     //     'photos.*' => 'image|max:1024', // 1MB Max
    //     // ]);
 
    //     foreach($this->images as $key=>$image)
    //     {

    //         $this->images[$key] = $image->store('images', 'public');
    //     }
    //     $this->images = json_encode($this->images);
    //     image::create(['filename' => $this->images]);
    //     session()->flash('message', 'Berhasil');
    //     $this->emit('imagesUploaded');
    // }
}
