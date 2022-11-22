@extends('layouts.app')

@section('content')


 <!--================register_part Area =================-->
 <section class="login_part section_padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Login segera</h2>
                        <p>Temukanlah bebebagai macam Fashion pada website ecommece ini</p>
                        <a href="{{ url('/login') }}" class="btn_3">Masuk Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Selamat Datang ! <br>
                            Daftar Sekarang</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                            <div class="col-md-12 form-group p_star">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>  
                                @enderror   
                            </div>

                            <div class="col-md-12 form-group p_star">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>


                            <div class="col-md-12 form-group p_star">                       
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                       
                                </div>

                                <div class="col-md-12 form-group p_star">                       
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password-confirm">
                              
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               
                                        </div>

                            <div class="col-md-12 form-group">
                               
                                <button type="submit" value="submit" class="btn_3">
                                    {{ __('Daftar') }}
                                </button>
                                
                               
                            </div>

                            <div class="lost_pass "  >
                                <div class="size-google">
                                    <a href="{{ url('/auth/facebook') }}">
                                        <img src="{{ asset('assets/img/icon/facebook.png') }}" alt="">
                                </a>
                                </div>

                                <div class="size-google">
                                <a href="{{ url('/auth/google') }}">
                                    <img src="{{ asset('assets/img/icon/google.png') }}" alt="">
                                </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================register_part end =================-->

@endsection
