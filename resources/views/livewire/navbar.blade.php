{{-- <div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('BelanjaUser') }}">{{ 'Belanja Anda' }} {{ $jumlah }} </a>
    </li>
  
</div> --}}


<div class="dropdown cart">
    <a class="dropdown-toggle"  href="{{ url('belanjauser') }}" id="navbarDropdown3" role="button"
            aria-haspopup="true" aria-expanded="false">
        <i class="ti-bag"></i>
        {{ $jumlah }}                       
    </a>
</div>

{{-- <div class="dropdown cart">
    <a class="dropdown-toggle"  href="{{ url('BelanjaUser') }}" id="navbarDropdown3" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ti-bag"></i>     {{ 'Belanja Anda' }} {{ $jumlah }}                 
    </a>
</div> --}}

{{-- <div class="hearer_icon d-flex">
    <div class="dropdown cart">
        <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti-bag"></i>                      
        </a>
    </div>

    <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>                      
</div> --}}