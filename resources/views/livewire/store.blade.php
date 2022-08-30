<div>

<section class="cat_product_area section_padding border_top">
    <div class="product_top_bar d-flex justify-content-between align-items-center">
        <div class="single_product_menu product_bar_item">
        </div>
        <div class="product_top_bar_iner product_bar_item d-flex">
             <div class="product_bar_single ">
                <input  wire:model.defer="search" type="search" style="border:none;"    size="15" placeholder="Search Here">
                @error('search') <span class="error">{{ $message }}</span> @enderror
                {{-- <button wire:click="searchItem "> Search</button> --}}
                <button type="submit"  wire:click="searchItem " value="submit" class="genric-btn primary">
                    Search
                </button>
            </div>
            <div class="product_bar_single ">
                <input  wire:model.defer="search" type="search" style="border:none;" size="15" placeholder="Search Here">
                @error('search') <span class="error">{{ $message }}</span> @enderror
                {{-- <button wire:click="searchItem "> Search</button> --}}
                <button type="submit"  wire:click="searchItem " value="submit" class="genric-btn primary">
                    Search
                </button>
            </div>
            <div class="product_bar_single ">
                <input  wire:model.defer="search" type="search" style="border:none;"  size="15" placeholder="Search Here">
                @error('search') <span class="error">{{ $message }}</span> @enderror
                {{-- <button wire:click="searchItem "> Search</button> --}}
                <button type="submit"  wire:click="searchItem " value="submit" class="genric-btn primary">
                    Search
                </button>
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
                                        
                                            <img src="{{ asset('storage/photos/'.$product->gambar) }}">
                                    </div>
                                     </div> 
                                       
                                <div class="category_product_text">
                                    <a href=""><p><font face="Helvetica"> {{ $product->nama }}</font></p></a>
                                </div>
                                <div class="category_product_text">
                                    <div class="description">
                                        Rp. {{ number_format($product->harga) }} 
                                    
                                    </div>
                                    <div class="description">
                                        
                                     {{-- {!! $data->kategori->kategori_id_color !!} --}}
                                     <a wire:click="beli({{ $product->id }})"><i class="ti-heart"></i></a>
                                     <a wire:click="beli({{ $product->id }})"><i class="ti-bag"></i></a>
                                      
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                     @endforeach

                    <div class="col-lg-12 text-center">
                        <a wire:click="loadArtikel" class="btn_2">More Items</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
