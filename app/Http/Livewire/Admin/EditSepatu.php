<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EditSepatu extends Component
{
    public $products = [];
    public $image_preview, $nama_barang, $harga, $berat, $ukuran, $jenis_barang, $gender, 
           $deskripsi, $stock_barang, $like;    
    public $userIdBeingRemoved = null;

    // public function mount()
    // {
    
    //     $this->products = Product::latest()->get();
      
    // }

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
        if($data)
        {
            // Storage::delete($data->id);
           
            $data->delete();
            $this->dispatchBrowserEvent('show-close-delete-modal', 'success');
            $this->emit('delete');
            
        }
    }


    public function closebuttonmodal()
    {
            $this->dispatchBrowserEvent('hide-cancel-delete-modal');
    }

}
