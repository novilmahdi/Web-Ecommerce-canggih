<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProdukDetail extends Component
{

   
    public $data;
    // public $nama,$gambar,$data_id;
      public $products = [];

    public function mount($id)
    {
      
         
        $data = Produk::find($id);

        if($data){
            $this->data_id = $data->id;
            $this->gambar = $data->gambar;
            $this->nama= $data->nama;
            $this->harga= $data->harga;
            $this->berat= $data->berat;
         
         
    
        }

    }

    public function render()
    {
      
     

        return view('livewire.produk-detail')->extends('layouts.app')->section('content');
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
        $produk= Produk::find($id);

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
