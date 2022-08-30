<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\RajaOngkir;
use Livewire\Component;

class TambahOngkir extends Component
{

    public $belanja;
    private $apiKey = '5f90c8eb38444b67f55d99d910c88491';
    public $provinsi_id, $kota_id, $jasa, $status, $daftarProvinsi, $daftarKota, $nama_jasa;
    public $result = [];
    public $tes;
    

    public function mount($id)
    {
        if(!Auth::user())
        {
            return redirect()->route('login');
        }
        $this->belanja = Belanja::find($id);


        //penegecekan belanja milik user id sekarang
        if($this->belanja->user_id != Auth::user()->id)
        {
            return redirect()->to('');
        }
    }
    

    public function render()
    {
        $rajaOngkir = new RajaOngkir($this->apiKey);
        $this->daftarProvinsi = $rajaOngkir->provinsi()->all();

        if($this->provinsi_id)
        {
            $this->daftarKota = $rajaOngkir->kota()->dariProvinsi($this->provinsi_id)->get();
           
        }

        return view('livewire.tambah-ongkir')->extends('layouts.app')->section('content');
    }


    public function getOngkir()
    {
        //Pengecekan jila tidak ada
        if(!$this->provinsi_id || !$this->kota_id || !$this->jasa)
        {
            return;
        }

        // Mengambil data produk
        $produk =  Produk::find($this->belanja->produk_id);

        // Mengambil biaya ongkir
        $rajaOngkir = new RajaOngkir($this->apiKey);
        $cost       = $rajaOngkir->ongkosKirim([
            'origin'        => 489,
            'destination'   => $this->kota_id,
            'weight'        => $produk->berat,
            'courier'       => $this->jasa
        ])->get();

       
        // Nama jasa
        $this->nama_jasa = $cost[0]['name'];
        // dd($this->nama_jasa);

        foreach ($cost[0]['costs'] as $row)
        {
            $this->result[] =  array(
                'description' => $row['description'],
                'biaya'       => $row['cost'][0]['value'],
                'etd'         => $row['cost'][0]['etd']  
            );

        }
    }

    public function save_ongkir($biaya_pengiriman)
    {
        $this->belanja->total_harga += $biaya_pengiriman;
        $this->belanja->status = 1;
        $this->belanja->update();

        return redirect()->to('belanjauser');
    }
}
