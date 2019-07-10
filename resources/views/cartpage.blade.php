<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>efirife- Online shopping</title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- custom css -->
   <link rel="stylesheet" href="{{asset('css/custom.css') }}">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href=" {{ asset ('css/bootstrap.min.css') }}" />

  <!-- Slick -->
  <link type="text/css" rel="stylesheet" href=" {{asset ('css/slick.css') }}" />
  <link type="text/css" rel="stylesheet" href=" {{asset ('css/slick-theme.css') }}" />

  <!-- nouislider -->
  <link type="text/css" rel="stylesheet" href=" {{asset ('css/nouislider.min.css') }}" />

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href=" {{asset ('fonts/backend_fonts/font-awesome.min.css') }}">

  <!--Font Awesome Icon  -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="{{ asset ('css/style.css') }}" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
  <!-- HEADER -->
  <header>
    <!-- top Header -->
    <div id="top-header">
      <div class="container">
        <div class="pull-left">
          <span>Welcome to efirifie online shopping!</span>
        </div>
        <div class="pull-right">
          <ul class="header-top-links">
            <li><a href="#">Store</a></li>
            <li><a href="#">Newsletter</a></li>
            <li><a href="#">FAQ</a></li>
            <li class="dropdown default-dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
              <ul class="custom-menu">
                <li><a href="#">English (ENG)</a></li>
                <li><a href="#">Russian (Ru)</a></li>
                <li><a href="#">French (FR)</a></li>
                <li><a href="#">Spanish (Es)</a></li>
              </ul>
            </li>
            <li class="dropdown default-dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
              <ul class="custom-menu">
                <li><a href="#">USD ($)</a></li>
                <li><a href="#">EUR (€)</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
      <div class="container">
        <div class="pull-left">
          <!-- Logo -->
          <div class="header-logo" style="width:300px; height:80px;">
            <a class="logo" href="#" style="display:block; margin:20px; height:250px;" >
              <img src="{{ asset('images/efirifie_2.png ') }}"  alt="#" style=" width:220px; height:300px; padding-right:20px;" >
            </a>
          </div>
          <!-- /Logo -->

          <!-- Search -->
          <div class="header-search">
            <form>
              <input class="input search-input" type="text" placeholder="Enter your keyword" style="width:200px; padding-left:10px;">
              
              <button class="search-btn"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <!-- /Search -->
        </div>
        <div class="pull-right">
          <ul class="header-btns">
            <!-- Account -->
            <li class="header-account dropdown default-dropdown">
              <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                <div class="header-btns-icon">
                  <i class="fa fa-user"></i>
                </div>
                <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
              </div>
              
              @if(Auth::check())
              <h5 class="text-uppercase">{{ Auth::user()->name }}</h5>
              @else
              <a href="{{ url('login')}}" class="text-uppercase">Login</a> / <a href="{{ url('products/joinus')}}" class="text-uppercase">Join</a>
              @endif
              <ul class="custom-menu">
                <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                <li><a href="#"><i class="fa fa-heart"></i> My Wishlist</a></li>
                <!-- <li><a href="#"><i class="fas fa-exchange"></i> Compare</a></li> -->
                <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                @if(Auth::check())
                  <li><a href="{{ url('/logout') }}"><i class="fa fa-unlock-alt"></i> Logout</a></li>
                @else
                  <li><a href="{{ url('login') }}"><i class="fa fa-unlock-alt"></i> Login</a></li>
                @endif
                <!-- <li><a href=" {{ url('products/createaccount')}}"><i class="fa fa-user-plus"></i> Create An Account</a></li> -->
              </ul>
            </li>
            <!-- /Account -->

            <!-- Cart -->
            <li class="header-cart dropdown default-dropdown">
              <a href="{{route('cartproducts')}}">
                <div class="header-btns-icon">
                  <i class="fa fa-shopping-cart"></i>
                  <span class="qty">0</span>
                </div>
                <strong class="text-uppercase">My Cart:</strong>
                <br>
                <span>Ghs 0.0</span>
              </a>
              <div class="custom-menu">
                <div id="shopping-cart">
                  <div class="shopping-cart-list">
                    <div class="product product-widget">
                      <div class="product-thumb">
                        <img src=" {{ asset('images/thumb-product01.jpg') }}" alt="#">
                      </div>
                      
                    <div class="product product-widget">
                      <div class="product-thumb">
                        <img src="{{ asset ('images/thumb-product01.jpg') }}" alt="">
                      </div>
                      <div class="product-body">
                        <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                        <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                      </div>
                      <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                  <div class="shopping-cart-btns">
                    <button class="main-btn">View Cart</button>
                    <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
                  </div>
                </div>
              </div>
            </li>
            <!-- /Cart -->

            <!-- Mobile nav toggle-->
            <li class="nav-toggle">
              <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
            </li>
            <!-- / Mobile nav toggle -->
          </ul>
        </div>
      </div>
      <!-- header -->
    </div>
    <!-- container -->
  </header>
  <!-- /HEADER -->
  <div id="navigation">
    <!-- container -->
    <div class="container">
      <div id="responsive-nav">
        <!-- category nav -->
        <div class="category-nav">
          <span class="category-header">Categories <i class="fa fa-list"></i></span>
          
        </div>
        <!-- /category nav -->

        <!-- menu nav -->
        <div class="menu-nav">
          <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
          <ul class="menu-list">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women <i class="fa fa-caret-down"></i></a>
              <div class="custom-menu">
                <div class="row">
                  <div class="col-md-4">
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="#">Women’s Clothing</a></li>
                      <li><a href="#">Men’s Clothing</a></li>
                      <li><a href="#">Phones & Accessories</a></li>
                      <li><a href="#">Jewelry & Watches</a></li>
                      <li><a href="#">Bags & Shoes</a></li>
                    </ul>
                    <hr class="hidden-md hidden-lg">
                  </div>
                  <div class="col-md-4">
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="#">Women’s Clothing</a></li>
                      <li><a href="#">Men’s Clothing</a></li>
                      <li><a href="#">Phones & Accessories</a></li>
                      <li><a href="#">Jewelry & Watches</a></li>
                      <li><a href="#">Bags & Shoes</a></li>
                    </ul>
                    <hr class="hidden-md hidden-lg">
                  </div>
                  <div class="col-md-4">
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="#">Women’s Clothing</a></li>
                      <li><a href="#">Men’s Clothing</a></li>
                      <li><a href="#">Phones & Accessories</a></li>
                      <li><a href="#">Jewelry & Watches</a></li>
                      <li><a href="#">Bags & Shoes</a></li>
                    </ul>
                  </div>
                </div>
                <div class="row hidden-sm hidden-xs">
                  <div class="col-md-12">
                    <hr>
                    <a class="banner banner-1" href="#">
                      <img src=" {{ asset ('images/banner05.jpg') }}" alt="#">
                      <div class="banner-caption text-center">
                        <h2 class="white-color">NEW COLLECTION</h2>
                        <h3 class="white-color font-weak">HOT DEAL</h3>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </li>
            <li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Men <i class="fa fa-caret-down"></i></a>
              <div class="custom-menu">
                <div class="row">
                  <div class="col-md-3">
                    <div class="hidden-sm hidden-xs">
                      <a class="banner banner-1" href="#">
                        <img src="{{ asset('images/banner06.jpg' ) }}" alt="#">
                        <div class="banner-caption text-center">
                          <h3 class="white-color text-uppercase">Women’s</h3>
                        </div>
                      </a>
                      <hr>
                    </div>
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="#">Women’s Clothing</a></li>
                      <li><a href="#">Men’s Clothing</a></li>
                      <li><a href="#">Phones & Accessories</a></li>
                      <li><a href="#">Jewelry & Watches</a></li>
                      <li><a href="#">Bags & Shoes</a></li>
                    </ul>
                  </div>
                  <div class="col-md-3">
                    <div class="hidden-sm hidden-xs">
                      <a class="banner banner-1" href="#">
                        <img src=" {{ asset ('images/banner07.jpg') }}" alt="#">
                        <div class="banner-caption text-center">
                          <h3 class="white-color text-uppercase">Men’s</h3>
                        </div>
                      </a>
                    </div>
                    <hr>
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="#">Women’s Clothing</a></li>
                      <li><a href="#">Men’s Clothing</a></li>
                      <li><a href="#">Phones & Accessories</a></li>
                      <li><a href="#">Jewelry & Watches</a></li>
                      <li><a href="#">Bags & Shoes</a></li>
                    </ul>
                  </div>
                  <div class="col-md-3">
                    <div class="hidden-sm hidden-xs">
                      <a class="banner banner-1" href="#">
                        <img src="{{ asset('images/banner08.jpg') }}" alt="#">
                        <div class="banner-caption text-center">
                          <h3 class="white-color text-uppercase">Accessories</h3>
                        </div>
                      </a>
                    </div>
                    <hr>
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="#">Women’s Clothing</a></li>
                      <li><a href="#">Men’s Clothing</a></li>
                      <li><a href="#">Phones & Accessories</a></li>
                      <li><a href="#">Jewelry & Watches</a></li>
                      <li><a href="#">Bags & Shoes</a></li>
                    </ul>
                  </div>
                  <div class="col-md-3">
                    <div class="hidden-sm hidden-xs">
                      <a class="banner banner-1" href="#">
                        <img src=" {{ asset ('images/banner09.jpg' ) }}" alt="#">
                        <div class="banner-caption text-center">
                          <h3 class="white-color text-uppercase">Bags</h3>
                        </div>
                      </a>
                    </div>
                    <hr>
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="#">Women’s Clothing</a></li>
                      <li><a href="#">Men’s Clothing</a></li>
                      <li><a href="#">Phones & Accessories</a></li>
                      <li><a href="#">Jewelry & Watches</a></li>
                      <li><a href="#">Bags & Shoes</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li><a href="#">Sales</a></li>
            <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
              <ul class="custom-menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="products.html">Products</a></li>
                <li><a href="product-page.html">Product Details</a></li>
                <li><a href="checkout.html">Checkout</a></li>
              </ul>
            </li>
             <li><a href="{{ url('products/createaccount')}}">Create a Store</a></li>
          </ul>
        </div>
        <!-- menu nav -->
      </div>
    </div>
    <!-- /container -->
  </div>
  <!-- /NAVIGATION -->

  <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Cart</li>
			</ul>
		</div>
	</div>
      <!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
	<!-- /BREADCRUMB -->
         <div class="col-md-12">

						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
                                
                            @foreach($cartItems->items as $item)

                            <tr>
								<td class="thumb"><img src="{{Storage::disk('local')->url('product_images/'.$item['data']['image'])}}" alt="cart-image" style="width:100px; height:100px;"></td>
									<td class="details">
										<a href="#">{{$item['data']['name']}}</a>
                                        <p>{{$item['data']['description']}} - {{$item['data']['type']}}</p>
                                        <p>id: {{$item['data']['id']}}</p>
		    								<ul>
		     									<li><span>Size: XL</span></li>
											<li><span>Color: Camelot</span></li>
										</ul>
									</td>
										<td class="price text-center"><strong>{{$item['data']['price']}}</strong><br><del class="font-weak"><small>Ghs40.00</small></del></td>
										<td class="qty text-center"><input class="input" type="number" value="{{$item['quantity']}}"></td>
										<td class="total text-center"><strong class="primary-color">{{$item['totalSinglePrice']}}</strong></td>
										<td class="text-right"><button class="main-btn icon-btn"><a href="{{ route('DeletefromCart',['id'=>$item['data']['id']])}}"><i class="fa fa-times"></i></a> </button></td>
									</tr>
                            @endforeach  
									
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total">{{$cartItems->totalPrice}}</th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>QUANTITY</th>
										<td colspan="2">{{$cartItems->totalQuantity}}</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">{{$cartItems->totalPrice}}</th>
									</tr>
								</tfoot>
							</table>
							<div class="pull-right">
								<a href="{{route('checkoutProducts')}}" class="primary-btn">Check Out</a>
							</div>
						</div>

					</div>
                </div>
            </div>
        </div>
@extends ('layouts.footer')
