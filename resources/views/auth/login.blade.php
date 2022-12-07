@extends('layouts.app')

@section('content')

 <!--================login_part Area =================-->
 <section class="login_part section_padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Anda ingin belanja sekarang?</h2>
                        <p>Silahkan lakukan pendaftaran akun
                           agar bisa melakukan pembelian </p>
                        <a href="{{ url('/register') }}" class="btn_3">Daftar akun</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Selamat Datang ! <br>
                            Silahkan Login Sekarang</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                              
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                            <div class="col-md-12 form-group">
                                {{-- <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label class="form-check-label" for="remember">
                                        {{ __('Ingat Saya') }}
                                    </label>
                                </div> --}}
                                <button type="submit" value="submit" class="btn_3">
                                    {{ __('Masuk') }}
                                </button>
                                
                                @if (Route::has('password.request'))
                                    <a class="lost_pass" href="{{ route('password.request') }}">
                                        {{ __('Lupa Sandi?') }}
                                    </a>
                                    <div class="logo-sosmed">
                                    <div class="size-google">
                                        <a href="{{ url('/auth/facebook') }}">
                                            <img src="{{ asset('assets/img/icon/facebook.png') }}" alt="">
                                    </a>
                                    </div>

                                    <div class="size-google">
                                    <a href="{{ route('google.login') }}">
                                        <img src="{{ asset('assets/img/icon/google.png') }}" alt="">
                                    </a>
                                    </div>
                                </div>
                                   
                                    

                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->
@endsection
