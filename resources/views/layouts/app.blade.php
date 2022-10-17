<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('assets/img/favicon.png') }}">

    {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}
 
    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- owl carousel CSS -->

    <link rel="stylesheet" href="{{ asset('assets/css/lightslider.min.css') }}">
    
  
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!-- font awesome CSS -->
   
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <!-- flaticon CSS -->
    
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
   
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <!-- font awesome CSS -->
  
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
   
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <!-- style CSS -->
  
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- font awesome CSS -->
   
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
  
     <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/price_rangs.css') }}">
    
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

    {{-- //asset reset modal add post --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    {{-- SweetAlert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
 
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>



    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- --- --}}

    
    
    @livewireStyles
</head>
<body>
    <div id="app">
      
        <header class="main_menu home_menu">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-11">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="/"> <img src="{{ asset('assets/img/logo.png') }}" alt="logo"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="menu_icon"><i class="fas fa-bars"></i></span>
                            </button>
    
                            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                      
                                    </li>
                                    <li class="nav-item">
                                    
                                    </li>
                                    <li class="nav-item">
                                    
                                         <li class="nav-item">
                                    
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/store">Store</a>
                                    </li>                     
                                    <li class="nav-item">
                                        <a class="nav-link" href="/kategori-produk">Kategori Produk</a>
                                    </li>               
                                   <li class="nav-item">
                                        <a class="nav-link" href="/contact">Contact</a>
                                    </li>
                                </ul>
                            </div>
                  
                            <div class="hearer_icon d-flex">
                              
                                @if (Auth::user())
                                @if (Auth::user()->level == 0)
    

                                  @livewire('navbar')

                                @endif
       
                                @endif
    
                                <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>                      
                            </div>
                            
                            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                                    
                              <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->

                                 @guest
                                 @if (Route::has('login'))
                                <li class="nav-item">
                                     <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                 @endif

                                 @if (Route::has('register'))
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                                  @endif
                                 @else
                             <li class="nav-item dropdown">
                                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 {{ Auth::user()->name }}
                                </a>

                               <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                               </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                              </form>
                                 </div>
                                 </li>
                                  @endguest
                                </ul>
                            </div>
    
                                </div>                     
                        </nav>                  
                    </div>
                </div>
            </div>
    
            <div class="search_input" id="search_input_box">
                <div class="container ">
                    <form class="d-flex justify-content-between search-inner">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        {{-- <button type="submit" class="btn"></button> --}}
                        <button type="submit" value="submit"  class="genric-btn primary">
                            Search
                        </button>
                        <span class="ti-close" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>
         
        </header>
        <!-- Header part end-->

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    
   
    <!--::footer_part start::-->

    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Aceh &copy;<script>document.write(new Date().getFullYear());</script> CODE NVL | Link Blogger   <a href="https://pelajaransekolahpintar.blogspot.com/" target="_blank">nvl livewire</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
<p>
    <a href="">Disclaimer</a>
    <a href="">Privacy Policy</a>
</p>

<div class="social_icon">
    <a href="https://id-id.facebook.com/"><i class="ti-facebook"></i></a>
    <a href="https://twitter.com/i/flow/login"><i class="ti-twitter-alt"></i></a>
    <a href="https://www.instagram.com/?hl=id"><i class="ti-instagram"></i></a>
</div>
                    </div>
                   
                </div>
            </div>
        </div>
    </footer>

    <!--::footer_part end::-->

    @livewireScripts


    
  
    <script src="{{ asset('assets/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
 
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
  
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->

    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('assets/js/lightslider.min.js') }}"></script>
    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/js/price_rangs.js') }}"></script>
    <!-- particles js -->

    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- slick js -->

    <script src="{{ asset('assets/js/slick.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
   
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>

 
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script> --}}

    <script src="{{ asset('assets/js/mail-script.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- swiper js -->
    <script src="{{ asset('assets/js/price_rangs.js') }}"></script>


    {{-- Toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        window.addEventListener('showToastSuccess', event => {
            $("#modalForm").modal('hide');
            toastr.options.positionClass = 'toast-top-center';
            toastr.success(event.detail.message, 'Berhasil ditambahkan!');
        })
        
    </script>

     
    <script>
        window.addEventListener('showToastSuka', event => {
            $("#modalForm").modal('hide');
            toastr.options.positionClass = 'toast-top-center';
            toastr.success(event.detail.message, 'Disukai');
        })
        
    </script>
     
    <script>
        window.addEventListener('showToastTidakSuka', event => {
            $("#modalForm").modal('hide');
            toastr.options.positionClass = 'toast-top-center';
            toastr.success(event.detail.message, 'Tidak Disukai');
        })
        
    </script>
        {{-- end toast --}}
    
</body>
</html>
