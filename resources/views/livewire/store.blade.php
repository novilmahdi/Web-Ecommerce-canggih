<div>

<section class="cat_product_area section_padding border_top" >
    <div class="product_top_bar" style="margin-bottom: 40px;">
        <div class="single_product_menu product_bar_item">
        </div>
        <div class="product_top_bar_iner product_bar_item d-flex">
           
          @livewire('filter-search')
          
        </div>
    </div>
    
    <div class="container" >
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    
                    @forelse ($products as $product )
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_category_product">
                    
                            <div class="single_category_img">
                                <div class="card-header-thumbnail-store">
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
                                        
                                     {{-- {!! $data->kategori->kategori_id_color !!} --}}
                                     <a href="{{ url('produk-details/'.$product->id) }}"><i class="ti-bag"></i></a>
                                     <a wire:click="beli({{ $product->id }})"><i class="ti-heart"></i></a>
                                      
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
        <div class="col-lg-12 text-center">
            <a href="" wire:click="loadProduct" class="btn_2" onclick="return false;">More Items</a>
        </div>
</section>

</div>
