<?php

namespace App\Http\Livewire;

use App\Models\Gender;
use App\Models\Kategori;
use App\Models\Product;
use Livewire\Component;

class FilterSearch extends Component
{
    public $kategori_id;
    public $gender_id;
    public $query;
    public function render()
    {
        $kategoris = Kategori::get();
        $genders = Gender::get();
        return view('livewire.filter-search', ['kategoris' => $kategoris], ['genders' => $genders]);
    }

    public function filter()
    {
        $this->emitTo('home', 'reloadHome', $this->kategori_id, $this->gender_id, $this->query);
        $this->emitTo('store', 'reloadStore', $this->kategori_id, $this->gender_id, $this->query);

    }

}
