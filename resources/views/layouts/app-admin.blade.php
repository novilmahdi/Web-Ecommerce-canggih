<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets2/vendors/iconfonts/mdi/css/materialdesignicons.css') }}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets2/css/shared/style.css') }}">

    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('assets2/css/demo_1/style.css') }}">

    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('assets2/images/favicon.ico') }}">
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    
    {{-- asset reset modal add post --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    {{-- SweetAlert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    

    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- --- --}}


    {{-- tailwinds --}}

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    @livewireStyles

  </head>
  <body class="header-fixed">
    <!-- partial:partials/_header.html -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="/dashboard">
          <img class="logo" src="{{ asset('assets2/images/logo.png') }}" alt="">
          <img class="logo-mini" src="{{ asset('assets2/images/logo_mini.png') }}" alt="">
        </a>
      </div>
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
          </button>
          {{-- <form action="#" class="t-header-search-box">
            <div class="input-group">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" autocomplete="off">
              <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
            </div>
          </form> --}}
          
          <ul class="nav ml-auto">
           
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="messageDropdown" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-message-outline mdi-1x"></i>
                <span class="notification-indicator notification-indicator-primary notification-indicator-ripple"></span>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="messageDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Messages</h6>
                  <p class="dropdown-title-text">You have 4 unread messages</p>
                </div>
                <div class="dropdown-body">
                  <div class="dropdown-list">
                    <div class="image-wrapper">
                       
                      <img class="profile-img" src="{{ asset('assets2/images/profile/male/image_1.png') }}" alt="profile image">
                      <div class="status-indicator rounded-indicator bg-success"></div>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Clifford Gordon</small>
                      <small class="content-text">Lorem ipsum dolor sit amet.</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="image-wrapper">
                      <img class="profile-img" src="{{ asset('assets2/images/profile/female/image_2.png') }}" alt="profile image">
                      <div class="status-indicator rounded-indicator bg-success"></div>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Rachel Doyle</small>
                      <small class="content-text">Lorem ipsum dolor sit amet.</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="image-wrapper">
                      <img class="profile-img" src="{{ asset('assets2/images/profile/male/image_3.png')}}" alt="profile image">
                      <div class="status-indicator rounded-indicator bg-warning"></div>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Lewis Guzman</small>
                      <small class="content-text">Lorem ipsum dolor sit amet.</small>
                    </div>
                  </div>
                </div>
                <div class="dropdown-footer">
                  <a href="#">View All</a>
                </div>
              </div>
            </li>    
            <li class="nav-item dropdown">
                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" color href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif
                                    
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                        <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>        
                                        
                                    @endif
                                    

                                    {{-- @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="">| Apakah Kamu Punya Vendor</a>
                                    </li>
                                @endif --}}
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                        
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            
                                            
                                          
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
              </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="{{ asset('assets2/images/profile/male/image_1.png') }}" alt="profile image">
          </div>
          <div class="info-wrapper">
            @guest
              @if (Route::has('login'))
              @endif
              @if (Route::has('register'))
              @endif        
              @else
               <p class="user-name">{{ Auth::user()->name }}</p>
            @endguest
          </div>
        </div>
        <ul class="navigation-menu">
         
          <li>
            <a href="/dashboard">
              <span class="link-title">Dashboard</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          
          <li>
            <a href="#tambah-produk" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Tambah Produk</span>
              <i class="mdi mdi-folder-upload link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="tambah-produk">
              <li>
                <a href="/tambah-sepatu">Sepatu</a>
              </li>
              {{-- <li>
                <a href="#">Baju</a>
               
              </li> --}}
            </ul>
          </li>
          <li>
               <li>
            <a href="#edit-produk" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Edit Produk</span>
              <i class="mdi mdi-lead-pencil link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="edit-produk">
              <li>
                <a href="/edit-sepatu">Sepatu</a>
              </li>
              {{-- <li>
                <a href="#">Baju</a>
              </li> --}}
            </ul>
          </li>
        </ul>
        
      </div>
      <!-- partial -->
      
      @yield('content')
     
      <!-- page content ends -->
    </div>
    
    @livewireScripts

   
    
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="{{ asset('assets2/vendors/js/core.js') }}"></script>

    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="{{ asset('assets2/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets2/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets2/js/charts/chartjs.addon.js') }}"></script>
 
       <!-- build:js -->
    <script src="{{ asset('assets2/js/template.js') }}"></script>
    <script src="{{ asset('assets2/js/dashboard.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- Toastr --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- --- --}}

 {{-- Modal --}}
 <script>

  window.addEventListener('openModal', event => {
      $("#modalForm").modal('show');
   })

   window.addEventListener('openModal1', event => {
      $("#modalForm1").modal('show');
   })

   window.addEventListener('hide-cancel-modal', event => {
    $("#modalForm").modal('hide');
   
  })

  window.addEventListener('hide-cancel-modal', event => {
    $("#modalForm1").modal('hide');
   
  })

  window.addEventListener('ShowcloseModal', event => {
      $("#modalForm").modal('hide');
      toastr.options.positionClass = 'toast-bottom-right';
    toastr.success(event.detail.message, 'Update berhasil!');
      $('#modalForm').on('hidden.bs.modal', function (e) {
   $(this)
      .find("input,textarea,select")
       .val('')
         .end()
           .find("input[type=checkbox], input[type=radio], input[type=file]")
            .prop("checked", "")
               .end();    
                  })
                  swal("Update Berhasil", "Silahkan tekan OK!", "success");

  })

  window.addEventListener('showModalSuccess', event => {
      $("#modalForm").modal('hide');
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.success(event.detail.message, 'Upload berhasil!');
      $('#modalForm').on('hidden.bs.modal', function (e) {
   $(this)
      .find("input,textarea,select")
       .val('')
         .end()
           .find("input[type=checkbox], input[type=radio], input[type=file]")
            .prop("checked", "")
               .end();    
                  })
                  swal("Upload berhasil", "Silahkan tekan OK!", "success");

  })

 

 


  // Modal delete
  window.addEventListener('show-delete-modal', event => {
      $("#confirmationModal").modal('show');
  })

  window.addEventListener('hide-cancel-delete-modal', event => {
    $("#confirmationModal").modal('hide');
   
  })

  window.addEventListener('hide-delete-modal', event => {
    $("#confirmationModal").modal('hide');
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.success(event.detail.message, 'Delete success!');
    
  })
  
  window.addEventListener('show-close-delete-modal', event => {
      $("#confirmationModal").modal('hide');
      toastr.options.positionClass = 'toast-bottom-right';
    toastr.success(event.detail.message, 'Berhasil dihapus!');
      $('#confirmationModal').on('hidden.bs.modal', function (e) {
   $(this)
      .find("input,textarea,select")
       .val('')
         .end()
           .find("input[type=checkbox], input[type=radio], input[type=file]")
            .prop("checked", "")
               .end();    
                  })
                  swal("Berhasil dihapus", "Silahkan tekan OK!", "success");

  })

  
  // ----------//

  </script>


  <script>

      window.livewire.on('fileUploaded', ()=>{
        $('#form-upload')[0].reset();
      });

      window.livewire.on('imagesUploaded', ()=>{
        $('#upload-images')[0].reset();
      });

  </script>
  
  <script type="text/javascript">
    // <script>
  var closebtns = document.getElementsByClassName("close");
  var i;
  
  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function() {
      this.parentElement.style.display = 'none';
    });
  }
  </script>


{{-- 
<script>

  @if (Session::has('success'))
  toastr.success("{{ Session::get('success') }}")
  @endif
</script> --}}


  
  </body>
</html>