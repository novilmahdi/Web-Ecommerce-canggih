<div>
    @if (Auth::user())
        @if (Auth::user()->level == 1)
            <div class="col-md-3">
                <a href="{{ url('tambahproduk/') }}" class="btn btn-success btn-block">Tambah Produk</a>
            </div>    
        @endif
    @endif
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="banner_slider">
                    <div class="single_banner_slider">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h1>NVL 2022</h1>
                                @guest
                                @if (Route::has('login'))
                                <h5>Apakah anda memilki akun untuk pembelian ? </h5>
                                <br>
                                <a href="/register" class="btn_1">Daftar sekarang</a>
                                @endif
                            @else
                            @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->


<!-- new arrival part here -->
<section class="new_arrival section_padding">
<section class="new_arrival section_padding">
    <div class="col-lg-12 mb-4">
    <div class="product_top_bar">
        <div class="single_product_menu product_bar_item">
        </div>
        {{-- <div class="product_bar_single ">
            <input  wire:model="min" type="search" style="border:none;" placeholder="Harga min">
            @error('search') <span class="error">{{ $message }}</span> @enderror
            <button type="submit"  wire:click="searchItem " value="submit" class="genric-btn primary">
                Search
            </button>
        </div>
        <div class="product_bar_single ">
            <input  wire:model="max" type="search" style="border:none;" placeholder="Harga max">
            @error('search') <span class="error">{{ $message }}</span> @enderror
            <button type="submit"  wire:click="searchItem " value="submit" class="genric-btn primary">
                Search
            </button>
        </div> --}}
        
         
     @livewire('filter-search')
    </div>
    </div>
</section>
    {{-- <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="arrival_tittle">
                    <h2>new arrival</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="arrival_filter_item filters">
                    <ul>
                        <li class="active controls" data-filter="*">Semua</li>
                        <li class="controls" data-toggle=".men">Pria</li>
                        <li class="controls" data-toggle=".women">Wanita</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container" wire:loading.remove>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                   
                        
                 

                    @forelse ($products as $product )
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_category_product">
                    
                            <div class="single_category_img">
                                <div class="card-header-thumbnail">
                                    <div class="thumbnail">
                                            <img src="{{ asset('uploads/'.$product->image_p) }}">
                                    </div>
                                 </div> 
                                       
                                <div class="category_product_text">
                                    <p><font face="Helvetica"> {{ $product->nama_barang }}</font></p>
                                </div>
                                <div class="category_product_text">
                                    <div class="description">
                                        Rp. {{ number_format($product->harga) }} 
                                    </div>
                                    <div class="description">
                                     <a href="{{ url('produk-details/'.$product->id) }}"><i class="ti-bag"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                     
                        <div class="col-lg-12 text-center">
                             Pencarian kosong
                        </div>
                      @endforelse
                </div>
            </div>
        </div>
    </div>


    <div class="flex items-center justify-center mt-10">
        <div wire:loading style="border-top-color: transparent;"
        class="w-16 h-16 border-4 border-blue-400 border-solid rounded-full animate-spin">
        </div>
    </div>


    <br>
    <br>
    
    <section class="cat_product_area section_padding border_top top_more">
        <div class="col-lg-12 text-center">
              <a href="" wire:click="loadProduct" class="btn_2" onclick="return false;">More Items</a>
        </div>
       </section>
</section>

</div>