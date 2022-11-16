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

        <ul>

            <div wire:loading class="absolute z-10 p-2 m-2 list-group bg-white w-11/12 rounded-t-none shadow-lg" >
                <div class="list-item p-2">Searching...</div>
            </div>
        </ul>

        @if (!empty($query))

        
        {{-- agar input search jadi reset ketika di klik sembarang(kombinasi class) --}}
        <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="reset"></div>
        {{-- End --}}

            <div class="absolute z-10 p-2 m-2 list-group bg-white w-11/12 rounded-t-none shadow-lg">
    
            @if (!empty($products))
           
          
    
                @foreach ($products as $i => $product )
    
                <ul>
    
                    <a href="{{ route('produk-details', $product['id']) }}" 
                    class="list-item p-2 {{ $highlightIndex === $i ? 'bg-blue-100' : ''}}"> {{ $product['nama_barang'] }}</a>
             
                </ul>
    
                            {{-- <button type="submit"   wire:click="searchItem  value="submit"  class="genric-btn primary">Search</button>                              
                            <span class="ti-close" id="close_search" title="Close Search"></span> --}}
                        
    
                @endforeach
    
                
                @else
                    <ul>
                        <div class="list-item text-center">Pencarian tidak ada...</div>
                    </ul>

                @endif
            </div>
        @endif

    </div>
</div>

