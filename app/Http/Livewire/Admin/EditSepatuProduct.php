<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSepatuProduct extends Component
{

    use WithFileUploads;
    public $nama_barang, $images, $images_preview, $harga, $berat, $ukuran,
           $jenis_barang, $gender, $deskripsi, $stock_barang = [];
    public $product_id;
    public $product, $product2 = [];
  

    public function mount($id)
    {
        $product = Product::where('id', $id)->first();

      
            $this->product_id = $product->id;
            $this->nama_barang = $product->nama_barang;
            $this->images_preview = $product->image_preview;
            $this->harga = $product->harga;
            $this->berat = $product->berat;
            $this->ukuran = $product->ukuran;
            $this->jenis_barang = $product->jenis_barang;
            $this->gender = $product->gender;
            $this->deskripsi = $product->deskripsi;
            $this->stock_barang = $product->stock_barang;
  
      
    }



    public function render()
    {
      
        

        $ProductImages = ProductImage::where('product_id', $this->product_id)->get();

        return view('livewire.admin.edit-sepatu-product', ['ProductImages' => $ProductImages])->extends('layouts.app-admin')->section('content');
        
    }

    
    public function updated($fields)
    {
     
            $this->validateOnly($fields, [
                'nama_barang' => 'required',
                'images_preview' => 'file|max:7000',
                'harga' => 'required|integer',
                'berat' => 'required|integer',
                'ukuran' => 'required|integer',
                'jenis_barang' => 'required',
                'gender' => 'required',
                'deskripsi' => 'required',
                'stock_barang' => 'required|integer',
            ]);
     
    }

    public function updateProduct()
    {
        if($this->images_preview != '')
        {
            $this->validate([
                'nama_barang' => 'required',
                'images_preview' => 'file|max:7000',
                'harga' => 'required|integer',
                'berat' => 'required|integer',
                'ukuran' => 'required|integer',
                'jenis_barang' => 'required',
                'gender' => 'required',
                'deskripsi' => 'required',
                'stock_barang' => 'required|integer',
                
            ]);
    
            // $imageNamePreview = md5($this->images_preview . microtime()).'.'.$this->images_preview->extension();
            // Storage::disk('public')->putFileAs('photos', $this->images_preview,$imageNamePreview);


            $imageNamePreview = $this->images_preview->store('all');
    
            $product = Product::where('id', $this->product_id)->first();
    
            // if($product)
            // {
            //     Storage::delete("all/".$product->image);
            // }
    
            $product->nama_barang = $this->nama_barang;
            $product->image_preview = $imageNamePreview;
            $product->harga = $this->harga; 
            $product->berat =  $this->berat;  
            $product->ukuran = $this->ukuran; 
            $product->jenis_barang =  $this->jenis_barang; 
            $product->gender = $this->gender;
            $product->deskripsi = $this->deskripsi;
            $product->stock_barang = $this->stock_barang;
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
        
     
        $this->dispatchBrowserEvent('showModalSuccess');
        }

        else

        {
            $this->validate([
                'nama_barang' => 'required',
                // 'images_preview' => 'file|max:7000',
                'harga' => 'required|integer',
                'berat' => 'required|integer',
                'ukuran' => 'required|integer',
                'jenis_barang' => 'required',
                'gender' => 'required',
                'deskripsi' => 'required',
                'stock_barang' => 'required|integer',
                
            ]);
    
            
            // $imageNamePreview = $this->images_preview->store('all');
    
            $product = Product::where('id', $this->product_id)->first();
    
            // if($product)
            // {
            //     Storage::delete("all/".$product->image);
            // }
    
            $product->nama_barang = $this->nama_barang;
            // $product->image_preview = $imageNamePreview;
            $product->harga = $this->harga; 
            $product->berat =  $this->berat;  
            $product->ukuran = $this->ukuran; 
            $product->jenis_barang =  $this->jenis_barang; 
            $product->gender = $this->gender;
            $product->deskripsi = $this->deskripsi;
            $product->stock_barang = $this->stock_barang;
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
        
     
        $this->dispatchBrowserEvent('showModalSuccess');
        }
        
    
    }

    public function deleteImage($id)
    {
        $image = ProductImage::where('id', $id)->first();
        $image->delete();
        session()->flash('message', 'Gambar berhasil dihapus');
    }

    public function resetfields()
    {
        $this->images_preview = null;
        // $this->images = null;
        
        // $this->nama_barang = null;
        // $this->harga = null;
        // $this->berat = null;
        // $this->ukuran = null;
        // $this->jenis_barang = null;
        // $this->gender = null;
        // $this->stock_barang = null;
        // $this->deskripsi = null;
    }
}
