<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TambahSepatu extends Component
{
    public function render()
    {
        return view('livewire.admin.tambah-sepatu')->extends('layouts.app-admin')->section('content');
    }
}
