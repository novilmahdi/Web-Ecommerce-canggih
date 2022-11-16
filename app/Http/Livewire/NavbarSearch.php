<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class NavbarSearch extends Component
{
  
    public $query;
    public $products;
    public $highlightIndex;
 

    public function mount()
    {
        $this->reset(['query', 'products', 'highlightIndex']);
    }

    public function reset(...$query)
    {
        $this->query = '';
        $this->products = [];
        $this->highlightIndex = 0;
    }

    
  
    public function incrementHighlight()
    {
        if($this->highlightIndex === count($this->products) - 1)
        {
            $this->highlightIndex = 0;
            return;
        }
            $this->highlightIndex++;
    }



    public function decrementHighlight()
    {
        if($this->highlightIndex === 0 )
        {
            $this->highlightIndex = count($this->products) - 1;
            return;
        }
            $this->highlightIndex--;
    }



    public function selectProduct()
    {
        $product = $this->products[$this->highlightIndex] ?? null;

        if($product)
        {
            $this->redirect(route('produk-details', $product['id']));
        }
    }



    public function updatedQuery()
    {
        $this->products = Product::where('nama_barang', 'like', '%'. $this->query.'%')
                                 ->get()
                                 ->toArray();
    }

    

    public function render()
    {
        return view('livewire.navbar-search');
    }
}
