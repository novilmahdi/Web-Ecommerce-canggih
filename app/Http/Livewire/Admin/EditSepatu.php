<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductImagePreview;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EditSepatu extends Component
{
    public $products = [];
    public $image_preview, $nama_barang, $harga, $berat, $ukuran, $jenis_barang, $gender, 
           $deskripsi, $stock_barang, $like;    
    public $userIdBeingRemoved = null;


    public function render()
    {   
        $this->products = Product::latest()->get();
        return view('livewire.admin.edit-sepatu')->extends('layouts.app-admin')->section('content');
    }

    
    public function confirmUserRemoval($productId)
    {
        $this->userIdBeingRemoved = $productId;
        $this->dispatchBrowserEvent('show-delete-modal');
       

    }

    public function deleteData()
    {
        $data = Product::findOrFail($this->userIdBeingRemoved);
        $ProductImagesP = ProductImage::where('product_id', $this->userIdBeingRemoved)->get();

        // Hapus Gambar banyak /multiple 
        foreach($ProductImagesP as $ProductImagesPs)
        {
            $this->ProductImagesP_delete = $ProductImagesPs;
            $image_name = $ProductImagesPs->image;

            unlink(public_path('uploads/all/'. $image_name));
                $this->ProductImagesP_delete->delete();
               
            }
        //End

        // Hapus sederhana
        if($data)
        {
            File::delete('uploads/'.$data->image_p);
            $data->delete();
        }

        $this->dispatchBrowserEvent('show-close-delete-modal', 'success');
        $this->emit('delete');
        //End
    }


    public function closebuttonmodal()
    {
            $this->dispatchBrowserEvent('hide-cancel-delete-modal');
    }

}
