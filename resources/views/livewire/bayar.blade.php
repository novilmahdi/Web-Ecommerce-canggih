
   <div>
    
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if($belanja->status == 1)
                <div class="row">
                    <div class="col-md-12">
                        <button id="pay-button" type="button" class="btn btn-primary center-block">pay!</button>
                    </div>
                </div>
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