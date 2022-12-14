<div class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Tanggal Pesan</td>
                            <td>Gambar</td>
                            <td>Nama Produk</td>
                            <td>Status</td>
                            <td>Total Harga</td>
                            <td>Aksi</td>
                            <td>Hapus</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                
                        @forelse ($belanja as $pesanan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{  $pesanan->created_at  }}</td>
                            <td>
                                <?php $produk = \App\Models\Product::where('id',  $pesanan->product_id)->first(); ?>
                                <img src="{{ asset('uploads/'.$produk->image_p) }}" width="30px" alt="">
                                
                            </td>
                            <td>{{  $produk->nama_barang }}</td>
                            <td>
                                @if ($pesanan->status == 0)
                                <span class="label-tags" style="background:#ff2525"> <strong>pesanan belum ditambahkan ongkir</strong></span>
                                @endif
                                @if ($pesanan->status == 1)
                                <span class="label-tags" style="background:#0fb0fa"> <strong>Menunggu pembayaran</strong></span>
                                @endif
                                @if ($pesanan->status == 2)
                                <span class="label-tags" style="background:#00a703"> <strong>pesanan telah ditambahkan ongkir</strong></span>
                                @endif
                            </td>
                            <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                            <td>
                                @if ($pesanan->status == 0)
                                    <a href="{{ url('TambahOngkir/'.$pesanan->id) }}" class="genric-btn warning radius btn-block small">Tambahkan Ongkir</a>
                                @endif
                                @if ($pesanan->status == 1)
                                    <a href="{{ url('Bayar/'.$pesanan->id) }}" class="genric-btn success radius btn-block small">Pilih Pembayaran</a>
                                @endif
                                @if ($pesanan->status == 2)
                                    <a href="{{ url('Bayar/'.$pesanan->id) }}" class="btn btn-success btn-block"> Lihat Status</a>
                                @endif
                            </td>
                            <td>
                                <button class="genric-btn danger radius btn-block small" wire:click="destroy({{ $pesanan->id }})">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="12">Data Kosong</td>
                    </tr>
                        @endforelse
          
                        {{-- {{ $belanja->links() }} --}}
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    @if (Session::has('tes'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('tes')}}
    </div>
        
    @endif
</div>
