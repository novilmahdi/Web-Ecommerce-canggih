<?php

namespace App\Http\Livewire;

use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahProduk extends Component
{
    use WithFileUploads;
    public $nama, $harga,$berat, $gambar;

    public function mount()
    {
        //apa ada user login cek?
        if(Auth::user())
        {
            if(Auth::user()->level !== 1)
            {
                return redirect()->to('');
            }
        }
    }



    public function render()
    {
        return view('livewire.tambah-produk')->extends('layouts.app')->section('content');
    }


    public function store()
    {
        // Validasi
        $this->validate(
            [
                'nama'   => 'required',
                'harga'  => 'required',
                'berat'  => 'required',
                'gambar' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
            ]
            );

            //Proses data gambar
            $nama_gambar = md5($this->gambar . microtime()).'.'.$this->gambar->extension();
            Storage::disk('public')->putFileAs('photos', $this->gambar,$nama_gambar);
            // $nama_gambar = $this->image->store('public/images');

            //Memasukan data ke database
            Produk::create(
                [
                    'nama' => $this->nama,
                    'harga' => $this->harga,
                    'berat' => $this->berat,
                    'gambar' => $nama_gambar
                ]
                ); 


            return redirect()->to('');
    }
}
