<div>
   



 <!--================Single Product Area =================-->
 <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner">
        <div class="col-lg-5" wire:ignore>
          <div class="product_slider_img">
            <div class="lSSlideOuter"><div class="lSSlideWrapper usingCss" style="transition-duration: 600ms; transition-timing-function: ease;">
             <div id="vertical" class="lightSlider lsGrab lSSlide" style="width: 1832px; height: 559px; padding-bottom: 0%; transform: translate3d(0px, 0px, 0px);">
              
              <div data-thumb="{{asset('uploads/'.$gambar) }}" class="lslide active" style="width: 458px; margin-right: 0px;">
                <img src="{{ asset('uploads/'.$gambar) }}">
              </div>
    
              @foreach ($ProductImages as $image )
                <div data-thumb="{{ asset('uploads/all') }}/{{ $image->image }}" class="lslide" style="width: 458px; margin-right: 0px;">
                  <img src="{{ asset('uploads/all') }}/{{ $image->image }}" alt="">
                </div>
                @endforeach
            </div><div class="lSAction"><a class="lSPrev"></a><a class="lSNext"></a></div></div>
          
         
         </div>
          </div>
          {{-- @endforeach --}}
        </div>
        
        <div class="col-lg-5 offset-lg-1">
          <div class="s_product_text">
            <h3>{{ $nama }}</h3>
            <h2>Rp. {{ number_format($harga)}} </h2>
            <ul class="list">
              <li>
                <a class="active">
                  <span>Gender</span> : {{ $gender->gender }}</a>
              </li>
              <li>
                <a> <span>Ukuran</span> : {{ $ukuran }}</a>
              </li>
              <li>
                <a> <span>Berat</span> :  {{ $berat }} Kg</a>
              </li>
            </ul>
            <p>

              {{Str::limit($deskripsi, 200) }} <a href="#home-tab descripsi">Selanjutnya</a>

            </p>
            <div class="card_area">
            
              <div class="add_to_cart">
             
        
                    
                  <a href="" wire:click="beli({{ $data_id }})" class="btn_3"  onclick="return false;">Tambah Keranjang</a>
                  
                {{--Jika tidak ada user login  --}}
                 @if(!Auth::user())
                     <a href="" wire:click="suka({{ $data_id }})" class="dislike_us" onclick="return false;"> <i class="ti-heart"></i> </a>
                     {{ $ProductLike }}
                {{--End  --}}
                  
                {{-- Jika ada user login dan product, maka cek user id dan product id pada tabel Suka --}}
                @elseif(App\Models\Suka::where('user_id', Auth::user()->id)->where('product_id', $this->product_id)->first() == null )
                  <a href="" wire:click="suka({{ $data_id }})" class="dislike_us" onclick="return false;"> <i class="ti-heart"></i> </a>
                  {{ $ProductLike }}

                @else
                  <a href="" wire:click="suka({{ $data_id }})" class="like_us" onclick="return false;"> <i class="ti-heart"></i> </a>
                  {{ $ProductLike }}
                @endif

              </div>
              


              <div class="social_icon">
                <a href="https://id-id.facebook.com/" class="fb"><i class="ti-facebook"></i></a>
                <a href="https://twitter.com/i/flow/login" class="tw"><i class="ti-twitter-alt"></i></a>
               <a href="https://id.linkedin.com/" class="li"><i class="ti-linkedin"></i></a>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->
 
  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab descripsi" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p>
           {{ $deskripsi }}
          </p>
    
        </div>
     
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="comment_list">
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                     <img src="{{ asset('assets/img/icon/icon_1.png') }}" alt="">
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item reply">
                  <div class="media">
                    <div class="d-flex">
                     <img src="{{ asset('assets/img/icon/icon_4.png') }}" alt="">
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                     <img src="{{ asset('assets/img/icon/icon_2.png') }}" alt="">
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Post a comment</h4>
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn_3">
                      Submit Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="row total_rate">
                <div class="col-6">
                  <div class="box_total">
                    <h5>Overall</h5>
                    <h4>4.0</h4>
                    <h6>(03 Reviews)</h6>
                  </div>
                </div>
                <div class="col-6">
                  <div class="rating_list">
                    <h3>Based on 3 Reviews</h3>
                    <ul class="list">
                      <li>
                        <a href="#">5 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">4 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">3 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">2 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">1 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="review_list">
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                     <img src="{{ asset('assets/img/icon/icon_1.png') }}" alt="">
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                     <img src="{{ asset('assets/img/icon/icon_1.png') }}" alt="">
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                     <img src="{{ asset('assets/img/icon/icon_2.png') }}" alt="">
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Add a Review</h4>
                <p>Your Rating:</p>
                <ul class="list">
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                </ul>
                <p>Outstanding</p>
                <form class="row contact_form" action="contact_process.php" method="post" novalidate="novalidate">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" placeholder="Your Full name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Email Address">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="number" placeholder="Phone Number">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="message" rows="1" placeholder="Review"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn_3">
                      Submit Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->

 
  <!-- shipping details part end-->
  <section class="shipping_details section_padding border_top">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-sm-6">
                  <div class="single_shopping_details">
                      <img src="{{ asset('assets/img/icon/icon_2.png') }}" alt="">
                      <h4>Checkout</h4>
                      <p>Lakukan checkout product yang akan dibeli.</p>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="single_shopping_details">
                      <img src="{{ asset('assets/img/icon/icon_3.png') }}" alt="">
                      <h4>Bayar</h4>
                      <p>Lakukan pembayaran produk yang di checkout</p>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="single_shopping_details">
                      <img src="{{ asset('assets/img/icon/icon_1.png') }}" alt="">
                      <h4>Pengiriman</h4>
                      <p>Produk siap untuk diikirim sesuai alamat anda</p>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="single_shopping_details">
                      <img src="{{ asset('assets/img/icon/icon_4.png') }}" alt="">
                      <h4>kurir</h4>
                      <p>Kurir akan menelpon sesuai nomor anda</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- shipping details part end-->
 
</div>
