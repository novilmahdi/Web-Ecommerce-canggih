<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{

    public $jumlah = 0;

    
    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang',
        'hapusKeranjang' => 'updateKeranjang'
    ];

    public function updateKeranjang()
    {
        if(Auth::user())
        {
            $this->jumlah = Belanja::where('user_id', Auth::user()->id)->count();
            // $this->jumlah = Belanja::count();
        }
      
    }

    public function mount()
    {
       
        if(Auth::user())
        {
            $this->jumlah = Belanja::where('user_id', Auth::user()->id)->count();
            // $this->jumlah = Belanja::count();
        }
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
