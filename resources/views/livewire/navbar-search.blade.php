<div class="search_input" id="search_input_box">
    <div class="container ">
        <form class="d-flex justify-content-between search-inner">
            <input type="text"  
            class="form-control" 
            id="search_input" 
            placeholder="Search Here"
            wire:model="query" 
            wire:keydown.escape="reset"
            wire:keydown.tab="reset" 
            wire:keydown.arrow-up="decrementHighlight"
            wire:keydown.arrow-down="incrementHighlight"
            wire:keydown.enter="selectProduct"


            
            />
        </form>

            <div wire:loading class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg" >
                <div class="list-item">Searching...</div>
            </div>

        @if (!empty($query))

        
        <div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">

            {{-- agar input search jadi reset ketika di klik sembarang --}}
            <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="reset"></div>
            {{-- End --}}
        @if (!empty($products))
       
      

            @foreach ($products as $i => $product )

                           <a href="{{ route('produk-details', $product['id']) }}" 
                           class="list-item {{ $highlightIndex === $i ? 'bg-blue-100' : ''}}"> {{ $product['nama_barang'] }}</a>
                    

                        {{-- <button type="submit"   wire:click="searchItem  value="submit"  class="genric-btn primary">Search</button>                              
                        <span class="ti-close" id="close_search" title="Close Search"></span> --}}
                    

            @endforeach

            
            @else
            <div class="list-item">Kosong</div>
            
            @endif
        </div>
        @endif

    </div>
</div>
