<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductImagePreview;
use App\Models\Suka;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSepatuProduct extends Component
{

    use WithFileUploads;
    public $nama_barang, $images, $images_preview, $harga, $berat, $ukuran,
           $gender, $deskripsi, $stock_barang = [];



    public $product_id,$gender_id;
    // public $product = [];
    public $preferred = false;


  

    public function mount($id)
    {
            $product = Product::where('id', $id)->first();
      
            $this->product_id = $product->id;
            $this->nama_barang = $product->nama_barang;
            $this->harga = $product->harga;
            $this->berat = $product->berat;
            $this->ukuran = $product->ukuran;
            $this->gender = $product->gender_id;
            // $this->preferred = $product->gender_id;
            $this->deskripsi = $product->deskripsi;
            $this->stock_barang = $product->stock_barang;
      
    }



    public function render()
    {
      
        $ProductImages = ProductImage::where('product_id', $this->product_id)->latest()->get();
        $ProductImagesPreview = ProductImagePreview::where('product_id', $this->product_id)->get();
        return view('livewire.admin.edit-sepatu-product', ['ProductImages' => $ProductImages], ['ProductImagesPreview' => $ProductImagesPreview])->extends('layouts.app-admin')->section('content');
        
    }

    
    public function updated($fields)
    {
     
            $this->validateOnly($fields, [
                'nama_barang' => 'required',
                // 'images_preview' => 'file|max:7000',
                'harga' => 'required|integer',
                'berat' => 'required|integer',
                'ukuran' => 'required|integer',
                'preferred' => 'required',
                'deskripsi' => 'required',
                'stock_barang' => 'required|integer',
            ]);
     
    }

    public function updateProduct()
    {
        // Jika radio button true
        if($this->preferred)
        {
               // Jika Gambar Input Images_Preview, maka update Gambar
         if($this->images_preview)
         {
           $this->validate([
               'nama_barang' => 'required',
               'harga' => 'required|integer',
               'berat' => 'required|integer',
               'ukuran' => 'required|integer',
               'preferred' => 'required',
               'deskripsi' => 'required',
               'stock_barang' => 'required|integer',
               
           ]);

           $imageNamePreview = $this->images_preview->store('all');
           
           // Pengecekan dana mengahpus foto lama dari storage
           $data = Product::find($this->product_id);
           if($this->product_id)
            {
             File::delete('uploads/'.$data->image_p);
            }
           // End 
       
          // Update Tabel Product
           $product = Product::where('id', $this->product_id)->first();
           $product->image_p = $imageNamePreview;
           $product->nama_barang = $this->nama_barang;
           $product->harga = $this->harga; 
           $product->berat =  $this->berat;  
           $product->ukuran = $this->ukuran; 
           $product->gender_id = $this->preferred ;
           $product->deskripsi = $this->deskripsi;
           $product->stock_barang = $this->stock_barang;
           $product->save();
           // End
           
           
           //Update Tabel Gambar preview
           $ProductImagesP = ProductImagePreview::where('product_id', $this->product_id)->first();
           $ProductImagesP->image_preview = $product->image_p;
           $ProductImagesP->save();
           // end


           // Update Tabel Gambar Multiple
           if($this->images != '')
             {
               foreach($this->images as $key => $image) {
               $pimage = new ProductImage();
               $pimage->product_id = $product->id;
   
               $imageName = Carbon::now()->timestamp . $key . '.' .$this->images[$key]->extension();
               $this->images[$key]->storeAs('all', $imageName);
   
               $pimage->image = $imageName;
               $pimage->save();

                }   
              }
           // End   
               
              $this->images = '';     
              $this->dispatchBrowserEvent('ShowcloseModal');
             }

        // Maka jika tidak ada inputan Images_Preview, tidak melakukan update gambar  
        else
            {
           $this->validate([
               'nama_barang' => 'required',
               'harga' => 'required|integer',
               'berat' => 'required|integer',
               'ukuran' => 'required|integer',
               'preferred' => 'required',
               'deskripsi' => 'required',
               'stock_barang' => 'required|integer',
               
           ]);
   
           // Update Tabel Product
           $product = Product::where('id', $this->product_id)->first();
           $product->nama_barang = $this->nama_barang;
           $product->harga = $this->harga; 
           $product->berat =  $this->berat;  
           $product->ukuran = $this->ukuran; 
           $product->gender_id = $this->preferred;
           $product->deskripsi = $this->deskripsi;
           $product->stock_barang = $this->stock_barang;
           $product->save();
           // End


   
            // Update Tabel Gambar Multiple
             if($this->images != '')
               {
                 foreach($this->images as $key => $image) {
                 $pimage = new ProductImage();
                 $pimage->product_id = $product->id;
   
                  $imageName = Carbon::now()->timestamp . $key . '.' .$this->images[$key]->extension();
                  $this->images[$key]->storeAs('all', $imageName);
   
                  $pimage->image = $imageName;
                  $pimage->save();
          
                    }   
                }
                $this->images = '';
                $this->dispatchBrowserEvent('ShowcloseModal');
             }
        }
        //End radio buttun tru


        //Jika radio butto false
        else
        { 
            
        // Jika Gambar Input Images_Preview, maka update Gambar
         if($this->images_preview)
         {
           $this->validate([
               'nama_barang' => 'required',
               'harga' => 'required|integer',
               'berat' => 'required|integer',
               'ukuran' => 'required|integer',
               'deskripsi' => 'required',
               'stock_barang' => 'required|integer',
               
           ]);

           $imageNamePreview = $this->images_preview->store('all');
           
           // Pengecekan dana mengahpus foto lama dari storage
           $data = Product::find($this->product_id);
           if($this->product_id)
            {
             File::delete('uploads/'.$data->image_p);
            }
           // End 
       
          // Update Tabel Product
           $product = Product::where('id', $this->product_id)->first();
           $product->image_p = $imageNamePreview;
           $product->nama_barang = $this->nama_barang;
           $product->harga = $this->harga; 
           $product->berat =  $this->berat;  
           $product->ukuran = $this->ukuran; 
           $product->deskripsi = $this->deskripsi;
           $product->stock_barang = $this->stock_barang;
           $product->save();
           // End
           
           
           //Update Tabel Gambar preview
           $ProductImagesP = ProductImagePreview::where('product_id', $this->product_id)->first();
           $ProductImagesP->image_preview = $product->image_p;
           $ProductImagesP->save();
           // end


           // Update Tabel Gambar Multiple
           if($this->images != '')
             {
               foreach($this->images as $key => $image) {
               $pimage = new ProductImage();
               $pimage->product_id = $product->id;
   
               $imageName = Carbon::now()->timestamp . $key . '.' .$this->images[$key]->extension();
               $this->images[$key]->storeAs('all', $imageName);
   
               $pimage->image = $imageName;
               $pimage->save();

                }   
              }
           // End   
               
              $this->images = '';     
              $this->dispatchBrowserEvent('ShowcloseModal');
             }

        // Maka jika tidak ada inputan Images_Preview, tidak melakukan update gambar  
        else
            {
           $this->validate([
               'nama_barang' => 'required',
               'harga' => 'required|integer',
               'berat' => 'required|integer',
               'ukuran' => 'required|integer',
               'deskripsi' => 'required',
               'stock_barang' => 'required|integer',
               
           ]);
   
           // Update Tabel Product
           $product = Product::where('id', $this->product_id)->first();
           $product->nama_barang = $this->nama_barang;
           $product->harga = $this->harga; 
           $product->berat =  $this->berat;  
           $product->ukuran = $this->ukuran; 
           $product->deskripsi = $this->deskripsi;
           $product->stock_barang = $this->stock_barang;
           $product->save();
           // End


   
            // Update Tabel Gambar Multiple
             if($this->images != '')
               {
                 foreach($this->images as $key => $image) {
                 $pimage = new ProductImage();
                 $pimage->product_id = $product->id;
   
                  $imageName = Carbon::now()->timestamp . $key . '.' .$this->images[$key]->extension();
                  $this->images[$key]->storeAs('all', $imageName);
   
                  $pimage->image = $imageName;
                  $pimage->save();
          
                    }   
                }
                $this->images = '';
                $this->dispatchBrowserEvent('ShowcloseModal');
             }
        }
        //End radio button false
      
     
    
     }



    public function deleteImage($id)
    {
        $image = ProductImage::where('id', $id)->first();
        File::delete('uploads/all/'. $image->image);
        $image->delete();
        session()->flash('message', 'Gambar berhasil dihapus');
    }

}
