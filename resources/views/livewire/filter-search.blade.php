<div class="product_top_bar d-flex justify-content-between align-items-center" style="float: right;">


    <div class="product_bar_single ">
        {{-- <input  wire:model="query" type="search"  wire:keyup.debounce="filter" style="border:none;" placeholder="Search Here"> --}}
        <input  wire:model="query" type="search" style="border:none;" placeholder="Search Here">
        @error('search') <span class="error">{{ $message }}</span> @enderror
        {{-- <button wire:click="searchItem "> Search</button> --}}
        <button type="submit"  wire:click="filter"  wire:keyup.debounce="filter"  value="submit" class="genric-btn primary">
            Search
        </button>
    </div>
    
        <div class="product_bar_single">
            <select  wire:model="kategori_id" wire:change="filter" style="padding: 10px; background:#ffffff; border:none;">
                <option value=""> Pilih kategori </option>
                @foreach ($kategoris as $kategori )
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                {{-- <option value="london">Tas</option>
                <option value="athens">lainnya</option> --}}
                    
                @endforeach
              </select>
              
        </div>
        <div class="product_bar_single">
            <select  wire:model="gender_id" wire:change="filter" style="padding: 10px; background:#ffffff; border:none;">
                <option value=""> Pilih Genre </option>
                @foreach ($genders as $gender )
                <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                {{-- <option value="london">Tas</option>
                <option value="athens">lainnya</option> --}}
                    
                @endforeach
              </select>
              
        </div>
</div>

