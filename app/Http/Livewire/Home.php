<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use App\Models\Product;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{

    public $products = [];

    // atribut filtering
    public $search, $min ,$max;
    protected $queryString = ['search'];


    public function mount()
    {

        $this->reset();
    }

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
            $this->products = Product::latest()->where('nama_barang', 'like', '%' .$this->search.'%')
                                    ->where('harga', '>=', $harga_min)
                                    ->where('harga', '<=', $harga_max)
                                    ->get();
        }else
        {

            $this->products = Product::latest()->where('harga', '>=', $harga_min)
                                    ->where('harga', '<=', $harga_max)
                                    ->get();
        }

        return view('livewire.home')->extends('layouts.app')->section('content');
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
        // mencari data produk
        $produk = Product::find($id);

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


    public function searchItem()
    {
      //  Validate
         $this->validate([
             'search' => 'required'
         ]);
        
        if($this->search)
        
        {

         $this->products = Product::where('nama_barang', 'like', '%'.$this->search.'%')->get();
        }
        
    }
}
