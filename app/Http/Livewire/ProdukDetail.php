<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Produk;
use App\Models\Suka;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\Table\Table;
use Livewire\Component;
use Psy\Command\WhereamiCommand;

class ProdukDetail extends Component
{

   
      public $data, $product_id;
      public $products = [];
      public $suka_like = 0;
      

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
        $ProductLike = Suka::where('product_id', $this->product_id)->get()->count();
        return view('livewire.produk-detail', ['ProductImages' => $ProductImages], compact('ProductLike'))->extends('layouts.app')->section('content');

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


    public function suka($id)
    {
        if(!Auth::user())
        {
            return redirect()->to('login');
        }
        if(Auth::user()->level == 1)
        {
            return redirect()->to('login');
        }

        //mencari data product
        $produk_suka = Product::find($id);
        $updateSuka = Suka::where('user_id', Auth::user()->id)->first();

        
        //Cek , jika di tabel masih kosong jalankan ini ,dan tambah data baru
        if( Suka::where('user_id', Auth::user()->id)->first() == null )
           {
                Suka::create(
                 [
                   'user_id' => Auth::user()->id,
                   'product_id' => $produk_suka->id,
                   'suka'  => 1
                   ]
                );
                
                    $this->dispatchBrowserEvent('showToastSuka');
            }
        // End


            //Cek, apakah ada data, kalau ada lakukan update
            elseif( Suka::where('user_id', Auth::user()->id)
                        ->where('product_id', $this->product_id)
                        ->first())

            {
                if($updateSuka->suka == 1)
                {
                        $updateSuka->delete();
                        $this->dispatchBrowserEvent('showToastTidakSuka');
                        
                    }
             }
            //  End


            // jika data tidak kosong pada tabel , bisa lakukan tambah data baru
             else
             {
             Suka::create(
                [
                  'user_id' => Auth::user()->id,
                  'product_id' => $produk_suka->id,
                  'suka'  => 1
                  ]
               );
               
                   $this->dispatchBrowserEvent('showToastSuka');
             }
            //  End
 
        }
}
