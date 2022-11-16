<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use App\Models\Product;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $amount = 6;
    public $products;   

    // atribut filtering
    public $search, $min ,$max;
    protected $queryString = ['search'];
    protected $listeners = ['reloadHome'];


    public function mount()
    {
        $this->products = Product::latest()->take($this->amount)->get();

    }



    public function render()
    {

        return view('livewire.home')->extends('layouts.app')->section('content');
    }



    public function reloadHome($kategori_id, $gender_id, $query)
    {
        $this->products = Product::query();
        if($kategori_id)
        {
            $this->products = $this->products->where('kategori_id', $kategori_id);
        }

        if($gender_id)
        {
            // $this->products = $this->products->where('gender', 'like', '%' . $gender . '%'); 
            $this->products = $this->products->where('gender_id', $gender_id);

        }
        
        if($query)
        {
            $this->products = $this->products->where('nama_barang', 'like', '%' . $query . '%'); 
        }

        $this->products = $this->products->get();
    }

    

    public function loadProduct()
    {
        $this->amount +=3;
        return  $this->products = Product::latest()->take($this->amount)->get();

    }
    
}
