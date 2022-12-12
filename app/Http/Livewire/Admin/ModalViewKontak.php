<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Kontak;
use App\Models\kontak as ModelsKontak;
use Illuminate\Queue\Listener;
use Livewire\Component;

class ModalViewKontak extends Component
{

    public $deskripsi,$kontak_id,$model;
    public $updateStateId = 0;
    protected $listeners = ['getModelId'];

    public function render()
    {
        return view('livewire.admin.modal-view-kontak', [
            'kontaks' => ModelsKontak::latest()->get()
        ]);
    }

    public function getModelId($kontak_id)
    {
        $this->kontak_id = $kontak_id;
        $model = ModelsKontak::find($this->kontak_id);
        // dd($model);
        $this->deskripsi = $model->deskripsi;
        $this->updateStateId = $kontak_id;
    }
}
