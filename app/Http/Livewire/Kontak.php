<?php

namespace App\Http\Livewire;

use App\Models\kontak as ModelsKontak;
use Livewire\Component;

class Kontak extends Component
{

    public $deskripsi, $nama, $email;
    
    public function render()
    {
        return view('livewire.kontak')->extends('layouts.app')->section('content');
    }

    public function save()
    {
        $this->validate([
            'deskripsi' => 'required',
            'nama' => 'required',
            'email' => "email|required"
        ]);

        ModelsKontak::create([
            'id' => $this->id,
            'deskripsi' => $this->deskripsi,
            'nama' => $this->nama,
            'email' => $this->email
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('showModalSuccess', 'success');
    }
}
