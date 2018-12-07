@extends('layouts.app')

@section('content')

<style>
	input{
		width: fit-content;
		height: fit-content;
	}

	.filterColor:hover{
		visibility: visible;
	}
</style>

<!-- breadcrumb start -->
<div class="breadcrumb-area" style="margin-top:10px;margin-bottom:20px">
	<div class="container">
		<ol class="breadcrumb" style="margin-top:-20px;margin-bottom:0px;padding-bottom:10px;border-bottom: 1px solid #ebebeb;">
			<a href="/"><i class="fa fa-home"></i></a>
			<span style="margin-left:5px;margin-right:5px">/</span>
			Cart
		</ol>
	</div>
</div>
<!-- breadcrumb end -->

<!-- shop-area start -->
<div class="shop-area">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4">
				<div class="column" style="background-color:#ffffff">
					<div class="row" style="margin-bottom:20px"></div>
					<span class="pull-left" style="font-size:18px;font-weight:bold">Filter</span>
					<span class="pull-right"><a href="/products" style="color:#000000"><span class="fa fa-close"></span>Hapus Semua Filter</a></span>
					<div class="row" style="margin-bottom:50px"></div>
					<div class="sidebar-widget">
						<h3 class="sidebar-title">Kategori</h3>
						<ul class="sidebar-menu">
							@foreach($dataCategory as $dataCategoryList)
							<li>
								<?php
									$searchCategory = "";

									if(count($productCategorySearch) > 0){
										if(in_array($dataCategoryList->Id, $productCategorySearch)){
											$searchCategory = "checked";
										}
									}
								?>
								<input class="filterCheck categoryCheck" type="checkbox" value="{{$dataCategoryList->Id}}" style="margin-right:10px" {{$searchCategory}}>{{$dataCategoryList->Name}}
							</li>
							@endforeach
						</ul>
					</div>
					<div class="sidebar-widget">
						<h3 class="sidebar-title">Gender</h3>
						<ul class="sidebar-menu">
							@foreach($dataGender as $dataGenderList)
							<li>
								@if($dataGenderList->Id != 3)
									<?php
										$searchGender = "";

										if(count($productGenderSearch) > 0){
											if(in_array($dataGenderList->Id, $productGenderSearch)){
												$searchGender = "checked";
											}
										}
									?>
									<input class="filterCheck genderCheck" type="checkbox" value="{{$dataGenderList->Id}}" style="margin-right:10px" {{$searchGender}}>{{$dataGenderList->Name}}
								@endif
							</li>
							@endforeach
						</ul>
					</div>
					<div class="sidebar-widget">
						<h3 class="sidebar-title">Warna</h3>
						<ul class="sidebar-menu filterColor" style="height:200px;overflow: scroll;">
							@foreach($dataColor as $dataColorList)
							<li>
								<?php
									$searchColor = "";

									if(count($productColorSearch) > 0){
										if(in_array($dataColorList->Id, $productColorSearch)){
											$searchColor = "checked";
										}
									}
								?>

								<input class="filterCheck colorCheck" type="checkbox" value="{{$dataColorList->Id}}" style="margin-right:10px" {{$searchColor}}>{{$dataColorList->Name}}
							</li>
							@endforeach
						</ul>
					</div>
					<div class="sidebar-widget">
						<h3 class="sidebar-title">Harga</h3>
						<div class="price-filter">
							<p>
							  <label for="amount">Range:</label>
							  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
							</p>
							<div id="slider-range"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-8" style="margin-top:-50px">
				<h2 class="page-heading mt-40">
					<span class="cat-name">Scarf</span>
					<span class="heading-counter">
						@if(count($productList) > 0)
							<span style="font-weight:bold;font-size:16px">{{$productList[0]->TotalData}}</span> Produk tersedia
						@else
							Produk tidak tersedia
						@endif
					 </span>
				</h2>
				<div class="shop-page-bar">
					<div>
						<div class="shop-bar">
							<!-- Nav tabs -->
							<div class="selector-field f-left ml-20 hidden-xs">
								<form action="#">
									<label>Sort by</label>
									<select name="select">
										<option value="">Newest</option>
										<option value="">Oldest</option>
										<option value="">Lowest Price</option>
										<option value="">Highest Price</option>
									</select>
								</form>
							</div>
						</div>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="row">
									@if(count($productList) > 0)
										@foreach($productList as $productListData)
										<div class="col-md-4 col-sm-6">
											<div class="product-wrapper mb-40">
												<div class="product-img">
													<a href="/products/detail/{{$productListData->Id}}">
														<img src="{{$productListData->Photo}}" alt="" style="height:410px"/>
													</a>
													@if($productListData->Discount != null)
														@if($productListData->DiscountType == "Percent")
															<span class="new-label" style="padding-left:10px;padding-right:10px; background-color:red;text-transform: capitalize;;">Diskon {{$productListData->Discount}} %</span>
														@else
															<span class="new-label" style="background-color:red;padding-left:5px;padding-right:5px;text-transform: capitalize;">Diskon Rp {{number_format($productListData->Discount,0,",",".")}}</span>
														@endif
													@endif
													<div class="product-action">
														<a href="{{$productListData->Photo}}"><i class="pe-7s-look"></i></a>
													</div>
												</div>
												<div class="product-content">
													<div class="pro-title">
														<h3><a href="product-details.html">{{$productListData->Name}}</a></h3>
													</div>
													<div class="price-reviews">
														<div class="price-box">
															<span class="price product-price">Rp {{number_format($productListData->newPrice,0,",",".")}}</span>
															@if($productListData->Discount != null)
																<span class="old-price product-price">Rp {{number_format($productListData->oldPrice,0,",",".")}}</span>
															@endif
														</div>
													</div>
												</div>
											</div>
										</div>
										@endforeach
									@else
										<div class="col-md-12" style="margin-top:200px;margin-bottom:300px">
											<span class="text-center" style="margin:auto;display:inline-block;width:100%;font-size:18px">
												Hasil filter Anda tidak ditemukan.
											</span>
										</div>
									@endif
								</div>
							</div>

							<div class="content-sortpagibar pull-right">
								<ul class="shop-pagi display-inline">
									@if(count($productList) > 0)
										<?php
											$urlParam = '';
											if(isset($_GET['product_search'])){
												$urlParamSearch = $_GET['product_search'];
												// dd($urlParamSearch);
												foreach($urlParamSearch as $urlParamSearchKey => $urlParamSearchVal){
													foreach($urlParamSearchVal as $urlParamSearchKey2 => $urlParamSearchVal2){
														if($urlParam != ''){
															$urlParam = $urlParam.'&';
														}

														$urlParam = $urlParam.'product_search['.$urlParamSearchKey.'][]='.$urlParamSearchVal2;
													}
												}
											}

											$urlParam1 = '';
											if($urlParam != ''){
												$urlParam1 = $urlParam.'&';
											}
											$urlParam1 = $urlParam1.'page=1';
										?>
										<li><a href="/products?{{$urlParam1}}"><i class="fa fa-angle-left"></i></a></li>
										<?php
											$countPage = 1;
											for($i=1;$i <= ceil($productList[0]->TotalData / env('PRODUCT_LIST_LIMIT', 15));$i++){
												$isActivePage = "";
												if((isset($_GET['page']) && $_GET['page'] != '' && $_GET['page'] > 0 && $_GET['page'] == $i) || !isset($_GET['page']) && $i == 1){
													$isActivePage = "active";
												}

												$urlParam2 = '';
												if($urlParam != ''){
													$urlParam2 = $urlParam.'&';
												}
												$urlParam2 = $urlParam2.'page='.$countPage;
										?>
												<li class="{{$isActivePage}}"><a href="/products?{{$urlParam2}}">{{$countPage}}</a></li>
										<?php
												$countPage++;
											}

											$urlParam3 = '';
											if($urlParam != ''){
												$urlParam3 = $urlParam.'&';
											}
											$urlParam3 = $urlParam3.'page='.$countPage;
										?>
										<li><a href="/products?{{$urlParam3}}"><i class="fa fa-angle-right"></i></a></li>
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- shop-area end -->

<script type="text/javascript">
	$(document).ready(function(){
		$('.filterCheck').click(function(){
			// var category = [];
			var category = "";
			var gender = "";
			var color = "";

			$( ".categoryCheck" ).each(function() {
				if(this.checked){
					// category.push($(this).val());
					if(category == ""){
						category = 'product_search[categories][]='+$(this).val();
					} else{
						category = category+'&product_search[categories][]='+$(this).val();
					}
				}
			});

			$( ".genderCheck" ).each(function() {
				if(this.checked){
					if(gender == ""){
						if(category != ""){
							gender = '&product_search[gender][]='+$(this).val();
						} else{
							gender = 'product_search[gender][]='+$(this).val();
						}
					} else{
						gender = gender+'&product_search[gender][]='+$(this).val();
					}
				}
			});

			$( ".colorCheck" ).each(function() {
				if(this.checked){
					if(color == ""){
						if(category == "" && gender == ""){
							color = 'product_search[color][]='+$(this).val();
						} else{
							color = '&product_search[color][]='+$(this).val();
						}
					} else{
						color = color+'&product_search[color][]='+$(this).val();
					}
				}
			});

			window.location.replace("/products?"+category+gender+color);
		});
	});
</script>

@endsection
