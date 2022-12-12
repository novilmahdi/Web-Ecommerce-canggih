<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Kontak;
use App\Models\kontak as ModelsKontak;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{

    use WithPagination;
    public $action;
    public $selectedItem;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
       
        
        return view('livewire.admin.dashboard', [
            'kontaks' => ModelsKontak::latest()->paginate(5)
        ])->extends('layouts.app-admin')->section('content');
    }

    public function selectItem($kontak_id, $action)
    {
        $this->selectedItem = $kontak_id;
        if($action == 'view')
        {
            $this->emit('getModelId', $this->selectedItem);
            $this->dispatchBrowserEvent('openModal');
        }
    }

    public function closebuttonmodal2()
    {
            $this->dispatchBrowserEvent('hide-cancel-modal');
    }
    
}
