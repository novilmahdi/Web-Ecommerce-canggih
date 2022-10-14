<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProdukDetail extends Component
{

   
    public $data, $product_id;
    // public $nama,$gambar,$data_id;
      public $products = [];

    public function mount($id)
    {
      
         
        $data = Product::where('id', $id)->first();
       
      $this->product_id = $data->id;

      $this->data_id = $data->id;
      $this->gambar = $data->image_p;
      $this->nama = $data->nama_barang;
      $this->harga = $data->harga;
      $this->berat = $data->berat;
      $this->ukuran = $data->ukuran;
      $this->gender = $data->gender;
      $this->deskripsi = $data->deskripsi;
         
    
        

    }

    public function render()
    {
      
        $ProductImages = ProductImage::where('product_id', $this->product_id)->latest()->get();
        return view('livewire.produk-detail', ['ProductImages' => $ProductImages])->extends('layouts.app')->section('content');

    }

    public function beli($id)
    {
        if(!Auth::user())
        {
            return redirect()->to('login');
        }
        if(Auth::user()->level == 1)
        {
            return redirect()->to('login');
        }
        

        //mencari data produk
        $produk= Product::find($id);

         //lalu ditambahkan ke tabel belanja
         Belanja::create(
            [
                'user_id' => Auth::user()->id,
                'total_harga' => $produk->harga,
                'produk_id' => $produk->id,
                'status' => 0                   // Angka 0 = Belum melakukan ongkos kirim & dibayar
            ]
            );

            $this->emit('masukKeranjang');
            $this->dispatchBrowserEvent('showToastSuccess');
    }
}
