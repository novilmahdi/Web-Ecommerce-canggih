<?php

namespace App\Http\Livewire\Admin;

use App\Models\Belanja;
use Livewire\Component;
use Livewire\WithPagination;

class AktivitasPembelian extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.aktivitas-pembelian', [
            'belanjas' => Belanja::latest()->paginate(2)
        ]);
    }
}
