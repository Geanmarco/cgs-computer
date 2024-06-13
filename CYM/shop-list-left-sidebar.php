<?php
session_start();
require "../dao/ProductoDao.php";
require "../utils/Tools.php";
$conexion = (new Conexion())->getConexion();
$productoDao= new ProductoDao();
$tools = new Tools();
$dataConf = $tools->getConfiguracion();

?><!DOCTYPE html>
<?php include '../fragment/head_general.php'?>
    <!-- SITE TITLE -->
    <title>CGS-COMPUTER</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../public/favi.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="../public/assets/css/animate.css">	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="../public/assets/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<!-- Icon Font CSS -->
<link rel="stylesheet" href="../public/assets/css/all.min.css">
<link rel="stylesheet" href="../public/assets/css/ionicons.min.css">
<link rel="stylesheet" href="../public/assets/css/themify-icons.css">
<link rel="stylesheet" href="../public/assets/css/linearicons.css">
<link rel="stylesheet" href="../public/assets/css/flaticon.css">
<link rel="stylesheet" href="../public/assets/css/simple-line-icons.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="../public/assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="../public/assets/owlcarousel/css/owl.theme.css">
<link rel="stylesheet" href="../public/assets/owlcarousel/css/owl.theme.default.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="../public/assets/css/magnific-popup.css">
<!-- jquery-ui CSS -->
<link rel="stylesheet" href="../public/assets/css/jquery-ui.css">
<!-- Slick CSS -->
<link rel="stylesheet" href="../public/assets/css/slick.css">
<link rel="stylesheet" href="../public/assets/css/slick-theme.css">
<!-- Style CSS -->
<link rel="stylesheet" href="../public/assets/css/style.css">
<link rel="stylesheet" href="../public/assets/css/responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        .float{
            padding-top: 7px;
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:80px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }
    </style>
</head>

<body>

<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- END LOADER -->

<!-- Home Popup Section
<div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-5">
                    	<div class="background_bg h-100" data-img-src="../public/assets/images/popup_img.jpg"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="popup_content">
                            <div class="popup-text">
                                <div class="heading_s4">
                                    <h4>Subscribe and Get 25% Discount!</h4>
                                </div>
                                <p>Subscribe to the newsletter to receive updates about new products.</p>
                            </div>
                            <form method="post">
                            	<div class="form-group">
                                	<input name="email" required type="email" class="form-control rounded-0" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                	<button class="btn btn-fill-line btn-block text-uppercase rounded-0" title="Subscribe" type="submit">Subscribe</button>
                                </div>
                            </form>
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Don't show this popup again!</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div> -->
<!-- End Screen Load Popup Section --> 

<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar">
	<div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="lng_dropdown mr-2">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="../public/assets/images/eng.png" data-title="English">English</option>
                                <option value='fn' data-image="../public/assets/images/fn.png" data-title="France">France</option>
                                <option value='us' data-image="../public/assets/images/us.png" data-title="United States">United States</option>
                            </select>
                        </div>
                        <div class="mr-3">
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div>
                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile"></i><span>994 009 195</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="text-center text-md-right">
                       	<ul class="header_list">
                        	<li><a href="compare.html"><i class="ti-control-shuffle"></i><span>Comparar</span></a></li>
                            <li><a href="wishlist.html"><i class="ti-heart"></i><span>Lista de Compras</span></a></li>
                            <li><a href="login.php"><i class="ti-user"></i><span>Login</span></a></li>
						</ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
    	<div class="container">
            <nav class="navbar navbar-expand-lg"> 
                <a class="navbar-brand" href="index.php">
                    <img class="logo_light" src="../public/assets/images/cym.png" alt="logo" />
                    <img class="logo_dark" src="../public/assets/images/cym.png" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"> 
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Inicio</a>
                            <div class="dropdown-menu">
                                <ul> 
                                    <li><a class="dropdown-item nav-link nav_item" href="index.php">Lanzamientos</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="index-2.html">Productos</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="index-3.html">Ofertas</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="index-4.html">Contactanos</a></li>
                                </ul>
                            </div>   
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Lanzamientos</a>
                            <div class="dropdown-menu">
                                <ul> 
                                    <li><a class="dropdown-item nav-link nav_item" href="about.php">About Us</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="contact.php">Contact Us</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="faq.html">Faq</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="404.php">404 Error Page</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="login.php">Login</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="signup.html">Register</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="term-condition.html">Terms and Conditions</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown dropdown-mega-menu">
                            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Productos</a>
                            <div class="dropdown-menu">
                                <ul class="mega-menu d-lg-flex">
                                    <li class="mega-menu-col col-lg-3">
                                        <ul> 
                                            <li class="dropdown-header">Woman's</li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-list-left-sidebar.php">Vestibulum sed</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Donec porttitor</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Donec vitae facilisis</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-list.html">Curabitur tempus</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Vivamus in tortor</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-3">
                                        <ul>
                                            <li class="dropdown-header">Men's</li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-cart.php">Donec vitae ante ante</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="checkout.php">Etiam ac rutrum</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="wishlist.html">Quisque condimentum</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="compare.html">Curabitur laoreet</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="order-completed.php">Vivamus in tortor</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-3">
                                        <ul>
                                            <li class="dropdown-header">Kid's</li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.php">Donec vitae facilisis</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Quisque condimentum</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Etiam ac rutrum</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec vitae ante ante</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec porttitor</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-3">
                                        <ul>
                                            <li class="dropdown-header">Accessories</li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.php">Donec vitae facilisis</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Quisque condimentum</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Etiam ac rutrum</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec vitae ante ante</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec porttitor</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="d-lg-flex menu_banners">
                                    <div class="col-sm-4">
                                        <div class="header-banner">
                                            <img src="../public/assets/images/menu_banner1.jpg" alt="menu_banner1">
                                            <div class="banne_info">
                                                <h6>10% Off</h6>
                                                <h4>New Arrival</h4>
                                                <a href="#">Shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="header-banner">
                                            <img src="../public/assets/images/menu_banner2.jpg" alt="menu_banner2">
                                            <div class="banne_info">
                                                <h6>15% Off</h6>
                                                <h4>Men's Fashion</h4>
                                                <a href="#">Shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="header-banner">
                                            <img src="../public/assets/images/menu_banner3.jpg" alt="menu_banner3">
                                            <div class="banne_info">
                                                <h6>23% Off</h6>
                                                <h4>Kids Fashion</h4>
                                                <a href="#">Shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Blog</a>
                            <div class="dropdown-menu dropdown-reverse">
                                <ul>
                                    <li>
                                        <a class="dropdown-item menu-link dropdown-toggler" href="#">Grids</a>
                                        <div class="dropdown-menu">
                                            <ul> 
                                                <li><a class="dropdown-item nav-link nav_item" href="blog-three-columns.html">3 columns</a></li>
                                            	<li><a class="dropdown-item nav-link nav_item" href="blog-four-columns.html">4 columns</a></li> 
                                            	<li><a class="dropdown-item nav-link nav_item" href="blog-left-sidebar.html">Left Sidebar</a></li> 
                                            	<li><a class="dropdown-item nav-link nav_item" href="blog-right-sidebar.html">right Sidebar</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="blog-standard-left-sidebar.html">Standard Left Sidebar</a></li> 
                                            	<li><a class="dropdown-item nav-link nav_item" href="blog-standard-right-sidebar.html">Standard right Sidebar</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item menu-link dropdown-toggler" href="#">Masonry</a>
                                        <div class="dropdown-menu">
                                            <ul> 
                                                <li><a class="dropdown-item nav-link nav_item" href="blog-masonry-three-columns.html">3 columns</a></li>
                                           		<li><a class="dropdown-item nav-link nav_item" href="blog-masonry-four-columns.html">4 columns</a></li> 
                                            	<li><a class="dropdown-item nav-link nav_item" href="blog-masonry-left-sidebar.html">Left Sidebar</a></li> 
                                            	<li><a class="dropdown-item nav-link nav_item" href="blog-masonry-right-sidebar.html">right Sidebar</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item menu-link dropdown-toggler" href="#">Single Post</a>
                                        <div class="dropdown-menu">
                                            <ul> 
                                                <li><a class="dropdown-item nav-link nav_item" href="blog-single.html">Default</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="blog-single-left-sidebar.html">left sidebar</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="blog-single-slider.html">slider post</a></li> 
                                                <li><a class="dropdown-item nav-link nav_item" href="blog-single-video.html">video post</a></li> 
                                                <li><a class="dropdown-item nav-link nav_item" href="blog-single-audio.html">audio post</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item menu-link dropdown-toggler" href="#">List</a>
                                        <div class="dropdown-menu">
                                            <ul> 
                                                <li><a class="dropdown-item nav-link nav_item" href="blog-list-left-sidebar.html">left sidebar</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="blog-list-right-sidebar.html">right sidebar</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown dropdown-mega-menu">
                            <a class="dropdown-toggle nav-link active" href="#" data-toggle="dropdown">Shop</a>
                            <div class="dropdown-menu">
                                <ul class="mega-menu d-lg-flex">
                                    <li class="mega-menu-col col-lg-9">
                                        <ul class="d-lg-flex">
                                            <li class="mega-menu-col col-lg-4">
                                                <ul> 
                                                    <li class="dropdown-header">Shop Page Layout</li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-list.html">shop List view</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item active" href="shop-list-left-sidebar.php">shop List Left Sidebar</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-list-right-sidebar.html">shop List Right Sidebar</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Left Sidebar</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Right Sidebar</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Shop Load More</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-4">
                                                <ul>
                                                    <li class="dropdown-header">Other Pages</li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-cart.php">Cart</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="checkout.php">Checkout</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="my-account.php">My Account</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="wishlist.html">Wishlist</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="compare.html">compare</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="order-completed.php">Order Completed</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-4">
                                                <ul>
                                                    <li class="dropdown-header">Product Pages</li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.php">Default</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Left Sidebar</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Right Sidebar</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Thumbnails Left</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-3">
                                        <div class="header_banner">
                                            <div class="header_banner_content">
                                                <div class="shop_banner">
                                                    <div class="banner_img overlay_bg_40">
                                                        <img src="../public/assets/images/shop_banner.jpg" alt="shop_banner"/>
                                                    </div> 
                                                    <div class="shop_bn_content">
                                                        <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                                        <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                                        <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="nav-link nav_item" href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form>
                                <input type="text" placeholder="Search" class="form-control" id="search_input">
                                <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div><div class="search_overlay"></div>
                    </li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">2</span></a>
                        <div class="cart_box dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="../public/assets/images/cart_thamb1.jpg" alt="cart_thumb1">Variable product 001</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                                </li>
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="../public/assets/images/cart_thamb2.jpg" alt="cart_thumb2">Ornare sed consequat</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                                </li>
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p>
                                <p class="cart_buttons"><a href="#" class="btn btn-fill-line view-cart">View Cart</a><a href="#" class="btn btn-fill-out checkout">Checkout</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>CASE SILVER VOLT</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Pagina</a></li>
                    <li class="breadcrumb-item active">Case Silver Volt</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
    	<div class="row">
			<div class="col-lg-9" id="content_principal">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="order">Ordenar Por</option>
                                        <option value="3 cooler">3 Cooler</option>
                                        <option value="4 cooler">4 Cooler Fuente</option>
                                        <option value="6 cooler">6 Cooler</option>
                                        <option value="Fuente de Poder">Incluye Fuente de Poder</option>
                                    </select>
                                </div>
                            </div>
                            <div class="product_header_right">
                            	<div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                                </div>
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="">Showing</option>
                                        <option value="9">9</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row shop_container list">
                    <div class="col-md-4 col-6">
                        <div class="product">
                            <div class="product_img">
                                <a href="shop-product-detail.php">
                                    <img src="../public/assets/images/Exclusivos/case2.jpg" alt="product_img1">
                                </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        <li><a href="shop-compare.php" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                        <li><a href="shop-quick-view.php" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="shop-product-detail.php">CASE ATX SILVER VOLT HYDRA 192-15</a></h6>
                                <div class="product_price">
                                    <span class="price">$68.00</span>
                                    <del>$88.00</del>
                                    <div class="on_sale">
                                        <span>Ahorra $20.00</span>
                                    </div>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                                <div class="pr_desc">
                                    <p>* 1 Vidrio Templado</p>
									<p>* Incluye 6 COOLER ARGB</p>
									<p>* USB 3.0</p>
                                </div>
                                <div class="pr_switch_wrap">
                                    <div class="product_color_switch">
                                        <span class="active" data-color="#87554B"></span>
                                        <span data-color="#333333"></span>
                                        <span data-color="#DA323F"></span>
                                    </div>
                                </div>
                                <div class="list_product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        <li><a href="shop-compare.php" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                        <li><a href="shop-quick-view.php" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 col-6">
                         <div class="product">
                             <div class="product_img">
                                 <a href="shop-product-detail.html">
                                     <img src="../public/assets/images/Exclusivos/case3.jpg" alt="product_img2">
                                 </a>
                                 <div class="product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product_info">
                                 <h6 class="product_title"><a href="shop-product-detail.html">CASE ATX SILVER VOLT DEMON 200-2</a></h6>
                                 <div class="product_price">
                                     <span class="price">$68.00</span>
                                     <del>$78.00</del>
                                     <div class="on_sale">
                                         <span>Ahorra $10.00</span>
                                     </div>
                                 </div>
                                 <div class="rating_wrap">
                                     <div class="rating">
                                         <div class="product_rate" style="width:68%"></div>
                                     </div>
                                     <span class="rating_num">(15)</span>
                                 </div>
                                 <div class="pr_desc">
                                     <p>* 1 Vidrio Templado</p>
                                     <p>* Incluye 6 COOLER ARGB</p>
                                     <p>* USB 3.0</p>
                                 </div>
                                 <div class="pr_switch_wrap">
                                     <div class="product_color_switch">
                                         <span class="active" data-color="#847764"></span>
                                         <span data-color="#0393B5"></span>
                                         <span data-color="#DA323F"></span>
                                     </div>
                                 </div>
                                 <div class="list_product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4 col-6">
                         <div class="product">
                             <span class="pr_flash">New</span>
                             <div class="product_img">
                                 <a href="shop-product-detail.html">
                                     <img src="../public/assets/images/Exclusivos/case4.jpg" alt="product_img3">
                                 </a>
                                 <div class="product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product_info">
                                 <h6 class="product_title"><a href="shop-product-detail.html">CASE ATX SILVER VOLT PW-93</a></h6>
                                 <div class="product_price">
                                     <span class="price">$87.00</span>
                                     <del>$100.00</del>
                                 </div>
                                 <div class="rating_wrap">
                                     <div class="rating">
                                         <div class="product_rate" style="width:87%"></div>
                                     </div>
                                     <span class="rating_num">(25)</span>
                                 </div>
                                 <div class="pr_desc">
                                     <p>* Incluye Fuente 600w 80 Plus BRONZE</p>
                                     <p>* 1 Vidrio Templado</p>
                                     <p>* Incluye 3 COOLER ARGB / USB 3.0</p>
                                 </div>
                                 <div class="pr_switch_wrap">
                                     <div class="product_color_switch">
                                         <span class="active" data-color="#333333"></span>
                                         <span data-color="#7C502F"></span>
                                         <span data-color="#2F366C"></span>
                                         <span data-color="#874A3D"></span>
                                     </div>
                                 </div>
                                 <div class="list_product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4 col-6">
                         <div class="product">
                             <div class="product_img">
                                 <a href="shop-product-detail.html">
                                     <img src="../public/assets/images/Exclusivos/case5.jpg" alt="product_img4">
                                 </a>
                                 <div class="product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product_info">
                                 <h6 class="product_title"><a href="shop-product-detail.html">CASE ATX SILVER VOLT PW-93</a></h6>
                                 <div class="product_price">
                                     <span class="price">$50.00</span>
                                     <del>$75.00</del>
                                     <div class="on_sale">
                                         <span>Ahorra $25.00</span>
                                     </div>
                                 </div>
                                 <div class="rating_wrap">
                                     <div class="rating">
                                         <div class="product_rate" style="width:70%"></div>
                                     </div>
                                     <span class="rating_num">(22)</span>
                                 </div>
                                 <div class="pr_desc">
                                     <p>* 1 Vidrio Templado</p>
                                     <p>* Incluye 3 COOLER ARGB</p>
                                     <p>* USB 3.0</p>
                                 </div>
                                 <div class="pr_switch_wrap">
                                     <div class="product_color_switch">
                                         <span class="active" data-color="#333333"></span>
                                         <span data-color="#A92534"></span>
                                         <span data-color="#B9C2DF"></span>
                                     </div>
                                 </div>
                                 <div class="list_product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4 col-6">
                         <div class="product">
                             <div class="product_img">
                                 <a href="shop-product-detail.html">
                                     <img src="../public/assets/images/Exclusivos/case6.jpg" alt="product_img5">
                                 </a>
                                 <div class="product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product_info">
                                 <h6 class="product_title"><a href="shop-product-detail.html">CASE ATX SILVER VOLT ZH-88</a></h6>
                                 <div class="product_price">
                                     <span class="price">$99.00</span>
                                     <del>$109.00</del>
                                     <div class="on_sale">
                                         <span>Ahorra $10.00</span>
                                     </div>
                                 </div>
                                 <div class="rating_wrap">
                                     <div class="rating">
                                         <div class="product_rate" style="width:80%"></div>
                                     </div>
                                     <span class="rating_num">(21)</span>
                                 </div>
                                 <div class="pr_desc">
                                     <p>* 1 Vidrio Templado</p>
                                     <p>* Incluye 6 COOLER ARGB</p>
                                     <p>* Soporte Para Tarjeta Grafica / USB 3.0</p>
                                 </div>
                                 <div class="pr_switch_wrap">
                                     <div class="product_color_switch">
                                         <span class="active" data-color="#87554B"></span>
                                         <span data-color="#333333"></span>
                                         <span data-color="#5FB7D4"></span>
                                     </div>
                                 </div>
                                 <div class="list_product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4 col-6">
                         <div class="product">
                             <span class="pr_flash bg-danger">Hot</span>
                             <div class="product_img">
                                 <a href="shop-product-detail.html">
                                     <img src="../public/assets/images/Exclusivos/case7.jpg" alt="product_img6">
                                 </a>
                                 <div class="product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product_info">
                                 <h6 class="product_title"><a href="shop-product-detail.html">CASE ATX SILVER VOLT VX-82 </a></h6>
                                 <div class="product_price">
                                     <span class="price">$75.00</span>
                                     <del>$85.00</del>
                                     <div class="on_sale">
                                         <span>Ahorra $10.00</span>
                                     </div>
                                 </div>
                                 <div class="rating_wrap">
                                     <div class="rating">
                                         <div class="product_rate" style="width:68%"></div>
                                     </div>
                                     <span class="rating_num">(15)</span>
                                 </div>
                                 <div class="pr_desc">
                                    <p>* Incluye Fuente 600w 80 Plus BRONZE</p>
                                     <p>* 1 Vidrio Templado</p>
                                     <p>* Incluye 3 COOLER ARGB / USB 3.0</p>
                                 </div>
                                 <div class="pr_switch_wrap">
                                     <div class="product_color_switch">
                                         <span class="active" data-color="#87554B"></span>
                                         <span data-color="#333333"></span>
                                     </div>
                                 </div>
                                 <div class="list_product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4 col-6">
                         <div class="product">
                             <span class="pr_flash bg-success">Sale</span>
                             <div class="product_img">
                                 <a href="shop-product-detail.html">
                                     <img src="../public/assets/images/product_img7.jpg" alt="product_img7">
                                 </a>
                                 <div class="product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product_info">
                                 <h6 class="product_title"><a href="shop-product-detail.html">white black line dress</a></h6>
                                 <div class="product_price">
                                     <span class="price">$68.00</span>
                                     <del>$99.00</del>
                                     <div class="on_sale">
                                         <span>20% Off</span>
                                     </div>
                                 </div>
                                 <div class="rating_wrap">
                                     <div class="rating">
                                         <div class="product_rate" style="width:87%"></div>
                                     </div>
                                     <span class="rating_num">(25)</span>
                                 </div>
                                 <div class="pr_desc">
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                 </div>
                                 <div class="pr_switch_wrap">
                                     <div class="product_color_switch">
                                         <span class="active" data-color="#333333"></span>
                                         <span data-color="#7C502F"></span>
                                         <span data-color="#2F366C"></span>
                                     </div>
                                 </div>
                                 <div class="list_product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4 col-6">
                         <div class="product">
                             <div class="product_img">
                                 <a href="shop-product-detail.html">
                                     <img src="../public/assets/images/product_img8.jpg" alt="product_img8">
                                 </a>
                                 <div class="product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product_info">
                                 <h6 class="product_title"><a href="shop-product-detail.html">Men blue jins Shirt</a></h6>
                                 <div class="product_price">
                                     <span class="price">$69.00</span>
                                     <del>$89.00</del>
                                     <div class="on_sale">
                                         <span>20% Off</span>
                                     </div>
                                 </div>
                                 <div class="rating_wrap">
                                     <div class="rating">
                                         <div class="product_rate" style="width:70%"></div>
                                     </div>
                                     <span class="rating_num">(22)</span>
                                 </div>
                                 <div class="pr_desc">
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                 </div>
                                 <div class="pr_switch_wrap">
                                     <div class="product_color_switch">
                                         <span class="active" data-color="#333333"></span>
                                         <span data-color="#444653"></span>
                                         <span data-color="#B9C2DF"></span>
                                     </div>
                                 </div>
                                 <div class="list_product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4 col-6">
                         <div class="product">
                             <div class="product_img">
                                 <a href="shop-product-detail.html">
                                     <img src="../public/assets/images/product_img9.jpg" alt="product_img9">
                                 </a>
                                 <div class="product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product_info">
                                 <h6 class="product_title"><a href="shop-product-detail.html">T-Shirt Form Girls</a></h6>
                                 <div class="product_price">
                                     <span class="price">$45.00</span>
                                     <del>$55.25</del>
                                     <div class="on_sale">
                                         <span>35% Off</span>
                                     </div>
                                 </div>
                                 <div class="rating_wrap">
                                     <div class="rating">
                                         <div class="product_rate" style="width:80%"></div>
                                     </div>
                                     <span class="rating_num">(21)</span>
                                 </div>
                                 <div class="pr_desc">
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                 </div>
                                 <div class="pr_switch_wrap">
                                     <div class="product_color_switch">
                                         <span class="active" data-color="#B5B6BB"></span>
                                         <span data-color="#333333"></span>
                                         <span data-color="#DA323F"></span>
                                     </div>
                                 </div>
                                 <div class="list_product_action_box">
                                     <ul class="list_none pr_action_btn">
                                         <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                         <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                         <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                         <li><a href="#"><i class="icon-heart"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     -->
                </div>
        		<div class="row">
                    <div class="col-12">
                        <ul class="pagination mt-3 justify-content-center pagination_style1">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
        	</div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
            	<div class="sidebar">
                	<div class="widget">
                        <h5 class="widget_title">Categories</h5>
                        <ul class="widget_categories">
                            <li><a href="#"><span class="categories_name">Women</span><span class="categories_num">(9)</span></a></li>
                            <li><a href="#"><span class="categories_name">Top</span><span class="categories_num">(6)</span></a></li>
                            <li><a href="#"><span class="categories_name">T-Shirts</span><span class="categories_num">(4)</span></a></li>
                            <li><a href="#"><span class="categories_name">Men</span><span class="categories_num">(7)</span></a></li>
                            <li><a href="#"><span class="categories_name">Shoes</span><span class="categories_num">(12)</span></a></li>
                        </ul>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">Filter</h5>
                        <div class="filter_price">
                             <div id="price_filter" data-min="0" data-max="500" data-min-value="50" data-max-value="300" data-price-sign="$"></div>
                             <div class="price_range">
                                 <span>Price: <span id="flt_price"></span></span>
                                 <input type="hidden" id="price_first">
                                 <input type="hidden" id="price_second">
                             </div>
                         </div>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">Brand</h5>	
                        <ul class="list_brand">
                            <li>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="Arrivals" value="">
                                    <label class="form-check-label" for="Arrivals"><span>New Arrivals</span></label>
                                </div>
                            </li>
                            <li>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="Lighting" value="">
                                    <label class="form-check-label" for="Lighting"><span>Lighting</span></label>
                                </div>
                            </li>
                            <li>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="Tables" value="">
                                    <label class="form-check-label" for="Tables"><span>Tables</span></label>
                                </div>
                            </li>
                            <li>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="Chairs" value="">
                                    <label class="form-check-label" for="Chairs"><span>Chairs</span></label>
                                </div>
                            </li>
                            <li>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="Accessories" value="">
                                    <label class="form-check-label" for="Accessories"><span>Accessories</span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">Size</h5>
                        <div class="product_size_switch">
                            <span>xs</span>
                            <span>s</span>
                            <span>m</span>
                            <span>l</span>
                            <span>xl</span>
                            <span>2xl</span>
                            <span>3xl</span>
                        </div>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">Color</h5>
                        <div class="product_color_switch">
                            <span data-color="#87554B"></span>
                            <span data-color="#333333"></span>
                            <span data-color="#DA323F"></span>
                            <span data-color="#2F366C"></span>
                            <span data-color="#B5B6BB"></span>
                            <span data-color="#B9C2DF"></span>
                            <span data-color="#5FB7D4"></span>
                            <span data-color="#2F366C"></span>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="shop_banner">
                            <div class="banner_img overlay_bg_20">
                                <img src="../public/assets/images/sidebar_banner_img.jpg" alt="sidebar_banner_img">
                            </div> 
                            <div class="shop_bn_content2 text_white">
                                <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
	<div class="container">	
    	<div class="row align-items-center">	
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Subscribe Our Newsletter</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<footer class="footer_dark">
	<div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                	<div class="widget">
                        <div class="footer_logo">
                            <a href="#"><img src="../public/assets/images/logo_light.png" alt="logo"/></a>
                        </div>
                        <p>If you are going to use of Lorem Ipsum need to be sure there isn't hidden of text</p>
                    </div>
                    <div class="widget">
                        <ul class="social_icons social_white">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
        		</div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Useful Links</h6>
                        <ul class="widget_links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Location</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Category</h6>
                        <ul class="widget_links">
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Woman</a></li>
                            <li><a href="#">Kids</a></li>
                            <li><a href="#">Best Saller</a></li>
                            <li><a href="#">New Arrivals</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">My Account</h6>
                        <ul class="widget_links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Discount</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Orders History</a></li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Contact Info</h6>
                        <ul class="contact_info contact_info_light">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>123 Street, Old Trafford, New South London , UK</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:info@sitename.com">info@sitename.com</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>+ 457 789 789 65</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0 text-center text-md-left">© 2020 All Rights Reserved by Bestwebcreator</p>
                </div>
                <div class="col-md-6">
                    <ul class="footer_payment text-center text-lg-right">
                        <li><a href="#"><img src="../public/assets/images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="../public/assets/images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="../public/assets/images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="../public/assets/images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="../public/assets/images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<script src="../public/assets/js/jquery-1.12.4.min.js"></script> 
<!-- jquery-ui --> 
<script src="../public/assets/js/jquery-ui.js"></script>
<!-- popper min js -->
<script src="../public/assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="../public/assets/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="../public/assets/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="../public/assets/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="../public/assets/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="../public/assets/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="../public/assets/js/jquery.countdown.min.js"></script> 
<!-- imagesloaded js --> 
<script src="../public/assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="../public/assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="../public/assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="../public/assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="../public/assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js --> 
<script src="../public/assets/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="../public/js/tools.js"></script>

</body>

<script>
    var $container22;
    const APP_PROD = new Vue({
        el:"#content_principal",
        data:{
            listaHoja:[],
            cntPorHoja:0,
            cntItemPorHoja:9,
            cntHojas:0,
            hojaActual:1,
            cantidadProd:0,
            lasrId:0

        },
        methods:{
            formatNumerPrecio(num){
                return parseFloat(num+"").toFixed(2)
            },
            getPreparePagination(){
                this.cntHojas = Math.ceil(this.cantidadProd/this.cntItemPorHoja);
                this.getDataProdListaPag();
            },
            setNumHoja(num){
                this.hojaActual=num;
                if (this.hojaActual==1){
                    this.lasrId=0;
                }else{
                    this.lasrId = this.listaHoja[this.listaHoja.length-1].prod_id
                }

                this.getDataProdListaPag();
            },
            setSwithHoja(num){
                console.log(num);
                if ( this.hojaActual+num > 0&& this.hojaActual+num <= this.cntHojas){
                    this.hojaActual+=num;
                    if (this.hojaActual==1){
                        this.lasrId=0;
                    }else{
                        this.lasrId = this.listaHoja[this.listaHoja.length-1].prod_id
                    }
                    this.getDataProdListaPag();
                }

            },
            getDataProdListaPag(){
                const cnt = this.cntItemPorHoja;
                const min = this.lasrId;
                $.ajax({
                    type: "POST",
                    url: "../ajax/ajs_productos.php",
                    data: {tipo:'pag',cnt,min},
                    success: function (resq) {
                        console.log(resq);
                        resq= JSON.parse(resq);
                        APP_PROD._data.listaHoja= resq
                        console.log(resq);
                    }
                });

            },

            getDataCountProd(){
                $.ajax({
                    type: "POST",
                    url: "../ajax/ajs_productos.php",
                    data: {tipo:'count_prod'},
                    success: function (resp) {
                        if (isJson(resp)){
                            resp=JSON.parse(resp);
                            if (resp.res){
                                APP_PROD._data.cantidadProd = parseInt(resp.cnt);
                                APP_PROD.getPreparePagination();
                            }else {

                            }
                        }else{

                        }
                        console.log(resp)
                    }
                });

            }
        },
        computed:{
            getPagNum(){
                var numero =[];
                for (var i =1 ; i<= this.cntHojas;i++){
                    numero.push(i);
                }
                console.log(numero)
                return numero;
            }
        }
    });

    $( document ).ready(function() {
       // APP_PROD.getDataCountProd()
        /*setTimeout(function () {
            $('.shorting_icon').on('click',function() {
                if ($(this).hasClass('grid')) {
                    $('.shop_container').removeClass('list').addClass('grid');
                    $(this).addClass('active').siblings().removeClass('active');
                }
                else if($(this).hasClass('list')) {
                    $('.shop_container').removeClass('grid').addClass('list');
                    $(this).addClass('active').siblings().removeClass('active');
                }
                $(".shop_container").append('<div class="loading_pr"><div class="mfp-preloader"></div></div>');
                setTimeout(function(){
                    $('.loading_pr').remove();
                    $container.isotope('layout');
                }, 800);
            });
        })*/
    });
</script>
</html>
