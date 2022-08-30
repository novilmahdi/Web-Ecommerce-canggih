<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Store extends Component
{
    public $products = [];

    // atribut filtering
    public $search, $min ,$max;
    
    public function render()
    {

         // filter maximal
         if($this->max)
         {
             $harga_max   = $this->max;
         }else{
             $harga_max = 100000000;
         }
 
 
         // filter minimal
         if($this->min)
         {
             $harga_min   = $this->min;
         }else{
             $harga_min = 0;
         }
 
 
         // filter search
         if($this->search)
         {
             $this->products = Produk::latest()->where('nama', 'like', '%' .$this->search.'%')
                                     ->where('harga', '>=', $harga_min)
                                     ->where('harga', '<=', $harga_max)
                                     ->get();
         }else
         {
 
             $this->products = Produk::latest()->where('harga', '>=', $harga_min)
                                     ->where('harga', '<=', $harga_max)
                                     ->get();
         }

        return view('livewire.store')->extends('layouts.app')->section('content');
    }

    public function beli($id)
    {
        if(!Auth::user())
        {
            return redirect()->to('login');
        }

        // mencari data produk
        $produk = Produk::find($id);

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
            // return redirect()->to('BelanjaUser');
    }
}
