
   <div>
    
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if($belanja->status == 1)
            {{-- @foreach ($belanjaCheck as $b_check) --}}
                
                <div class="row">
                    <div class="col-md-12">
                        {{-- <div class="col-lg-4"> --}}
                            <div class="order_box">
                              <h2>Your Order</h2>
                              <ul class="list">
                                <li>
                                  <a href="#">Product
                                    <span>Total</span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#">{{ $produk->nama_barang}}
                                    {{-- <span class="middle">x 02</span> --}}
                                    <span class="last">Rp. {{ number_format($total_harga) }}</span>
                                  </a>
                                </li>
                                {{-- <li>
                                  <a href="#">Fresh Tomatoes
                                    <span class="middle">x 02</span>
                                    <span class="last">$720.00</span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#">Fresh Brocoli
                                    <span class="middle">x 02</span>
                                    <span class="last">$720.00</span>
                                  </a>
                                </li> --}}
                              </ul>
                              <ul class="list list_2">
                                {{-- <li>
                                  <a href="#">Subtotal
                                    <span>$2160.00</span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#">Shipping
                                    <span>Flat rate: $50.00</span>
                                  </a>
                                </li> --}}
                                <li>
                                  <a href="#">Total
                                    <span>Rp. {{ number_format($total_harga) }}</span>
                                  </a>
                                </li>
                              </ul>
                              <div class="payment_item">
                                  <div style="text-align: center">

                                    <label for="f-option5">Peringatan!</label>
                                  </div>
                               
                                <p>
                                    Mohon di check kembli pesanan anda sebelum membayar!
                                </p>
                              </div>
                    
                              <br><div style="display: flex; align-items: center; justify-content: center;">

                                <button id="pay-button" type="button" class="btn_3" >BAYAR!</button>
                              </div>

                            </div>
                          {{-- </div> --}}
                    </div>
                </div>
            {{-- @endforeach --}}

                @elseif ($belanja->status == 2)
                <div class="card">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col">
                                <table class="table" style="border-top: hidden">
                                    <tr>
                                        <td>Virtual Akun</td>
                                        <td>:</td>
                                        <td>{{ $va_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bank</td>
                                        <td>:</td>
                                        <td>{{ $bank }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($gross_amount) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td> <span class="label-tags" style="background:#00a703">{{ $transaction_status }}</span></td>
                                    
                                    </tr>
                                    <tr>
                                        <td>Batas Waktu Pembayaran</td>
                                        <td>:</td>
                                        <td>{{ $deadline }}</td>
                                    </tr>
                                </table>
                                </div>
                            </div> 

                        </div>
                    </div>
                    
                </div>
            @endif
        </div>
    </div>
   </div>
</div>

<form id="payment-form" method="get" action="Payment">
    <input type="hidden" name="result_data" id="result-data" value="">
</form>
</body>

<!-- TODO Remove ".sandbox" form script src URL for production environment. Also input your clien key in "data-client-key" -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-rcOJqzEvYmYAn_Ql"></script>

{{-- Jqurey Supaya bisa intergrasi dengan script(Jquery) dengan form  --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{-- End --}}
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        // SnapToken acuquired form previous step
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');
        function changeResult(type,data){
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            // resultType.innerHTML = TYPE;
            // resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay('<?=$snapToken?>', {
            //optional
            onSuccess: function(result){
                changeResult('success', result);
                console.log(result.status_message);
                console.log(result);
                $("#payment-form").submit();
            },
            onPending: function(result){
                changeResult('pending', result);
                console.log(result.status_message);
                console.log(result);
                $("#payment-form").submit();
            },
            onError: function(result){
                changeResult('error', result);
                console.log(result.status_message);
                $("#payment-form").submit();
            }
        });
    };
</script>


   </div>