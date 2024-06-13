<?php
session_start();


require "../utils/Tools.php";
require "../dao/NuevoImgresoDao.php";
require "../dao/GrupoCategoriaDao.php";
require "../dao/ProductoDao.php";

$isSesionUser = isset($_SESSION['usuario']);
$perfilUser = '';

if ($isSesionUser) {
    $perfilUser = $_SESSION['perfil'];
}

$grupoCategoriaDao = new GrupoCategoriaDao();
$nuevoImgresoDao = new NuevoImgresoDao();
$productoDao = new ProductoDao();
$tools = new Tools();
$conexion = (new Conexion())->getConexion();


$listaGrupos = $grupoCategoriaDao->getListaCate();
//$listaNue = $nuevoImgresoDao->getLista();

$listaNue = $productoDao->getLastRegister(7);
$listaNue2 = $productoDao->getLastRegisterSilver(7);
$listaRamMasVen = $productoDao->getRandonRegister(7);
$listaRamTenden = $productoDao->getRandonRegister(10);
$listaRamByCat = $productoDao->getDataRandonE();
$listaRamNovedades = $productoDao->getDataRandonNovedad();

$listaOfertas = $productoDao->getDataofertas();

//print_r($listaOfertas);

$dataConf = $tools->getConfiguracion();
//print_r($listaRamByCat);
$listaMarcas = $conexion->query("SELECT * FROM marcra_productos");

$ban1_nombre = '';
$ban1_url = $dataConf['banner1']['image'];
$ban1_ide = 'javascript:void(0)';

//echo strlen($dataConf['banner1']['prod']);
if (strlen($dataConf['banner1']['prod']) > 0) {
    $productoDao->setProdId($dataConf['banner1']['prod']);
    $respPROB1 = $productoDao->getData2();
    //print_r($respPROB1);
    $ban1_nombre = $respPROB1['nombre'];
    $ban1_ide = "CYM-product-detail.php?prod=" . $dataConf['banner1']['prod'];
}

$ban2_nombre = '';
$ban2_url = $dataConf['banner2']['image'];
$ban2_ide = 'javascript:void(0)';

if (strlen($dataConf['banner2']['prod']) > 0) {
    $productoDao->setProdId($dataConf['banner2']['prod']);
    $respPROB2 = $productoDao->getData2();
    //print_r($respPROB1);
    $ban2_nombre = $respPROB2['nombre'];
    $ban2_ide = "CYM-product-detail.php?prod=" . $dataConf['banner2']['prod'];
}

$banerCimg1 = $dataConf['banercentarl1']['image'];
$banerCprod1 = 'javascript:void(0)';
if (strlen($dataConf['banercentarl1']['prod']) > 0) {

    $banerCprod1 = "CYM-product-detail.php?prod=" . $dataConf['banercentarl1']['prod'];
}

$banerCimg2 = $dataConf['banercentarl2']['image'];
$banerCprod2 = 'javascript:void(0)';
if (strlen($dataConf['banercentarl2']['prod']) > 0) {
    $banerCprod2 = "CYM-product-detail.php?prod=" . $dataConf['banercentarl2']['prod'];
}

$banerCimg3 = $dataConf['banercentarl3']['image'];
$banerCprod3 = 'javascript:void(0)';
if (strlen($dataConf['banercentarl3']['prod']) > 0) {
    $banerCprod3 = "CYM-product-detail.php?prod=" . $dataConf['banercentarl3']['prod'];
}


?>
<!DOCTYPE html>
<?php include '../fragment/head_general.php' ?>
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
<!-- Slick CSS -->
<link rel="stylesheet" href="../public/assets/css/slick.css">
<link rel="stylesheet" href="../public/assets/css/slick-theme.css">
<!-- Style CSS -->
<link rel="stylesheet" href="../public/assets/css/style.css">
<link rel="stylesheet" href="../public/assets/css/responsive.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style>
    .float {
        padding-top: 7px;
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 80px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
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
                    <div class="col-sm-7">
                        <div class="popup_content text-left">
                            <div class="popup-text">
                                <div class="heading_s1">
                                    <h3>Dejanos tu Correo Electrónico para enviarte nuestras Ofertas!</h3>
                                </div>
                                <p>Suscribete para mayor Información.</p>
                            </div>
                            <form method="post">
                            	<div class="form-group">
                                	<input name="email" required type="email" class="form-control" placeholder="Ingresa tu Email">
                                </div>
                                <div class="form-group">
                                	<button class="btn btn-fill-out btn-block text-uppercase" title="Subscribe" type="submit">Suscribete</button>
                                </div>
                            </form>
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>No mostrar nuevamente este aviso!</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                    	<div class="background_bg h-100" data-img-src="../public/images/silla.jpg"></div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div> -->
    <!-- End Screen Load Popup Section -->

    <!-- START HEADER -->
    <header class="header_wrap">

        <?php //include "../fragment/head_index.php"
        ?>

        <?php include "../fragment/nav_bar_index.php" ?>
        <div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                        <div class="categories_wrap">
                            <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn">
                                <i class="linearicons-menu"></i><span>NUESTROS PRODUCTOS GAMING</span>
                            </button>
                            <div id="navCatContent" class="nav_cat navbar collapse">
                                <ul>

                                    <?php



                                    $contador = 0;
                                    $rowHTMLLISTECAt = "";
                                    foreach ($listaGrupos as $catRow) {

                                        if ($contador < 11) {
                                            if ($catRow['estado'] == 2) {

                                                if (true) {

                                                    $resSUb = $grupoCategoriaDao->getSubCat($catRow['id_seleccion']);

                                                    $listaProdRR = $productoDao->getListDataPR($catRow['codi_categoria'], 6); ?>
                                                    <li class="dropdown dropdown-mega-menu">
                                                        <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><img style="max-width: 28px;" src="../public/iconos/<?= $catRow['icono'] ?>">
                                                            <span><?= $catRow['nombre'] ?></span></a>
                                                        <div class="dropdown-menu">
                                                            <ul class="mega-menu d-lg-flex">
                                                                <li class="mega-menu-col col-lg-7">
                                                                    <ul class="d-lg-flex">
                                                                        <li class="mega-menu-col col-lg-4">
                                                                            <ul>

                                                                                <?php
                                                                                foreach ($resSUb as $rowMar) { ?>
                                                                                    <li class=""> <strong><a class="dropdown-header" href="shop-list-ctg.php?ctg=<?= $catRow['codi_categoria'] ?>&sub=<?= $rowMar['sub_id'] ?>"><?= $rowMar['nombre'] ?></a></strong>
                                                                                    </li>
                                                                                <?php }
                                                                                ?>

                                                                            </ul>
                                                                        </li>
                                                                        <li class="mega-menu-col col-lg-7">
                                                                            <ul>
                                                                                <li class="dropdown-header">Productos</li>
                                                                                <?php
                                                                                foreach ($listaProdRR as $rowPrC) { ?>
                                                                                    <li><a style="overflow: hidden;text-overflow: ellipsis; white-space:nowrap;" class="dropdown-item nav-link nav_item" href="shop-product-detail.php?prod=<?= $rowPrC['prod_id'] ?>"><?= $rowPrC['nombre'] ?></a></li>
                                                                                <?php }
                                                                                ?>

                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="mega-menu-col col-lg-5">
                                                                    <div class="header-banner2">
                                                                        <a href="javascript:void(0)"><img src="../public/img/banner/<?= $catRow['imagen'] ?>" alt="menu_banner"></a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>

                                                <?php  } else {
                                                    $resSUb = $grupoCategoriaDao->getSubCat($catRow['id_seleccion']);

                                                ?>
                                                    <li class="dropdown dropdown-mega-menu">
                                                        <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><img style="max-width: 28px;" src="../public/iconos/<?= $catRow['icono'] ?>">
                                                            <span><?= $catRow['nombre'] ?></span></a>
                                                        <div class="dropdown-menu">
                                                            <ul class="mega-menu d-lg-flex">
                                                                <li class="mega-menu-col col-lg-7">
                                                                    <ul class="d-lg-flex">
                                                                        <li class="mega-menu-col col-lg-4">
                                                                            <ul>
                                                                                <li class="dropdown-header"></li>
                                                                                <?php
                                                                                foreach ($resSUb as $rowMar) { ?>
                                                                                    <li class=""> <strong><a class="dropdown-header" href="shop-list-ctg.php?ctg=<?= $catRow['codi_categoria'] ?>&sub=<?= $rowMar['nombre'] ?>"><?= $rowMar['nombre'] ?></a></strong>
                                                                                    </li>
                                                                                <?php }
                                                                                ?>

                                                                            </ul>
                                                                        </li>
                                                                        <li class="mega-menu-col col-lg-7">
                                                                            <ul>
                                                                                <li class="dropdown-header">MARCAS</li>
                                                                                <?php
                                                                                foreach ($catRow['marcas'] as $rowMar) { ?>
                                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-list-mrc.php?mrc=<?= $rowMar['marca'] ?>&grp=<?= $catRow['codi_categoria'] ?>"><?= $rowMar['nombre'] ?></a>
                                                                                    </li>
                                                                                <?php }
                                                                                ?>

                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="mega-menu-col col-lg-5">
                                                                    <div class="header-banner2">
                                                                        <a href="javascript:void(0)"><img src="../public/img/banner/<?= $catRow['imagen'] ?>" alt="menu_banner"></a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                <?php     }
                                                ?>

                                    <?php
                                            } else {
                                                echo '<li><a class="dropdown-item nav-link nav_item" href="CYM-list-ctg.php?ctg=' . $catRow['codi_categoria'] . '"><img style="max-width: 28px;" src="../public/iconos/' . $catRow['icono'] . '"> <span>' . $catRow['nombre'] . '</span></a></li>';
                                            }
                                        } else {


                                            $rowHTMLLISTECAt = $rowHTMLLISTECAt . '<li><a class="dropdown-item nav-link nav_item" href="CYM-list-ctg.php?ctg=' . $catRow['codi_categoria'] . '"><img style="max-width: 28px;" src="../public/iconos/' . $catRow['icono'] . '"> <span>' . $catRow['nombre'] . '</span></a></li>';
                                        }
                                        $contador++;
                                    }
                                    ?>
                                    <li>
                                        <ul class="more_slide_open">
                                            <?= $rowHTMLLISTECAt ?>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="more_categories">Más categorías</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false">
                                <span class="ion-android-menu"></span>
                            </button>
                            <div class="pr_search_icon">
                                <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                            </div>
                            <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                                <ul class="navbar-nav">

                                    <li class="dropdown dropdown-mega-menu">
                                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">MARCAS</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">

                                                <?php
                                                $listaMar = [];
                                                $contadorMAc = 0;
                                                $listaTemp = [];
                                                foreach ($listaMarcas as $marc) {
                                                    $listaTemp[] = $marc;
                                                    if ($contadorMAc < 7) {
                                                        $listaMar[] = $listaTemp;
                                                        $listaTemp = [];
                                                        $contadorMAc = 0;
                                                    }
                                                    $contadorMAc++;
                                                }
                                                if (count($listaTemp) > 0) {
                                                    $listaMar[] = $listaTemp;
                                                    $listaTemp = [];
                                                }

                                                foreach ($listaMar as $itemMarc) {
                                                    echo '<li class="mega-menu-col col-lg-3">
                                                        <ul>';
                                                    foreach ($itemMarc as $tempMarcc) {

                                                        echo '<li><a class="dropdown-item nav-link nav_item"
                                                                   href="CYM-list-prod-mac.php?marc=' . $tempMarcc['cod_marca'] . '">' . $tempMarcc['nombre_marca'] . '</a></li>';
                                                    }
                                                    echo '</ul>
                                                    </li>';
                                                } ?>
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="dropdown">
                                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">OFERTAS</a>
                                        <div class="dropdown-menu">
                                            <ul>
                                                <li><a class="dropdown-item nav-link nav_item" href="./shop-list-ctg.php?ctg=010">Monitores</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="./shop-list-ctg.php?ctg=005">Tarjetas de Video</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="./shop-list-ctg.php?ctg=001">Procesadores</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="./shop-list-ctg.php?ctg=002">Placa Madre</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="./shop-list-ctg.php?ctg=012-014">Mouse</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="./shop-list-ctg.php?ctg=012-014">Teclado</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="./shop-list-ctg.php?ctg=030">Auriculares</a></li>

                                                <?php
                                                /* foreach ($listaOfertas as $rowBC){
                                                echo '<li><a style="max-width: 350px;overflow: hidden;text-overflow: ellipsis;" class="dropdown-item nav-link nav_item" href="CYM-product-detail.php?prod='.$rowBC['prod_id'].'">'.$rowBC['nombre'].'</a></li>';
                                            }*/
                                                ?>

                                            </ul>
                                        </div>
                                    </li>



                                    <li class="dropdown dropdown-mega-menu">
                                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">NOVEDADES</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">

                                                <?php
                                                foreach ($listaRamNovedades as $prodCatNv) {

                                                ?>
                                                    <li class="mega-menu-col col-lg-3">
                                                        <ul>
                                                            <li class="dropdown-header"><?= $prodCatNv['nombre'] ?></li>
                                                            <?php
                                                            foreach ($prodCatNv['productos'] as $itemProbn) {
                                                                echo '<li><a style="overflow: hidden;text-overflow: ellipsis;" class="dropdown-item nav-link nav_item" href="CYM-product-detail.php?prod=' . $itemProbn['prod_id'] . '">' . $itemProbn['nombre'] . '</a></li>';
                                                            }
                                                            ?>
                                                        </ul>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                            <div class="d-lg-flex menu_banners">
                                                <div class="col-lg-6">
                                                    <div class="header-banner">
                                                        <div class="sale-banner">
                                                            <a class="hover_effect1" href="./shop-list-ctg.php?ctg=005">
                                                                <img src="../public/images/Exclusivos/ban1.jpg" alt="shop_banner_img7">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="header-banner">
                                                        <div class="sale-banner">
                                                            <a class="hover_effect1" href="./shop-list-ctg.php?ctg=002">
                                                                <img src="../public/images/Exclusivos/ban4.jpg" alt="shop_banner_img8">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="">
                                        <a class="nav-link " href="./shop-list-prod-exclu.php">EXCLUSIVOS</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link " href="./shop-list-prod-mac.php?marc=071">SILVER VOLT</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link " href="./contact.php">Contactanos</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link " href="./about.php">ACERCA DE NOSOTROS</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="contact_phone contact_support">
                                <i class="linearicons-phone-wave"></i>
                                <span>994 009 195</span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- START SECTION BANNER -->
    <div class="mt-4 staggered-animation-wrap">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-7 offset-lg-3">
                    <div class="banner_section shop_el_slider">
                        <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
                            <div class="carousel-inner">

                                <?php
                                $countBan = 1;
                                foreach ($dataConf['banner_pricipal'] as $rowBan) {
                                    $dataExtraBann = '';
                                    if (strlen($rowBan['prod']) > 0) {
                                        $PrecioProdBan = 0;
                                        $sql = "SELECT
                                          id_ofer,
                                          producto_id,
                                          precio_oferta,
                                          cantidad,
                                          cantidad_stock,
                                          fecha_termino
                                        FROM ofertas_productos WHERE producto_id = " . $rowBan['prod'];
                                        if ($rowPRodBan = $conexion->query($sql)->fetch_assoc()) {
                                            $PrecioProdBan = $rowPRodBan['precio_oferta'];
                                        } else {
                                            $productoDao->setProdId($rowBan['prod']);
                                            $PrecioProdBan = $productoDao->getData()['precio'];
                                        }

                                        $PrecioProdBan = number_format($PrecioProdBan, 2, '.', ',');
                                        $dataExtraBann = '<h4 class="staggered-animation mb-4 product-price" data-animation="slideInLeft" data-animation-delay="1.2s"><span class="price">$' . $PrecioProdBan . '</span></h4>
                                                <a class="btn btn-fill-out btn-radius staggered-animation text-uppercase" href="CYM-product-detail.php?prod=' . $rowBan['prod'] . '" data-animation="slideInLeft" data-animation-delay="1.5s">Compra ahora</a>';
                                    }
                                ?>
                                    <div class="carousel-item <?= ($countBan == 1) ? 'active' : '' ?> background_bg" data-img-src="../public/img/banner/<?= $rowBan['imagen'] ?>">
                                        <div class="banner_slide_content banner_content_inner">
                                            <div class="col-lg-7 col-10">
                                                <div class="banner_content3 overflow-hidden">
                                                    <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s"><?= $rowBan['titulo_peque'] ?></h5>
                                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s"><?= $rowBan['titulo'] ?></h2>
                                                    <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s"><?= $rowBan['parrafo'] ?></h5>
                                                    <?= $dataExtraBann ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $countBan++;
                                }
                                ?>



                            </div>
                            <ol class="carousel-indicators indicators_style3">
                                <?php
                                $countIDRFF = 0;
                                foreach ($dataConf['banner_pricipal'] as $rowBan) {
                                    if ($countIDRFF == 0) {
                                        echo '<li data-target="#carouselExampleControls" data-slide-to="' . $countIDRFF . '" class="active"></li>';
                                    } else {
                                        echo '<li data-target="#carouselExampleControls" data-slide-to="' . $countIDRFF . '" ></li>';
                                    }
                                ?>

                                <?php
                                    $countIDRFF++;
                                }
                                ?>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 d-none d-lg-block">
                    <div class="shop_banner2 el_banner1">
                        <a href="<?= $ban1_ide ?>" class="hover_effect1">
                            <div class="el_title text_black">
                                <h6><?= $ban1_nombre ?></h6>
                            </div>
                            <div class="el_img">
                                <img src="../public/img/banner/<?= $ban1_url ?>" alt="shop_banner_img6">
                            </div>
                        </a>
                    </div>
                    <div class="shop_banner2 el_banner2">
                        <a href="<?= $ban2_ide ?>" class="hover_effect1">
                            <div class="el_title text_black">
                                <h6><?= $ban2_nombre ?></h6>
                            </div>
                            <div class="el_img">
                                <img src="../public/img/banner/<?= $ban2_url ?>" alt="shop_banner_img7">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->

    <!-- END MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section small_pt pb-0">
            <div class="custom-container">
                <div class="row">
                    <div class="col-xl-3 d-none d-xl-block">
                        <div class="sale-banner">
                            <a class="hover_effect1" href="./shop-list-prod-mac.php?marc=071">
                                <img src="../public/assets/images/case1.jpg" alt="shop_banner_img6">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading_tab_header">
                                    <div class="heading_s2">
                                        <h4>Productos Exclusivos</h4>
                                    </div>
                                    <div class="tab-style2">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false">
                                            <span class="ion-android-menu"></span>
                                        </button>
                                        <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">Nuevos Ingresos</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="sellers-tab" data-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">Los mas Vendido</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">Ofertas Especiales</a>
                                            </li>
                                            <li hidden class="nav-item">
                                                <a class="nav-link" id="special-tab" data-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="false">Ofertas Especiales
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab_slider">
                                    <div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>

                                            <?php
                                            foreach ($listaNue as $proN) {
                                                $precioProd =  number_format($proN['precio'], 2, '.', ',');

                                            ?>
                                                <div class="item">
                                                    <div class="product_wrap">
                                                        <?php
                                                        /*if ($proN['nuevo'] == 1 ){
                                                    echo '<span class="pr_flash">Nuevo</span>';
                                                } */

                                                        ?>

                                                        <div class="product_img">
                                                            <a href=<a href="shop-product-detail.php?prod=<?= $proN['prod_id'] ?>">
                                                                <img style="max-width: 540px; max-height: 600px;" src="../public/img/productos/<?= $proN['imagen1'] ?>" alt="el_img3">
                                                                <img style="max-width: 540px; max-height: 600px;" class="product_hover_img" src="../public/img/productos/<?= $proN['imagen2'] ?>" alt="el_hover_img3">
                                                                <!--img style="max-width: 540px; max-height: 600px;" src="../public/images/Exclusivos/c_i7.jpg" alt="el_img3">
                                                        <img style="max-width: 540px; max-height: 600px;" class="product_hover_img" src="../public/images/Exclusivos/c_i72.jpg" alt="el_hover_img3"-->
                                                            </a>
                                                            <div class="product_action_box">
                                                                <ul class="list_none pr_action_btn">
                                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Añadir al carrito</a></li>
                                                                    <li><a href="shop-compare.php?prod=<?= $proN['prod_id'] ?>" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                                    <li><a href="shop-quick-view.php?prod=<?= $proN['prod_id'] ?>" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                                    <li><a href="javascript:void(0)"><i class="icon-heart"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product_info">
                                                            <h6 class="product_title"><a href="shop-product-detail.php?prod=<?= $proN['prod_id'] ?>"><?= $proN['nombre'] ?></a></h6>
                                                            <div class="product_price">
                                                                <span class="price">$<?= $precioProd ?></span>
                                                                <!--del>$510.00</del>
                                                        <div class="on_sale">
                                                            <span>Ahorre $30.00</span>
                                                        </div-->
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
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>


                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                            <?php
                                            foreach ($listaRamMasVen as $itemMV) {
                                                $precioProd =  number_format($itemMV['precio'], 2, '.', ',');
                                            ?>
                                                <div class="item">
                                                    <div class="product_wrap">
                                                        <div class="product_img">
                                                            <a href="shop-product-detail.php?prod=<?= $itemMV['prod_id'] ?>">
                                                                <img src="../public/img/productos/<?= $itemMV['imagen1'] ?>" alt="el_img7">
                                                                <img class="product_hover_img" src="../public/img/productos/<?= $itemMV['imagen2'] ?>" alt="el_hover_img7">
                                                            </a>
                                                            <div class="product_action_box">
                                                                <ul class="list_none pr_action_btn">
                                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Añadir al carrito</a></li>
                                                                    <li><a href="shop-compare.php?prod=<?= $itemMV['prod_id'] ?>" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                                    <li><a href="shop-quick-view.php?prod=<?= $itemMV['prod_id'] ?>" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                                    <li><a href="javascript:void(0)"><i class="icon-heart"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product_info">
                                                            <h6 class="product_title"><a href="shop-product-detail.php?prod=<?= $itemMV['prod_id'] ?>"><?= $itemMV['nombre'] ?></a></h6>
                                                            <div class="product_price">
                                                                <span class="price">$<?= $precioProd ?></span>
                                                                <!--del>$15.00</del>
                                                        <div class="on_sale">
                                                            <span>Ahorre Un $6.00</span>
                                                        </div-->
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
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php     }
                                            ?>



                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>

                                            <?php
                                            foreach ($listaOfertas as $proN) {
                                                $ahorro = $proN['precio'] - $proN['precio_oferta'];
                                                $precioProd =  number_format($proN['precio'], 2, '.', ',');
                                                $ahorro = number_format($ahorro, 2, '.', ',');

                                                //$stockTEM = $ofeItem['cantidad'] - 2;
                                                // $progreso =  ($stockTEM * 100)/$ofeItem['cantidad'];
                                                //$progreso = number_format($progreso, 0, '', '');
                                            ?>
                                                <div class="item">
                                                    <div class="product_wrap">
                                                        <?php
                                                        /*if ($proN['nuevo'] == 1 ){
                                                    echo '<span class="pr_flash">Nuevo</span>';
                                                } */

                                                        ?>

                                                        <div class="product_img">
                                                            <a href=<a href="shop-product-detail.php?prod=<?= $proN['prod_id'] ?>">
                                                                <img style="max-width: 540px; max-height: 600px;" src="../public/img/productos/<?= $proN['imagen1'] ?>" alt="el_img3">
                                                                <img style="max-width: 540px; max-height: 600px;" class="product_hover_img" src="../public/img/productos/<?= $proN['imagen2'] ?>" alt="el_hover_img3">
                                                                <!--img style="max-width: 540px; max-height: 600px;" src="../public/images/Exclusivos/c_i7.jpg" alt="el_img3">
                                                        <img style="max-width: 540px; max-height: 600px;" class="product_hover_img" src="../public/images/Exclusivos/c_i72.jpg" alt="el_hover_img3"-->
                                                            </a>
                                                            <div class="product_action_box">
                                                                <ul class="list_none pr_action_btn">
                                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Añadir al carrito</a></li>
                                                                    <li><a href="shop-compare.php?prod=<?= $proN['prod_id'] ?>" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                                    <li><a href="shop-quick-view.php?prod=<?= $proN['prod_id'] ?>" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                                    <li><a href="javascript:void(0)"><i class="icon-heart"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product_info">
                                                            <h6 class="product_title"><a href="shop-product-detail.php?prod=<?= $proN['prod_id'] ?>"><?= $proN['nombre'] ?></a></h6>
                                                            <div class="product_price">
                                                                <span class="price">$<?= $proN['precio_oferta'] ?></span>
                                                                <del>$<?= $precioProd ?></del>
                                                                <div class="on_sale">
                                                                    <span>Ahorre $<?= $ahorro ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:87%"></div>
                                                                </div>
                                                                <span class="rating_num">(25)</span>
                                                            </div>
                                                            <div class="pr_desc">
                                                                <p></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="special" role="tabpanel" aria-labelledby="special-tab">
                                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                            <div class="item">
                                                <div class="product_wrap">
                                                    <div class="product_img">
                                                        <a href="shop-product-detail.php">
                                                            <img src="../public/images/el_img2.jpg" alt="el_img2">
                                                            <img class="product_hover_img" src="../public/images/el_hover_img2.jpg" alt="el_hover_img2">
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
                                                        <h6 class="product_title"><a href="shop-product-detail.php">Smart Watch External</a></h6>
                                                        <div class="product_price">
                                                            <span class="price">$55.00</span>
                                                            <del>$95.00</del>
                                                            <div class="on_sale">
                                                                <span>25% Off</span>
                                                            </div>
                                                        </div>
                                                        <div class="rating_wrap">
                                                            <div class="rating">
                                                                <div class="product_rate" style="width:68%"></div>
                                                            </div>
                                                            <span class="rating_num">(15)</span>
                                                        </div>
                                                        <div class="pr_desc">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product_wrap">
                                                    <div class="product_img">
                                                        <a href="shop-product-detail.php">
                                                            <img src="../public/images/el_img5.jpg" alt="el_img5">
                                                            <img class="product_hover_img" src="../public/images/el_hover_img5.jpg" alt="el_hover_img5">
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
                                                        <h6 class="product_title"><a href="shop-product-detail.php">Smart Televisions</a></h6>
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product_wrap">
                                                    <div class="product_img">
                                                        <a href="shop-product-detail.php">
                                                            <img src="../public/images/el_img9.jpg" alt="el_img9">
                                                            <img class="product_hover_img" src="../public/images/el_hover_img9.jpg" alt="el_hover_img9">
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
                                                        <h6 class="product_title"><a href="shop-product-detail.php">oppo Reno3 Pro</a></h6>
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product_wrap">
                                                    <div class="product_img">
                                                        <a href="shop-product-detail.php">
                                                            <img src="../public/images/el_img7.jpg" alt="el_img7">
                                                            <img class="product_hover_img" src="../public/images/el_hover_img7.jpg" alt="el_hover_img7">
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
                                                        <h6 class="product_title"><a href="shop-product-detail.php">Audio Theaters</a></h6>
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product_wrap">
                                                    <div class="product_img">
                                                        <a href="shop-product-detail.php">
                                                            <img src="../public/images/el_img5.jpg" alt="el_img5">
                                                            <img class="product_hover_img" src="../public/images/el_hover_img5.jpg" alt="el_hover_img5">
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
                                                        <h6 class="product_title"><a href="shop-product-detail.php">Smart Televisions</a></h6>
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
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product_wrap">
                                                    <div class="product_img">
                                                        <a href="shop-product-detail.php">
                                                            <img src="../public/images/el_img12.jpg" alt="el_img12">
                                                            <img class="product_hover_img" src="../public/images/el_hover_img12.jpg" alt="el_hover_img12">
                                                        </a>
                                                        <div class="product_action_box">
                                                            <ul class="list_none pr_action_btn">
                                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                                <li><a href="shop-compare.php" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                                <li><a href="shop-quick-view.php" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                                <li><a href="javascript:void(0)"><i class="icon-heart"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product_info">
                                                        <h6 class="product_title"><a href="shop-product-detail.php">Sound Equipment for Low</a></h6>
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
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION BANNER -->
        <div class="section pb_20 small_pt">
            <div class="custom-container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="sale-banner mb-3 mb-md-4">
                            <a class="hover_effect1" href="<?= $banerCprod1 ?>">
                                <img src="../public/img/banner/<?= $banerCimg1 ?>" alt="shop_banner_img7">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sale-banner mb-3 mb-md-4">
                            <a class="hover_effect1" href="<?= $banerCprod2 ?>">
                                <img src="../public/img/banner/<?= $banerCimg2 ?>" alt="shop_banner_img8">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sale-banner mb-3 mb-md-4">
                            <a class="hover_effect1" href="<?= $banerCprod3 ?>">
                                <img src="../public/img/banner/<?= $banerCimg3 ?>" alt="shop_banner_img9">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION BANNER -->

        <!-- START SECTION SHOP -->
        <div class="section pt-0 pb-0">
            <div class="custom-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Ofertas</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style3" data-loop="false" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "1"}, "650":{"items": "2"}, "1199":{"items": "2"}}'>
                            <?php
                            foreach ($listaOfertas as $ofeItem) {
                                $precioFormat = number_format($ofeItem['precio'], 2, '.', ',');

                                $stockTEM = $ofeItem['cantidad'] - 2;
                                $progreso =  ($stockTEM * 100) / $ofeItem['cantidad'];
                                $progreso = number_format($progreso, 0, '', '');

                            ?>
                                <div class="item">
                                    <div class="deal_wrap">
                                        <div class="product_img">
                                            <a href="shop-product-detail.php?prod=<?= $ofeItem['prod_id'] ?>">
                                                <img src="../public/img/productos/<?php echo $ofeItem['imagen1'] ?>" alt="el_img1">
                                            </a>
                                        </div>
                                        <div class="deal_content">
                                            <div class="product_info">
                                                <h5 class="product_title"><a href="shop-product-detail.php?prod=<?= $ofeItem['prod_id'] ?>"><?= $ofeItem['nombre'] ?></a></h5>
                                                <div class="product_price">
                                                    <span class="price">$<?= $ofeItem['precio_oferta'] ?></span>
                                                    <del>$<?= $precioFormat ?></del>
                                                </div>
                                            </div>
                                            <div class="deal_progress">
                                                <span class="stock-sold">Vendido: <strong><?php echo $stockTEM ?></strong></span>
                                                <span class="stock-available">Disponible: <strong><?= $ofeItem['cantidad'] - $stockTEM ?></strong></span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?= $progreso ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= $progreso ?>%"> <?= $progreso ?>% </div>
                                                </div>
                                            </div>
                                            <div class="countdown_time countdown_style4 mb-4 " data-time="<?= $ofeItem['fecha_termino'] ?> 12:00:00"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END SECTION SHOP -->

        <!-- START SECTION SHOP -->
        <div class="section small_pt small_pb">
            <div class="custom-container">
                <div class="row">
                    <div class="col-xl-3 d-none d-xl-block">
                        <div class="sale-banner">
                            <a class="hover_effect1" href="./shop-list-ctg.php?ctg=043">
                                <img src="../public/images/silla1.jpg" alt="shop_banner_img10">
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading_tab_header">
                                    <div class="heading_s2">
                                        <h4>Productos de Tendencia</h4>
                                    </div>
                                    <div class="view_all">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>

                                    <?php
                                    foreach ($listaRamTenden as $rowTem) {
                                        $precioProd =  number_format($rowTem['precio'], 2, '.', ',');
                                    ?>
                                        <div class="item">
                                            <div class="product_wrap">
                                                <div class="product_img">
                                                    <a href="shop-product-detail.php">
                                                        <img src="../public/img/productos/<?= $rowTem['imagen1'] ?>" alt="el_img7">
                                                        <img class="product_hover_img" src="../public/img/productos/<?= $rowTem['imagen2'] ?>" alt="el_hover_img7">
                                                    </a>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            <li class="add-to-cart"><a href="javascript:void(0)"><i class="icon-basket-loaded"></i> Añadir al carrito</a></li>
                                                            <li><a href="shop-compare.php?prod=<?= $rowTem['prod_id'] ?>" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                            <li><a href="shop-quick-view.php?prod=<?= $rowTem['prod_id'] ?>" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                            <li><a href="javascript:void(0)"><i class="icon-heart"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="shop-product-detail.php?prod=<?= $rowTem['prod_id'] ?>"><?= $rowTem['nombre'] ?></a></h6>
                                                    <div class="product_price">
                                                        <span class="price">$<?= $precioProd ?></span>
                                                        <!--del>$15.00</del>
                                                <div class="on_sale">
                                                    <span>Ahorre Un $6.00</span>
                                                </div-->
                                                    </div>
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:68%"></div>
                                                        </div>
                                                        <span class="rating_num">(15)</span>
                                                    </div>
                                                    <div class="pr_desc">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php    }
                                    ?>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION CLIENT LOGO -->
        <div class="section pt-0 small_pb">
            <div class="custom-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Nuestras Marcas</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}, "1199":{"items": "6"}}'>
                            <?php
                            foreach ($listaMarcas as $rowMarc) {
                                if (strlen($rowMarc['imagen']) > 0) {
                            ?>
                                    <div class="item">
                                        <div class="cl_logo">
                                            <img src="../public/img/marcas/<?= $rowMarc['imagen'] ?>" alt="cl_logo" />
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION CLIENT LOGO -->

        <!-- START SECTION SHOP -->
        <div class="section pt-0 pb_20">
            <div class="custom-container">
                <div class="row">

                    <?php
                    foreach ($listaRamByCat as $rowBC) {

                        $contadorBC = 0;
                        $rowHTMLPOR1 = "";
                        $rowHTMLPOR2 = "";
                        foreach ($rowBC['productos'] as $rowProBC) {

                            $precioProd =  number_format($rowProBC['precio'], 2, '.', ',');

                            // echo $contadorBC."    ---------------------    ";
                            if ($contadorBC < 3) {
                                $rowHTMLPOR1 = $rowHTMLPOR1 . '<div class="product_wrap">
                                        <div class="product_img">
                                            <a href="CYM-product-detail.php?prod=' . $rowProBC['prod_id'] . '">
                                                <img src="../public/img/productos/' . $rowProBC['imagen1'] . '" alt="el_img7">
                                                <img class="product_hover_img" src="../public/img/productos/' . $rowProBC['imagen2'] . '" alt="el_hover_img7">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="CYM-product-detail.php?prod=' . $rowProBC['prod_id'] . '">' . $rowProBC['nombre'] . '</a></h6>
                                            <div class="product_price">
                                                <span class="price">$' . $precioProd . '</span>
                                                
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:68%"></div>
                                                </div>
                                                <span class="rating_num">(15)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>';
                            } else {
                                $rowHTMLPOR2 = $rowHTMLPOR2 . '<div class="product_wrap">
                                        <div class="product_img">
                                            <a href="CYM-product-detail.php?prod=' . $rowProBC['prod_id'] . '">
                                                <img src="../public/img/productos/' . $rowProBC['imagen1'] . '" alt="el_img7">
                                                <img class="product_hover_img" src="../public/img/productos/' . $rowProBC['imagen2'] . '" alt="el_hover_img7">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="CYM-product-detail.php?prod=' . $rowProBC['prod_id'] . '">' . $rowProBC['nombre'] . '</a></h6>
                                            <div class="product_price">
                                                <span class="price">$' . $precioProd . '</span>
                                                
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:68%"></div>
                                                </div>
                                                <span class="rating_num">(15)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>';
                            }
                            $contadorBC++;
                        }


                    ?>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="heading_tab_header">
                                        <div class="heading_s2">
                                            <h4><?= $rowBC['nombre'] ?></h4>
                                        </div>
                                        <div class="view_all">
                                            <a href="./shop-list-prod.php?search=+" class="text_default"><span>Ver todo</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                                        <div class="item">
                                            <?= $rowHTMLPOR1 ?>
                                        </div>
                                        <div class="item">
                                            <?= $rowHTMLPOR2 ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading_tab_header">
                                    <div class="heading_s2">
                                        <h4>Productos en Oferta</h4>
                                    </div>
                                    <div class="view_all">
                                        <a href="./shop-list-prod.php?search=+" class="text_default"><span>Ver Todo</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5 owl-loaded owl-drag" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive="{&quot;0&quot;:{&quot;items&quot;: &quot;1&quot;}, &quot;380&quot;:{&quot;items&quot;: &quot;1&quot;}, &quot;640&quot;:{&quot;items&quot;: &quot;2&quot;}, &quot;991&quot;:{&quot;items&quot;: &quot;1&quot;}}">


                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(-1080px, 0px, 0px); transition: all 0s ease 0s; width: 3240px;">

                                            <?php
                                            $htmlEXOFER = '';

                                            $contadorOFJSJD = 0;
                                            foreach ($listaOfertas as $ofeItem) {
                                                $ahorroPR = $ofeItem['precio'] - $ofeItem['precio_oferta'];
                                                $precioFormat = number_format($ofeItem['precio'], 2, '.', ',');
                                                $ahorroPR = number_format($ahorroPR, 2, '.', ',');
                                                if ($contadorOFJSJD == 0) {
                                                    $htmlEXOFER = $htmlEXOFER . '<div class="owl-item cloned" style="width: 520px; margin-right: 20px;">
                                        <div class="item">';
                                                }


                                                if ($contadorOFJSJD == 2) {
                                                    $htmlEXOFER  = $htmlEXOFER . '<div class="product_wrap">
                                                <div class="product_img">
                                                    <a href="CYM-product-detail.php?prod=' . $ofeItem['prod_id'] . '">
                                                       
                                                        <img  style="" src="../public/img/productos/' . $ofeItem['imagen1'] . '" alt="el_img3">
                                                        <img  class="product_hover_img" src="../public/img/productos/' . $ofeItem['imagen2'] . '" alt="el_hover_img3">
                                                    </a>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="CYM-product-detail.php?prod=' . $ofeItem['prod_id'] . '">' . $ofeItem['nombre'] . '</a></h6>
                                                    <div class="product_price">
                                                        <span class="price">$' . $ofeItem['precio_oferta'] . '</span>
                                                        <del>$' . $precioFormat . '</del>
                                                        <div class="on_sale">
                                                            <span>Ahorra $' . $ahorroPR . '</span>
                                                        </div>
                                                    </div>
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:70%"></div>
                                                        </div>
                                                        <span class="rating_num">(22)</span>
                                                    </div>
                                                    <div class="pr_desc">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>';
                                                    $htmlEXOFER = $htmlEXOFER . '    </div> </div>';
                                                    $contadorOFJSJD = 0;
                                                } else {
                                                    $htmlEXOFER  = $htmlEXOFER . '<div class="product_wrap">
                                                <div class="product_img">
                                                    <a href="CYM-product-detail.php?prod=' . $ofeItem['prod_id'] . '">
                                                       
                                                        <img  style="" src="../public/img/productos/' . $ofeItem['imagen1'] . '" alt="el_img3">
                                                        <img  class="product_hover_img" src="../public/img/productos/' . $ofeItem['imagen2'] . '" alt="el_hover_img3">
                                                    </a>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="CYM-product-detail.php?prod=' . $ofeItem['prod_id'] . '">' . $ofeItem['nombre'] . '</a></h6>
                                                    <div class="product_price">
                                                        <span class="price">$' . $ofeItem['precio_oferta'] . '</span>
                                                        <del>$' . $precioFormat . '</del>
                                                        <div class="on_sale">
                                                            <span>Ahorra $' . $ahorroPR . '</span>
                                                        </div>
                                                    </div>
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:70%"></div>
                                                        </div>
                                                        <span class="rating_num">(22)</span>
                                                    </div>
                                                    <div class="pr_desc">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>';
                                                    $contadorOFJSJD++;
                                                }
                                            }
                                            if ($contadorOFJSJD > 0) {
                                                $htmlEXOFER = $htmlEXOFER . '    </div> </div>';
                                            }
                                            ?>



                                            <?= $htmlEXOFER ?>



                                        </div>
                                    </div>
                                    <div class="owl-nav">
                                        <button type="button" role="presentation" class="owl-prev"><i class="ion-ios-arrow-left"></i></button>
                                        <button type="button" role="presentation" class="owl-next"><i class="ion-ios-arrow-right"></i></button>
                                    </div>
                                    <div class="owl-dots disabled"></div>
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
            <div class="custom-container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="newsletter_text text_white">
                            <h3>Unete a La Mejor Empresa en Productos GAMING</h3>
                            <p> Registrate para recibir Nuestras PROMOCIONES. </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form2 rounded_input">
                            <form action="#">
                                <input type="text" required="" class="form-control" placeholder="Ingresa tu Email">
                                <button type="submit" class="btn btn-dark btn-radius" name="submit" value="Submit">Suscribete</button>
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
    <footer class="bg_gray">
        <div class="footer_top small_pt pb_20">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="widget">
                            <div class="footer_logo">
                                <a href="./"><img src="../public/assets/images/cym.png" alt="logo" /></a>
                            </div>
                            <p class="mb-3">Empresa Reconocida en Productos GAMING</p>
                            <ul class="contact_info">
                                <li>
                                    <i class="ti-location-pin"></i>
                                    <p>Av Garcilazo de la Vega 1249, Tienda #123, Lima, PERÚ</p>
                                </li>
                                <li>
                                    <i class="ti-email"></i>
                                    <a href="mailto:info@sitename.com">ventascompuvision@hotmail.com</a>
                                </li>
                                <li>
                                    <i class="ti-mobile"></i>
                                    <p>+ 511 994 009 195</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widget">
                            <h6 class="widget_title">Empresa</h6>
                            <ul class="widget_links">
                                <li><a href="about.php">Nosotros</a></li>
                                <li><a href="contact.php">Contactanos</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widget">
                            <h6 class="widget_title">Productos</h6>
                            <ul class="widget_links">
                                <li><a href="./shop-list-ctg.php?ctg=005">Tarjeta de Video</a></li>
                                <li><a href="./shop-list-ctg.php?ctg=001">Procesadores</a></li>
                                <li><a href="./shop-list-ctg.php?ctg=010">Monitores</a></li>
                                <li><a href="./shop-list-ctg.php?ctg=002">Placa Madre</a></li>
                                <li><a href="./shop-list-ctg.php?ctg=012-014">Mouse</a></li>
                                <li><a href="./shop-list-ctg.php?ctg=012-014">Teclado</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="widget">
                            <h6 class="widget_title">Instagram</h6>
                            <ul class="widget_instafeed instafeed_col4">
                                <li><a href="https://www.instagram.com/p/CIUDoMFBpN_/"><img src="../public/assets/images/instagran/evga.png" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="https://www.instagram.com/p/CIUDjnFh2C2/"><img src="../public/assets/images/instagran/msi.png" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="https://www.instagram.com/p/CHbGFF_lXwq/"><img src="../public/assets/images/instagran/intel.png" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="https://www.instagram.com/p/CHOUgBBFGWc/"><img src="../public/assets/images/instagran/ryzen.png" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="https://www.instagram.com/p/CIn3jpnlbyl/"><img src="../public/assets/images/instagran/3060ti.png" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="https://www.instagram.com/p/CIn11oFF0yv/"><img src="../public/assets/images/instagran/3060ti1.png" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="https://www.instagram.com/p/CIlcjbOlNQB/"><img src="../public/assets/images/instagran/3070.png" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="https://www.instagram.com/p/CIlbiP5lJ6G/"><img src="../public/assets/images/instagran/masus.png" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="middle_footer">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="shopping_info">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="icon_box icon_box_style2">
                                        <div class="icon">
                                            <i class="flaticon-shipped"></i>
                                        </div>
                                        <div class="icon_box_content">
                                            <h5>Consultar Nuestro Delivery</h5>
                                            <p>Contamos con todos los Protocolos de Bioseguridad</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="icon_box icon_box_style2">
                                        <div class="icon">
                                            <i class="flaticon-money-back"></i>
                                        </div>
                                        <div class="icon_box_content">
                                            <h5>Todos Nuestros Productos Incluyen Garantía</h5>
                                            <p>Siempre Guarde su Boleta o Factura de Compra</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="icon_box icon_box_style2">
                                        <div class="icon">
                                            <i class="flaticon-support"></i>
                                        </div>
                                        <div class="icon_box_content">
                                            <h5>Contamos con Nuestro Soporte Técnico</h5>
                                            <p>Pueden Traer su Ordenador Con Nosotros</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_footer border-top-tran">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="mb-lg-0 text-center">© 2024 All Rights Reserved by MAGUSTECHNOLOGIES</p>
                    </div>
                    <div class="col-lg-4 order-lg-first">
                        <div class="widget mb-lg-0">
                            <ul class="social_icons text-center text-lg-left">
                                <li><a href="https://www.facebook.com/compuvisionperu" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
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

    <?php
    if (strlen($dataConf['whatsapp']) > 4) {
        echo '<a href="' . $dataConf['whatsapp'] . '" class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>';
    }
    ?>

    <!-- END FOOTER -->

    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

    <!-- Latest jQuery -->
    <script src="../public/assets/js/jquery-1.12.4.min.js"></script>
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
    <script src="../public/js/main.js"></script>
    <script src="../public/js/tools.js"></script>
</body>

</html>
