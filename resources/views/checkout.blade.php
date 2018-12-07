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
<!-- checkout-area start -->
<div class="checkout-area" style="margin-top:50px">
	<div class="container">
		<div class="row">
			<form action="/checkout" style="display: -webkit-box;" method="POST">
				<div class="col-lg-6 col-md-6">
					<div class="checkbox-form">
						<h3>Informasi Anda</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="checkout-form-list">
									<input type="text" placeholder="Nama Lengkap" class="form-control" id="cartFullname" name="fullname" @if(isset($userData) && $userData != null) value="{{$userData['fullname']}}" @endif />
								</div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list">
									<input type="text" placeholder="Nomor Handphone/Telepon" class="form-control" id="cartPhoneNumber" name="phone" @if(isset($userData) && $userData != null) value="{{$userData['phone']}}" @endif />
								</div>
							</div>
							<div class="col-md-12">
                                <div class="checkout-form-list">
    								<select class="form-control" id="cartProvince" name="provinceId">
                                        <option value="">--- Pilih Provinsi ---</option>
                                        @foreach($province as $provinceData)
                                            <option value="{{$provinceData->Id}}">{{$provinceData->Name}}</option>
                                        @endforeach
    								</select>
                                </div>
							</div>
							<div class="col-md-12">
                                <div class="checkout-form-list">
    								<select class="form-control" id="cartCity" name="cityId">
    								  	<option value="">--- Pilih Kota/Kabupaten ---</option>
    								</select>
                                </div>
							</div>
							<div class="col-md-12">
                                <div class="checkout-form-list">
    								<select class="form-control" id="cartDistrict" name="districtId">
    								  	<option value="">--- Pilih Kecamatan ---</option>
    								</select>
                                </div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list">
									<textarea class="form-control" name="address" id="cartAddress" placeholder="Alamat" rows="4" style="resize:none"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>Kode POS <span class="required">*</span></label>
									<input type="text" name="postCode" placeholder="Kode POS (tidak wajib)" id="cartPostCode" style="color:#000000" />
								</div>
							</div>
							<div class="col-md-6">&nbsp;</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6" style="margin-top:-30px">
					<div class="your-order">
						<h3>Pemesanan Anda</h3>
						<div class="your-order-table table-responsive">
							<table>
								<thead>
									<tr>
										<th class="product-name">Produk</th>
										<th class="product-total">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php $cartTotalProductPrice = 0; ?>
									@foreach($productDetail as $productDetailData)
										@foreach($productDetailData as $productDetailData2)
											@foreach($productDetailData2 as $productDetailData3)
												<tr class="cart_item">
													<td class="product-name">
														{{$productDetailData3['name']}} - {{$productDetailData3['color']}} - {{$productDetailData3['size']}} <strong class="product-quantity"> × {{$productDetailData3['total']}} </strong>
													</td>
													<td class="product-total">
														<span class="amount">Rp {{number_format($productDetailData3['price']*$productDetailData3['total'],0,",",".")}}</span>
														<?php $cartTotalProductPrice = $cartTotalProductPrice + $productDetailData3['price']*$productDetailData3['total']; ?>
													</td>
												</tr>
											@endforeach
										@endforeach
									@endforeach
								</tbody>
								<tfoot>
									<tr class="cart-subtotal">
										<th>Sub Total</th>
										<td><span class="amount">Rp {{number_format($cartTotalProductPrice,0,",",".")}}</span></td>
									</tr>
									<tr class="order-total">
										<th>Total Pemesanan</th>
										<td><strong><span class="amount" id="cartFinalPrice">Rp {{number_format($cartTotalProductPrice,0,",",".")}}</span></strong>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="payment-method">
							<div class="payment-accordion">
                                <div class="order-button-payment">
                                    <button type="button" class="btn btn-primary form-control" id="checkoutProcess" style="background-color:#ffae00">Lanjut ke Pembayaran</button>
                                </div>
						    </div>
					    </div>
				    </div>
                </div>
			</form>
		</div>
	</div>
</div>
<!-- checkout-area end -->

<div id="cover" style="width:100%;height:100%"> </div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cartProvince').change(function(){
			$.ajax({
				type: "get",
				url: "/config/city/get",
				data: {
					'provinceId': $(this).val(),
				},
				success: function(data) {
					$('#cartCity').html('<option value="">--- Pilih Kota/Kabupaten ---</option>');

					$.each(data, function(k, v) {
						$('#cartCity').append('<option value="'+v.Id+'">'+v.Name+'</option>');
					});
				}
			});
		});

		$('#cartCity').change(function(){
			$.ajax({
				type: "get",
				url: "/config/district/get",
				data: {
					'cityId': $(this).val(),
				},
				success: function(data) {
					$('#cartDistrict').html('<option value="">--- Pilih Kecamatan ---</option>');

					$.each(data, function(k, v) {
						$('#cartDistrict').append('<option value="'+v.Id+'">'+v.Name+'</option>');
					});
				}
			});
		});

		$('#checkoutProcess').click(function(){
			var opts = {
			  lines: 13, // The number of lines to draw
			  length: 38, // The length of each line
			  width: 17, // The line thickness
			  radius: 45, // The radius of the inner circle
			  scale: 1, // Scales overall size of the spinner
			  corners: 1, // Corner roundness (0..1)
			  color: '#ffffff', // CSS color or array of colors
			  fadeColor: 'transparent', // CSS color or array of colors
			  opacity: 0.25, // Opacity of the lines
			  rotate: 0, // The rotation offset
			  direction: 1, // 1: clockwise, -1: counterclockwise
			  speed: 1, // Rounds per second
			  trail: 60, // Afterglow percentage
			  fps: 20, // Frames per second when using setTimeout() as a fallback in IE 9
			  zIndex: 2e9, // The z-index (defaults to 2000000000)
			  className: 'spinner', // The CSS class to assign to the spinner
			  top: '50%', // Top position relative to parent
			  left: '50%', // Left position relative to parent
			  position: 'absolute' // Element positioning
			};

			$("#cover").fadeIn(100);
			var target = document.getElementById('body');
			var spinner = new Spinner(opts).spin(target);

			var fullname = $('#cartFullname').val();
			var phone = $('#cartPhoneNumber').val();
			var province = $('#cartProvince').val();
			var city = $('#cartCity').val();
			var district = $('#cartDistrict').val();
			var postCode = $('#cartPostCode').val();
            var address = $('#cartAddress').val();

			$.ajax({
				type: "post",
				url: "/checkout",
				data: {
					'fullname': fullname,
					'phone': phone,
					'province': province,
					'city': city,
					'district': district,
					'postCode': postCode,
                    'address': address,
				},
				success: function(data) {
                    window.location.replace("/order/"+data);
				}
			});
		});
	});
</script>

@endsection
