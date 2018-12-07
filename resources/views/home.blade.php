@extends('layouts.app')

@section('content')

<img src="/images/banner/banner-1.jpg" style="width:100%;";></img>

<!-- new-arrival-area start -->
	<div class="new-arrival-area ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-title text-center mb-20">
					<h2>terbaru</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="product-tab">
						<!-- Nav tabs -->
						<ul class="custom-tab text-center mb-40">
							<li class="active"><a href="#hijab" data-toggle="tab">Kerudung</a></li>
							<li><a href="#cloth" data-toggle="tab">Baju</a></li>
							<li><a href="#gamis" data-toggle="tab">Gamis</a></li>
							<li><a href="#bag-shoes" data-toggle="tab">Tas & Sepatu</a></li>
							<li><a href="#discount" data-toggle="tab"><span class="fa fa-asterisk" style="color:red"></span>Diskon&Promo</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="row">
							<div class="tab-content" style="width:100%">
								<div class="tab-pane active" id="hijab">
									<div class="product-carousel">
										<?php $countData = 1; ?>
										@foreach($product->product as $productData)
										<div class="col-md-12">
											<div class="product-wrapper mb-40  mrg-nn-xs">
												<div class="product-img">
													<a href="/products/detail/{{$productData->Id}}"><img src="{{$productData->Photo}}" alt="" style="height:407px" /></a>
													<span class="new-label">New</span>
													<div class="product-action">
														{{-- <a href="#"><i class="pe-7s-cart"></i></a> --}}
														{{-- <a href="#"><i class="pe-7s-like"></i></a>
														<a href="#"><i class="pe-7s-folder"></i></a> --}}
														<a href="/products/{{$productData->Id}}" data-toggle="modal" data-target="#productModal"><i class="pe-7s-look"></i></a>
													</div>
												</div>
												<div class="product-content">
													<div class="pro-title">
														<h3><a href="product-details.html">{{$productData->Name}}</a></h3>
													</div>
													<div class="price-reviews">
														<div class="price-box">
															<span class="price product-price">Rp {{number_format($productData->newPrice,0,",",".")}}</span>
															@if($productData->Discount != null)
																<span class="old-price product-price">Rp {{number_format($productData->oldPrice,0,",",".")}}</span>
															@endif
														</div>
														{{-- <div class="pro-rating">
															<a href="#"><i class="fa fa-star-o"></i></a>
															<a href="#"><i class="fa fa-star-o"></i></a>
															<a href="#"><i class="fa fa-star-o"></i></a>
															<a href="#"><i class="fa fa-star-o"></i></a>
															<a href="#"><i class="fa fa-star-o"></i></a>
														</div> --}}
													</div>
												</div>
											</div>
										</div>
										<?php $countData++; ?>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- new-arrival-area end -->

	<!-- service-area start -->
	<div class="service-area pt-70 pb-40 gray-bg" style="margin-top:-100px">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="single-service mb-30">
						<div class="service-icon">
							<i class="pe-7s-world"></i>
						</div>
						<div class="service-title">
							<h3>FREE SHIPPING</h3>
							<p>Free shipping on all UK orders</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="single-service mb-30">
						<div class="service-icon">
							<i class="pe-7s-refresh"></i>
						</div>
						<div class="service-title">
							<h3>FREE EXCHANGE</h3>
							<p>30 days return on all items</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="single-service mb-30 sm-mrg">
						<div class="service-icon">
							<i class="pe-7s-headphones"></i>
						</div>
						<div class="service-title">
							<h3>PREMIUM SUPPORT</h3>
							<p>We support online 24 hours a day</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="single-service mb-30 xs-mrg sm-mrg">
						<div class="service-icon">
							<i class="pe-7s-gift"></i>
						</div>
						<div class="service-title">
							<h3>BLACK FRIDAY</h3>
							<p>Shocking discount on every friday</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- service-area end -->

@endsection
