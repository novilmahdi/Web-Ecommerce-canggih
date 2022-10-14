<div>
    @if (Auth::user())
        @if (Auth::user()->level == 1)
            <div class="col-md-3">
                <a href="{{ url('tambahproduk/') }}" class="btn btn-success btn-block">Tambah Produk</a>
            </div>    
        @endif
    @endif

    {{-- Tampilan Produc --}}
    {{-- <section class="products mb-5">
        <div class="row mt-4">
            @foreach ($products as $product )
            <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/photos/'.$product->gambar) }}" width="200px" height="200px" alt="">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <h5><strong>{{ ($product->nama) }}</strong></h5>
                            <h6><strong>Rp. {{ number_format($product->harga) }}</strong></h6>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <button class="btn btn-success btn-block" wire:click="beli({{ $product->id }})">
                                Beli
                            </button>
                        </div>
                    </div>
                </div>
            </div>   
            </div>
            @endforeach
        </div>
    </section> --}}
{{-- End --}}


<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="banner_slider">
                    <div class="single_banner_slider">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h1>Fashion Collection 2019</h1>
                                @guest
                                @if (Route::has('login'))
                                <h5>Apakah Anda Memiliki Produk ? </h5>
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
    <div class="product_top_bar d-flex justify-content-between align-items-center">
        <div class="single_product_menu product_bar_item">
        </div>
        {{-- <div class="product_top_bar_iner product_bar_item d-flex"> --}}
             <div class="product_bar_single ">
                <input  wire:model="search"  type="search" style="border:none;" placeholder="Search Here">
                @error('search') <span class="error">{{ $message }}</span> @enderror
                {{-- <button wire:click="searchItem "> Search</button> --}}
                <button type="submit"  wire:click="searchItem " value="submit" class="genric-btn primary">
                    Search
                </button>
            {{-- </div> --}}
        </div>
        <div class="product_bar_single ">
            <input  wire:model="min" type="search" style="border:none;" placeholder="Harga min">
            @error('search') <span class="error">{{ $message }}</span> @enderror
            {{-- <button wire:click="searchItem "> Search</button> --}}
            <button type="submit"  wire:click="searchItem " value="submit" class="genric-btn primary">
                Search
            </button>
        {{-- </div> --}}
    </div>
    <div class="product_bar_single ">
        <input  wire:model="max" type="search" style="border:none;" placeholder="Harga max">
        @error('search') <span class="error">{{ $message }}</span> @enderror
        {{-- <button wire:click="searchItem "> Search</button> --}}
        <button type="submit"  wire:click="searchItem " value="submit" class="genric-btn primary">
            Search
        </button>
    {{-- </div> --}}
</div>

    
    </div>
    </div>
</section>
    <div class="container">
        
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="arrival_tittle">
                    <h2>new arrival</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="arrival_filter_item filters">
                    <ul>
                        <li class="active controls" data-filter="*">all</li>
                        <li class="controls" data-toggle=".men">men</li>
                        <li class="controls" data-toggle=".women">women</li>
                        <li class="controls" data-toggle=".shoes">shoes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    
                    @foreach ($products as $product )
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
                                        
                                     {{-- {!! $data->kategori->kategori_id_color !!} --}}
                                     {{-- <a wire:click="beli({{ $product->id }})"><i class="ti-heart"></i></a> --}}
                                     <a href="{{ url('produk-details/'.$product->id) }}"><i class="ti-bag"></i></a>
                                     {{-- <a wire:click="beli({{ $product->id }})"><i class="ti-bag"></i></a> --}}
                                      
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
    <section class="cat_product_area section_padding border_top">
        <div class="col-lg-12 text-center">
              <a href="#" class="btn_2">More Items</a>
        </div>
       </section>
</section>
<!-- new arrival part end -->

<!-- new arrival part here -->
<section class="new_arrival section_padding">
    <section class="new_arrival section_padding">
        <div class="col-lg-12 mb-4">
        <div class="product_top_bar d-flex justify-content-between align-items-center">
            <div class="single_product_menu product_bar_item">
            </div>
            {{-- <div class="product_top_bar_iner product_bar_item d-flex"> --}}
                 <div class="product_bar_single ">
                    <input  wire:model="search"  type="search" style="border:none;" placeholder="Search Here">
                    @error('search') <span class="error">{{ $message }}</span> @enderror
                    {{-- <button wire:click="searchItem "> Search</button> --}}
                    <button type="submit"  wire:click="searchItem " value="submit" class="genric-btn primary">
                        Search
                    </button>
                {{-- </div> --}}
            </div>
            <div class="product_bar_single ">
                <input  wire:model="min" type="search" style="border:none;" placeholder="Harga min">
                @error('search') <span class="error">{{ $message }}</span> @enderror
                {{-- <button wire:click="searchItem "> Search</button> --}}
                <button type="submit"  wire:click="searchItem " value="submit" class="genric-btn primary">
                    Search
                </button>
            {{-- </div> --}}
        </div>
        <div class="product_bar_single ">
            <input  wire:model="max" type="search" style="border:none;" placeholder="Harga max">
            @error('search') <span class="error">{{ $message }}</span> @enderror
            {{-- <button wire:click="searchItem "> Search</button> --}}
            <button type="submit"  wire:click="searchItem " value="submit" class="genric-btn primary">
                Search
            </button>
        {{-- </div> --}}
    </div>
    
        
        </div>
        </div>
    </section>
        <div class="container">
            
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="arrival_tittle">
                        <h2>new arrival</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="arrival_filter_item filters">
                        <ul>
                            <li class="active controls" data-filter="*">all</li>
                            <li class="controls" data-toggle=".men">men</li>
                            <li class="controls" data-toggle=".women">women</li>
                            <li class="controls" data-toggle=".shoes">shoes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
    
                        
                        @foreach ($products as $product )
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_category_product">
                        
                                <div class="single_category_img">
                                    <div class="card-header-thumbnail">
                                        <div class="thumbnail">
                                            
                                                <img src="{{ asset('uploads/'.$product->image_p) }}">
                                        </div>
                                         </div> 
                                           
                                    <div class="category_product_text">
                                        <a href=""><p><font face="Helvetica"> {{ $product->nama_barang }}</font></p></a>
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
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
        <section class="cat_product_area section_padding border_top">
            <div class="col-lg-12 text-center">
                  <a href="#" class="btn_2">More Items</a>
            </div>
           </section>
    </section>
    <!-- new arrival part end -->
</div>