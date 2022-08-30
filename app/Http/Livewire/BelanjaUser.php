<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class BelanjaUser extends Component
{

    protected $paginationTheme = 'bootstrap';
    public $belanja = [];

    //pertama di tampilkan
    public function mount()
    {
        // pengecekan "Jika user tidak login, maka redirect ke halaman login"
        if(!Auth::user())
        {
            return redirect()->route('login');

        }
       
    }
    // end

    public function render()
    {
          // pengecekan "Jika user login, maka tampilkan halaman belanja"
          
         if(Auth::user())
         {
             $this->belanja = Belanja::latest()->where('user_id', Auth::user()->id)->get();
            //  $this->belanja = Belanja::latest()->paginate(10);
         }
        return view('livewire.belanja-user')->extends('layouts.app')->section('content');
    }



    public function destroy($pesanan_id)
    {
        $pesanan = Belanja::find($pesanan_id);
        $pesanan->delete();
        $this->emit('hapusKeranjang');
    }
}
