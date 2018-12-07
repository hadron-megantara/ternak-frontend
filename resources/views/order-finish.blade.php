@extends('layouts.app')

@section('content')

<style>
#cover {
   position: absolute;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   opacity: 0.80;
   background: #aaa;
   z-index: 10;
   display: none;
}

#cartPostCode::placeholder{
    color:#000000;
}

</style>

<?php
    $bankNameList = "";
    foreach($bankAccount as $bankAccount2){
        if($bankNameList != ''){
            $bankNameList = $bankNameList.', ';
        }
        $bankNameList = $bankNameList.$bankAccount2->BankName;
    }
?>

<!-- checkout-area start -->
<div class="checkout-area" style="margin-top:10px">
	<div class="container">
		<div class="row">
			<form action="/payment-method" style="display: -webkit-box;width:100%" method="POST">
				<div class="col-lg-7 col-md-7">
					<div class="checkbox-form">
                        <div id="countDown" class="text-center" style="background-color: #ffffff;border-radius: 10px;margin-bottom:20px;padding:5px">
                            <span>Silakan melakukan pembayaran dalam:</span> <br/>
                            <span style="color:#62B7A9;font-size:18px;display: -webkit-inline-box;font-weight:bold"><span class="fa fa-clock-o"></span> <div id="clock"></div><span>
                        </div>

						<div class="row"></div>

                        <div class="col-md-12 row">
                            <div class="checkout-form-list">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="BankTransfer" checked="checked" style="width:20px;height:15px"> Bank Transfer ({{$bankNameList}})
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12" style="background-color:#ffffff;margin-top:-10px;padding-top:15px;padding-bottom:15px;">
                            <div class="col-md-12 row" style="font-weight:bold">
                                <div class="col-md-6" style="background-color:#F1F1F1">
                                    KODE PEMESANAN
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6 pull-right" style="background-color:#F1F1F1">
                                    <span class="pull-right">{{$orderData->orderCode}}</span>
                                </div>
                            </div>

                            <div class="col-md-12 row">
                                <div class="col-md-6">
                                    Subtotal
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6 pull-right">
                                    <span class="pull-right">Rp {{number_format($orderData->price,0,",",".")}}</span>
                                </div>
                            </div>

                            <div class="col-md-12 row" style="margin-top: 5px">
                                <div class="col-md-6" style="background-color:#F1F1F1">
                                    Biaya Pengiriman
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6 pull-right" style="background-color:#F1F1F1">
                                    <span class="pull-right">Rp 0,0</span>
                                </div>
                            </div>

                            <div class="col-md-12 row" style="margin-top: 5px">
                                <div class="col-md-6">
                                    Kode Transaksi
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6">
                                    <span class="pull-right">Rp {{$orderData->transactionCode}}</span>
                                </div>
                            </div>

                            <div class="col-md-12 row" style="margin-top: 5px;font-weight:bold">
                                <div class="col-md-6" style="background-color:#F1F1F1">
                                    TOTAL
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6 pull-right" style="background-color:#F1F1F1">
                                    <span class="pull-right">Rp {{number_format($orderData->finalPrice,0,",",".")}}</span>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top: 20px">
                                Harap segera mentransfer sesuai dengan jumlah <strong>Total</strong> pembayaran dalam jangka waktu yang tertera pada halaman Pembayaran/Konfirmasi ke salah satu akun <strong>KANGKODING</strong> di bawah ini.
                            </div>

                            <div class="col-md-12 row" style="margin-top: 30px">
                                @foreach($bankAccount as $bankAccount2)
                                    <div class="row">
                                        <div class="col-md-2">&nbsp;</div>
                                        <div class="col-md-3">
                                            <img src="{{$bankAccount2->BankPath}}" style="width:100%;" />
                                        </div>
                                        <div class="col-md-5">
                                            {{$bankAccount2->BankName}}, {{$bankAccount2->Branch}} <br/>
                                            {{$bankAccount2->AccountName}}, <b>{{$bankAccount2->AccountNumber}}</b>
                                        </div>
                                        <div class="col-md-2">&nbsp;</div>
                                    </div>
                                        <span style="margin-bottom:10px" class="clear row">&nbsp;</span>
                                @endforeach
                            </div>

                            <div class="col-md-12 row">
                                <button type="submit" class="btn btn-primary form-control" style="margin-bottom:10px">Konfirmasi Pembayaran</button>

                                <a href="/" class="btn form-control" style="background-color:#ffffff;color:#000000;border:2px solid #0A0A0A"><span class="fa fa-chevron-left"></span> KEMBALI BERBELANJA</a>
                            </div>

                        </div>
					</div>
				</div>
				<div class="col-lg-5 col-md-5" style="margin-top:-30px;">
					<div class="your-order">
						<h3>Detail Pemesanan</h3>
                        <div class="row"></div>

                        <div class="col-md-12" style="background-color:#ffffff;margin-bottom:20px;padding-top:10px;padding-bottom:10px;margin-top:-10px">
                            <div class="col-md-12 row">
                                <div class="col-md-6" style="background-color:#F1F1F1">Nama <span class="pull-right">:</span></div>
                                <div class="col-md-6 pull-right" style="background-color:#F1F1F1">{{$orderData->fullname}}</div>
                            </div>

                            <div class="col-md-12 row">
                                <div class="col-md-6">Alamat Pengiriman <span class="pull-right">:</span></div>
                                <div class="col-md-6 pull-right">{{$orderData->address}}, {{$orderData->districtName}}, {{$orderData->cityName}}, {{$orderData->provinceName}} @if($orderData->postCode != null) - {{$orderData->postCode}} @endif</div>
                            </div>

                            <div class="col-md-12 row">
                                <div class="col-md-6" style="background-color:#F1F1F1">No HP/Telepon <span class="pull-right">:</span></div>
                                <div class="col-md-6 pull-right" style="background-color:#F1F1F1">{{$orderData->phone}}</div>
                            </div>
                        </div>

                        <div class="clear row"></div>

                        <div class="col-md-12" style="background-color:#ffffff;margin-top:-10px;padding-top:15px;padding-bottom:15px;max-height:510px;overflow: scroll;-webkit-overflow-scrolling: touch;">
                            @foreach($orderData->products as $orderData2)
                                <div class="row" style="margin-bottom:10px">
                                    <div class="col-md-4">
                                        <img src="{{env('API_BASE_URL')}}app/images/{{$orderData2->productPhoto}}" style="width:100%" />
                                    </div>

                                    <div class="col-md-8" style="margin:auto">
                                        <b style="font-size:14px">{{$orderData2->productName}}</b> <br/>
                                        Warna : {{$orderData2->productColor}} <br/>
                                        Ukuran : {{$orderData2->productSize}} <br/>
                                        Jumlah : {{$orderData2->productTotal}} <br/>
                                        Harga /pcs : Rp {{number_format($orderData2->productPrice,0,",",".")}} <br/>
                                        Harga Total : Rp {{number_format($orderData2->productTotalPrice,0,",",".")}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
				    </div>
                </div>
			</form>
		</div>
	</div>
</div>
<!-- checkout-area end -->

<div id="cover"> </div>

<script type="text/javascript">
	$(document).ready(function(){
        var finalDate = '{{$orderData->expiredDt}}';

        $('#clock').countdown(finalDate).on('update.countdown', function(event) {
          var $this = $(this).html(event.strftime(''
            + '<span>%H</span> JAM : '
            + '<span>%M</span> Menit : '
            + '<span>%S</span> DETIK'));
        });
	});
</script>

@endsection
