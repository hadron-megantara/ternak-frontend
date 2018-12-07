@extends('layouts.app')

@section('content')

<?php
	$selectPhotoByColor = array();
?>

<!-- breadcrumb start -->
<div class="breadcrumb-area" style="margin-top:10px">
	<div class="container">
		<ol class="breadcrumb" style="margin-top:-20px;margin-bottom:0px;padding-bottom:10px;border:none">
			<a href="/"><i class="fa fa-home"></i></a>
			<span style="margin-right:5px">/</span>
            <a href="/">Jilbab</a>
			<span style="margin-left:5px;margin-right:5px">/</span>
			{{$detail->Name}}
		</ol>
	</div>
</div>
<!-- breadcrumb end -->

<div class="row clear"></div>

<!-- shop-area start -->
<div class="shop-area">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-5">
				<div class="product-zoom">
					<!-- Tab panes -->
					<div class="tab-content">
						@foreach($photo as $photoData)
						<div class="tab-pane @if($photoData->Selected == 1) active @endif" id="photo-{{$photoData->_Product}}-{{$photoData->_Color}}-{{$photoData->Id}}">
							<div class="pro-large-img">
								<img src="{{$photoData->Photo}}" alt="" />
								<a class="popup-link" href="{{$photoData->Photo}}">View larger <i class="fa fa-search-plus" aria-hidden="true"></i></a>
							</div>
						</div>
						@endforeach
					</div>
					<!-- Nav tabs -->
					<div class="details-tab">
						@foreach($photo as $photoData2)
							<?php
								if(!array_key_exists($photoData2->_Color,$selectPhotoByColor)){
									$selectPhotoByColor[$photoData2->_Color] = "subPhoto-".$photoData2->_Product."-".$photoData2->_Color."-".$photoData2->Id;
								}
							?>
							<div @if($photoData2->Selected == 1) class="active" @endif style="max-height:150px"><a href="#photo-{{$photoData2->_Product}}-{{$photoData2->_Color}}-{{$photoData2->Id}}" id="subPhoto-{{$photoData2->_Product}}-{{$photoData2->_Color}}-{{$photoData2->Id}}" data-toggle="tab"><img src="{{$photoData2->Photo}}" alt="" /></a></div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-1 col-md-1">
				&nbsp;
			</div>

			<div class="col-xs-12 col-sm-5 col-md-6">
				<div class="product-details">
					<h2 class="pro-d-title">{{$detail->Name}}</h2>
					<div class="price-box">
						<span class="price product-price">Rp {{number_format($detail->newPrice,0,",",".")}}</span>
						@if($detail->Discount != null)
							<span class="old-price product-price">Rp {{number_format($detail->oldPrice,0,",",".")}}</span>
						@endif
						<span class="pull-right"><span class="fa fa-eye"></span> Telah dilihat 10 orang</span>
					</div>
					<div class="short-desc">
						<p>{{$detail->Description}}</p>
					</div>

					<div class="col-md-12 row" style="margin-bottom:10px">
						<select class="form-control" id="cartColor">
							@foreach($stock as $stockDataKey => $stockDataValue)
								<option value="{{$stockDataKey}}">{{$stockDataValue['name']}}</option>
							@endforeach
						</select>
					</div>

					<div class="col-md-12 row" style="margin-bottom:10px">
						<select class="form-control" id="cartSize"></select>
					</div>

					<div class="row">
						<div class="col-md-3">
							<label>Jumlah</label>
							<input type="number" id="cartTotal" placeholder="" class="form-control" value="1" />
						</div>

						<div class="col-md-9" style="line-height:6">
							<label>Stok Tersedia : <span style="color:#ffae00;font-weight:bold;" id="cartTotalStockSuccess"><span id="cartTotalStock"></span> pcs</span></label>
						</div>
					</div>

					<div class="row clear" style="margin-bottom:10px"></div>

					<div class="col-md-12 row" style="margin-top:30px">
						<button id="addToCart" class="btn btn-success form-control" style="background-color:#4AA9BE"><span class="fa fa-shopping-cart"></span> Tambah Ke Keranjang</button>
					</div>

					<div class="col-md-12 row" style="margin-top:10px">
						<a href="" class="btn btn-primary form-control"><span class="fa fa-heart-o"></span> Tambah Ke Wishlist</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- shop-area end -->

<div style="margin-bottom:100px"></div>

<script type="text/javascript">
	$(document).ready(function(){
		var firstStock = 0;
		@foreach($stock as $stockKey => $stockVal)
			if({{$stockKey}} == $('#cartColor').val()){
				@foreach($stockVal['size'] as $stockSizeKey => $stockSizeVal)
					if(firstStock == 0){
						firstStock = 1;

						$('#cartTotalStock').html('{{$stockSizeVal["total"]}}');
					}

					$('#cartSize').append('<option value="{{$stockSizeKey}}">{{$stockSizeVal["name"]}}</option>');
				@endforeach
			}
		@endforeach

		$('#addToCart').click(function(){
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

			var target = document.getElementById('body');
			var spinner = new Spinner(opts).spin(target);

			$.ajax({
		        type: "POST",
		        url: "/cart/add",
		        data: {
					'id': '{{$detail->Id}}',
					'color' : $('#cartColor').find(":selected").val(),
					'size' : $('#cartSize').find(":selected").val(),
					'total' : $('#cartTotal').val()
				},
		        success: function(data) {
					console.log(data);
					spinner.stop();
					$('#cartCountInfo').css({"opacity": "1", "visibility": "visible"});
					setTimeout(hideCartCountInfo, 3000);
					$('#cartCount').html(data);
		        }
		    });

			function hideCartCountInfo(){
				$('#cartCountInfo').css({"opacity": "0", "visibility": "hidden"});
			}
		});

		$('#cartColor').change(function(){
			if($(this).val() != ''){
				$('#cartSize').html('');

				firstStock = 0;

				@foreach($stock as $stockKey => $stockVal)
					if({{$stockKey}} == $(this).val()){
						@foreach($stockVal['size'] as $stockSizeKey => $stockSizeVal)
							if(firstStock == 0){
								firstStock = 1;

								$('#cartTotalStock').html('{{$stockSizeVal["total"]}}');
							}

							$('#cartSize').append('<option value="{{$stockSizeKey}}">{{$stockSizeVal["name"]}}</option>');
						@endforeach
					}
				@endforeach

				@foreach($selectPhotoByColor as $selectPhotoByColorKey => $selectPhotoByColorVal)
					if({{$selectPhotoByColorKey}} == $(this).val()){
						$("#{{$selectPhotoByColorVal}}").click();
					}
				@endforeach
			}
		});

		$('#cartSize').change(function(){
			if($(this).val() != ''){
				@foreach($stock as $stockKey => $stockVal)
					if({{$stockKey}} == $('#cartColor').val()){
						@foreach($stockVal['size'] as $stockSizeKey => $stockSizeVal)
							if({{$stockSizeKey}} == $(this).val()){
								$('#cartTotalStock').html('{{$stockSizeVal["total"]}}');
							}
						@endforeach
					}
				@endforeach
			}
		});
	})
</script>
@endsection
