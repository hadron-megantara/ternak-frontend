@extends('layouts.app')

@section('content')

<!-- login-area start -->
<div class="login-area mb-50" style="margin-top:-20px">
    <div class="container">
		<div class="row">
			<div class="col-md-12 row" style="background-color:#ffffff;padding:20px;margin-top:30px;height:100%">
				<div class="row" style="margin-top:10px;">
                    <div class="col-md-6 row-eq-height" style="margin-bottom:20px">
                        <a href="/booking-history" class="btn-sm btn-black"><span class="fa fa-chevron-left"></span> Kembali</a>
                        <div class="row clear"></div>
                        <div style="margin-top:20px"></div>

                        <label><strong style="font-size:18px">Detail Pembayaran</strong></label>
                        <div class="col-md-11" style="box-shadow: 3px 2px 1px 1px rgba(0,0,0,.21);border: 1px solid hsla(0,0%,4%,.25);border-radius: 5px;padding:10px 20px">
                            <div class="col-md-12">
                                <div class="col-md-6" style="background-color:#F1F1F1">
                                    Kode Pemesanan
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6" style="background-color:#F1F1F1">
                                    <span class="pull-right"><strong>{{$bookingDetail->orderCode}}</strong></span>
                                </div>

                                <div class="col-md-6">
                                    Status Pemesanan
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6">
                                    <span class="pull-right">
                                        @if($bookingDetail->status == 0)
                                            Menunggu Pembayaran
                                        @elseif($bookingDetail->status == 1)
                                            Pembayaran Telah Diterima
                                        @elseif($bookingDetail->status == 2)
                                            Pemesanan Sedang Diproses
                                        @elseif($bookingDetail->status == 3)
                                            Pemesanan Sedang Dikirim
                                        @elseif($bookingDetail->status == 4)
                                            Pemesanan Telah Sampai Tujuan
                                        @elseif($bookingDetail->status == 5)
                                            Pemesanan Dibatalkan
                                        @endif
                                    </span>
                                </div>

                                <div class="col-md-6" style="background-color:#F1F1F1">
                                    Jumlah Transaksi
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6" style="background-color:#F1F1F1">
                                    <span class="pull-right">Rp {{number_format($bookingDetail->finalPrice,0,",",".")}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1">&nbsp;</div>

                        <div class="row clear"></div>

                        <div style="margin-top:50px"></div>

                        <label><strong style="font-size:18px;">Detail Pemesanan</strong></label>
                        <div class="col-md-11" style="box-shadow: 3px 2px 1px 1px rgba(0,0,0,.21);border: 1px solid hsla(0,0%,4%,.25);border-radius: 5px;padding:10px 20px">
                            <div class="col-md-12">
                                <div class="col-md-6" style="background-color:#F1F1F1">
                                    Subtotal
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6" style="background-color:#F1F1F1">
                                    <span class="pull-right">Rp {{number_format($bookingDetail->price,0,",",".")}}</span>
                                </div>

                                <div class="col-md-6">
                                    Ongkos Kirim
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6">
                                    <span class="pull-right">Rp 0</span>
                                </div>

                                <div class="col-md-6" style="background-color:#F1F1F1">
                                    Kode Transaksi
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6" style="background-color:#F1F1F1">
                                    <span class="pull-right">{{$bookingDetail->transactionCode}}</span>
                                </div>

                                <div class="col-md-6">
                                    Total
                                    <span class="pull-right">:</span>
                                </div>

                                <div class="col-md-6">
                                    <span class="pull-right">Rp {{number_format($bookingDetail->finalPrice,0,",",".")}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1">&nbsp;</div>

                        <div class="row clear"></div>

                        <div style="margin-top:20px"></div>

                        <div class="col-md-4 row text-center">
                            <span class="fa fa-truck" style="font-size:40px;margin-bottom:5px"></span> <br/>
                            Pengiriman Cepat
                        </div>

                        <div class="col-md-4 text-center">
                            <span class="fa fa-calendar" style="font-size:40px;margin-bottom:5px"></span> <br/>
                            Pengembalian Gratis Dalam 7 Hari
                        </div>

                        <div class="col-md-4 text-center">
                            <span class="fa fa-check-circle" style="font-size:40px;margin-bottom:5px"></span> <br/>
                            Pembayaran Aman
                        </div>

                        <div class="row clear"></div>
                        <div style="margin-top:20px"></div>

                        <div class="col-md-12 row" style="padding-right:30px">
                            <a href="/products" class="btn btn-primary form-control"><span class="fa fa-shopping-cart"></span> KEMBALI BERBELANJA</a>
                        </div>

                    </div>

                    <div class="col-md-6 row-eq-height" style="margin-bottom:20px">
                        <label><strong style="font-size:18px">Alamat Pengiriman</strong></label>
                        <div class="col-md-11" style="box-shadow: 3px 2px 1px 1px rgba(0,0,0,.21);border: 1px solid hsla(0,0%,4%,.25);border-radius: 5px;padding:10px 0px">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    {{$bookingDetail->fullname}}
                                </div>

                                <div class="col-md-12">
                                    {{$bookingDetail->address}},
                                </div>

                                <div class="col-md-12">
                                    {{$bookingDetail->districtName}}, {{$bookingDetail->cityName}}, {{$bookingDetail->provinceName}}, Indonesia @if($bookingDetail->postCode != null) , {{$bookingDetail->postCode}} @endif
                                </div>

                                <div class="col-md-12">
                                    <span style="color:grey">Nomor Telepon:</span> {{$bookingDetail->phone}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1">&nbsp;</div>

                        <div class="row clear"></div>

                        <div style="margin-top:50px"></div>

                        <label><strong style="font-size:18px">Produk Yang Dipesan</strong></label>
                        <div class="col-md-11" style="box-shadow: 3px 2px 1px 1px rgba(0,0,0,.21);border: 1px solid hsla(0,0%,4%,.25);border-radius: 5px;padding:10px 0px">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    @foreach($bookingDetail->products as $orderData2)
                                        <div class="row" style="margin-bottom:10px">
                                            <div class="col-md-4">
                                                <img src="{{env('API_BASE_URL')}}app/images/{{$orderData2->productPhoto}}" style="width:100%" />
                                            </div>

                                            <div class="col-md-8" style="padding:inherit">
                                                <b style="font-size:18px">{{$orderData2->productName}}</b> <br/>
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

                        <div class="col-md-1">&nbsp;</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

	});
</script>

@endsection
