<?php
    if(Session::has('cart')){
        $sessionCart = Session('cart');
        $cartCount = $sessionCart['total'];
    } else{
        $cartCount = 0;
    }

    $user = null;
    if(Session::has('user')){
        $user = session('user');
        $firstname = explode(' ', $user['fullname']);
        $firstname = substr($firstname[0], 0, 10);
    }
?>

<style>
    .userMenu li a:hover{
        background-color: #ebebeb;
    }

    .logo:hover{
        cursor: pointer;
    }
</style>

<!-- header start -->
<header class="header-pos elements1" style="border-bottom: 1px solid #ffff;background-color:#ffffff">
    <div class="header-area header-middle">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1 col-sm-1 col-xs-12">
                    <div class="logo">
                        <a href="/"><img src="/img/logo/logo-word-black.png" alt="" / style="width:150px;"></a>
                    </div>
                </div>
                <div class="col-md-11 col-sm-11 col-xs-12 text-right xs-center">
                    <div class="main-menu display-inline hidden-sm hidden-xs">
                        <nav>
                            <ul>
                                <li>
                                    <a href="/products">Semua Produk</a>
                                </li>

                                <li><a href="#">Jilbab</a>
                                    <ul class="submenu" style="margin-top:-20px">
                                        <li><a href="/categories/jilbab" style="border-bottom: 1px solid #ebebeb;">Semua Jilbab</a></li>
                                        <li><a href="/categories/jilbab/ciput">Ciput</a></li>
                                        <li><a href="/categories/jilbab/instant">Kerudung Instan</a></li>
                                        <li><a href="/categories/jilbab/khimar">Khimar</a></li>
                                        <li><a href="/categories/jilbab/pashmina">Pashmina</a></li>
                                        <li><a href="/categories/jilbab/square">Hijab Segi Empat</a></li>
                                    </ul>
                                </li>
                                <li><a>Pakaian</a>
                                    <ul class="submenu" style="margin-top:-20px">
                                        <li class="/categories/clothing" style="border-bottom: 1px solid #ebebeb;"><a href="#">Semua Pakaian</a></li>
                                        <li><a href="/categories/clothing/men">Pakaian Pria</a></li>
                                        <li><a href="/categories/clothing/women">Pakaian Wanita</a></li>
                                        <li><a href="/categories/clothing/gamis">Gamis</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Tas & Sepatu</a>
                                    <ul class="submenu" style="margin-top:-20px">
                                        <li><a href="/categories/bag">Semua Tas</a></li>
                                        <li><a href="/categories/shoe">Semua Sepatu</a></li>
                                    </ul>
                                </li>
                                <li><a href="/promo"><span class="fa fa-asterisk" style="color:red"></span>Diskon & Promo</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="search-block-top display-inline">
                        <div class="icon-search"></div>
                        <div class="toogle-content">
                            <form action="#" id="searchbox">
                                <input type="text" placeholder="Search" />
                                <button class="button-search"></button>
                            </form>
                        </div>
                    </div>
                    <div class="shopping-cart ml-20 display-inline" id="cartCountDiv">
                        <a href="/cart"><b>keranjang</b>(<span id="cartCount">@if(isset($cartCount)) {{$cartCount}} @else 0 @endif</span>)</a>

                        <ul style="margin-top:-50px;background:#FBB62D;height:30px;padding-top:-10px;width:200px" id="cartCountInfo">
                            <li style="color:#ffffff;margin-top:-10px"><span class="fa fa-info-circle"></span> Keranjang Diperbaharui</li>
                        </ul>
                    </div>
                    <div class="display-inline" style="margin-left:10px">
                        <a href="/wishlist" style="color:#000000"><span class="fa fa-heart-o"></span><b style="color:#ffae00">WISHLIST</b></a>
                    </div>
                    <div class="setting-menu display-inline">
                        @if($user == null)
                            <span class="fa fa-user"></span> <a href="/login">Sign In</a> | <a href="/register">Register</a>
                        @else
                            <span class="userMenu" style="color:#4FC1F0;"><span class="fa fa-user"> Hi, <span style="font-weight:bold">{{$firstname}}</span></span></span>
                            <ul class="content-nav toogle-content userMenu userMenuDropDown" style="margin-top:-30px;padding:0px">
                                <li class="currencies-block-top" style="padding-top:0px;margin-top:-20px">
                                    <div class="current" style="height:30px;background:none;background-color:none"></div>
                                    <div class="current" style="cursor:auto"><b>Akun Saya</b></div>
                                    <ul>
                                        <li><a href="/profile"><span class="fa fa-user"></span> Profil</a></li>
                                        <li><a href="/booking-history"><span class="fa fa-list-alt"></span> Riwayat Pemesanan</a></li>
                                        <li><a href="/signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-menu-area visible-sm visible-xs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
						<ul>
							<li><a href="#">Home</a>
								<ul>
									<li><a href="index.html">home version 1</a></li>
									<li><a href="index-2.html">home version 2</a></li>
									<li><a href="index-3.html">home version 3</a></li>
									<li><a href="index-4.html">home version 4</a></li>
								</ul>
							</li>
							<li><a href="shop.html">Sofa</a>
								<ul>
									<li><a href="#">Bras & Tanks</a></li>
									<li><a href="#">Trousers</a></li>
									<li><a href="#">Hoodies & Sweatshirts</a></li>
									<li><a href="#">Tees</a></li>
									<li><a href="#">Jackets</a></li>
									<li><a href="#">Shorts</a></li>
									<li><a href="#">Trousers</a></li>
									<li><a href="#">Tees</a></li>
									<li><a href="#">Tanks</a></li>
									<li><a href="#">Pants</a></li>
									<li><a href="#">trousers</a></li>
									<li><a href="#">jeans</a></li>
									<li><a href="#">shorts</a></li>
									<li><a href="#">suits</a></li>
									<li><a href="#">jackets</a></li>
								</ul>
							</li>
							<li><a href="#">Elements</a>
								<ul>
                                        <li><a href="elements-alerts.html">alerts</a></li>
                                        <li><a href="elements-banner1.html">banner 1</a></li>
                                        <li><a href="elements-banner2.html">banner 2</a></li>
                                        <li><a href="elements-banner3.html">banner 3</a></li>
                                        <li><a href="elements-brand-logo.html">brand logo</a></li>
                                        <li><a href="elements-buttons.html">buttons</a></li>
                                        <li><a href="elements-blog.html">blog</a></li>
                                        <li><a href="elements-tab.html">tab</a></li>
                                        <li><a href="elements-map.html">map</a></li>
                                        <li><a href="elements-collapse.html">collapse</a></li>
                                        <li><a href="elements-newsletter.html">newsletter</a></li>
                                        <li><a href="elements-newsletter-2.html">newsletter 2</a></li>
                                        <li><a href="elements-products.html">products</a></li>
                                        <li><a href="elements-services.html">services</a></li>
                                        <li><a href="elements-social-icon.html">social icon</a></li>
                                        <li><a href="elements-testimonial.html">testimonial</a></li>
                                        <li><a href="elements-carousel-tab.html">carousel with tab</a></li>
								</ul>
							</li>
							<li><a href="shop.html">Lighting</a>
								<ul>
									<li><a href="#">Bras & Tanks</a></li>
									<li><a href="#">Trousers</a></li>
									<li><a href="#">Hoodies & Sweatshirts</a></li>
									<li><a href="#">Tees</a></li>
									<li><a href="#">Jackets</a></li>
									<li><a href="#">Shorts</a></li>
									<li><a href="#">Trousers</a></li>
									<li><a href="#">Tees</a></li>
									<li><a href="#">Tanks</a></li>
									<li><a href="#">Pants</a></li>
									<li><a href="#">trousers</a></li>
									<li><a href="#">jeans</a></li>
									<li><a href="#">shorts</a></li>
									<li><a href="#">suits</a></li>
									<li><a href="#">jackets</a></li>
								</ul>
							</li>
							<li><a href="#">Pages</a>
							    <ul>
									<li><a href="blog.html">blog</a></li>
									<li><a href="blog-details.html">blog details</a></li>
									<li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
									<li><a href="cart.html">cart</a></li>
									<li><a href="checkout.html">checkout</a></li>
									<li><a href="contact.html">contact</a></li>
									<li><a href="login.html">login</a></li>
									<li><a href="product-details.html">product details</a></li>
									<li><a href="register.html">register</a></li>
									<li><a href="shop.html">shop</a></li>
									<li><a href="wishlist.html">wishlist</a></li>
								</ul>
							</li>
							<li><a href="#">What's New</a></li>
						</ul>
					</nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->

<script type="text/javascript">
	$(document).ready(function(){
        $('#cartCountDiv').hover(function(){
            $('#cartCountInfo').css({"opacity": "0", "visibility": "hidden"});
        });

        $('.userMenu').hover(function(){
            $('.userMenuDropDown').show();
        });

        $('.userMenu').mouseleave(function(){
            $('.userMenuDropDown').hide();
        });

        $('.logo').click(function(){
            window.location.replace = '/';
        });
    });
</script>
