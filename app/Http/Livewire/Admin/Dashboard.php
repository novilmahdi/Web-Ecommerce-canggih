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
    public $userIdBeingRemoved = null;
    protected $paginationTheme = 'bootstrap';

  
  
    public function updatingSearch()
    {
        $this->resetPage();
    }

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

    public function closebuttonmodal()
    {
            $this->dispatchBrowserEvent('hide-cancel-delete-modal');
    }

    public function closebuttonmodal2()
    {
            $this->dispatchBrowserEvent('hide-cancel-modal');
    }

    public function confirm($kontakId)
    {
        $this->userIdBeingRemoved = $kontakId;
        $this->dispatchBrowserEvent('show-delete-modal');
       

    }

    public function deleteData()
    {
            $data = ModelsKontak::findOrFail($this->userIdBeingRemoved);
            $data->delete();
            $this->dispatchBrowserEvent('show-close-delete-modal', 'success');
            $this->emit('delete');
    }

    
}
