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
    

    public $images_preview, $images, $nama_barang, $harga, $berat, $ukuran,
           $jenis_barang, $gender,  $deskripsi, $stock_barang, $like =  [];    

    public function render()
    {
        return view('livewire.admin.tambah-sepatu')->extends('layouts.app-admin')->section('content');
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nama_barang' => 'required',
            'images' => 'required',
            'images_preview' => 'required',
        ]);
    }

    public function storeProduct()
    {
        $this->validate([
            'nama_barang' => 'required',
            'images' => 'required',
            'images_preview' => 'required',
        ]);

        
    
        $imageNamePreview = $this->images_preview->store('all');
      
        
        $product = new Product();
        $product->image_preview = $imageNamePreview;
        $product->nama_barang = $this->nama_barang;
        $product->harga = $this->harga;
        $product->berat = $this->berat;
        $product->ukuran = $this->ukuran;
        $product->jenis_barang = $this->jenis_barang;
        $product->gender = $this->gender;
        $product->deskripsi = $this->deskripsi;
        $product->stock_barang = $this->stock_barang;
        $product->save();

        foreach($this->images as $key => $image) {
            $pimage = new ProductImage();
            $pimage->product_id = $product->id;

            $imageName = Carbon::now()->timestamp . $key . '.' .$this->images[$key]->extension();
            $this->images[$key]->storeAs('all', $imageName);

            $pimage->image = $imageName;
            $pimage->save();
        }
        
        session()->flash('message', 'Product berhasil');
        $this->dispatchBrowserEvent('showModalSuccess');
        
        $this->images_preview = null;
        $this->images = null;
        
        $this->nama_barang = null;
        $this->harga = null;
        $this->berat = null;
        $this->ukuran = null;
        $this->jenis_barang = null;
        $this->gender = null;
        $this->stock_barang = null;
        $this->deskripsi = null;
       
    }
 

}
