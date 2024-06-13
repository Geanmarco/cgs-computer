<?php
date_default_timezone_set('America/Lima');


$isSesionUser = isset($_SESSION['usuario']);
$perfilUser = '';

//echo $isSesionUser?'11111111111':'222222222222';
if ($isSesionUser) {
    $perfilUser = $_SESSION['perfil'];
}

?>
<style>

</style>

<?php
$body_class = 'desktop';

if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $body_class = "tablet";
    $divice = 2;
}

if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {

    $body_class = "mobile";
    $divice = 1;
}

if ($body_class == 'desktop') { ?>
    <style>
        .titulo_prod {
            height: 40px;
        }

        .titulo_prod>a {
            white-space: normal
        }
    </style>
<?php } elseif ($body_class == 'mobile') { ?>
    <style>
        .titulo_prod {
            height: 34px;
        }

        .titulo_prod>a {
            white-space: normal
        }
    </style>
<?php } elseif ($body_class == 'tablet') { ?>
    <style>
        .titulo_prod {
            height: 34px;
        }

        .titulo_prod>a {
            white-space: normal
        }
    </style>
<?php }

?>





<?php
require_once "../extra/TasaCambioApi.php";

$tasaCambioApi = new TasaCambioApi();
$cambio = $tasaCambioApi->getTasaCambio();
$tc = $cambio['cambio'];

?>
<input type="hidden" value="<?= $tc ?>" id="tasa_cambio">
<header class="header_wrap fixed-top header_with_topbar">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="lng_dropdown mr-2">
                            <!--
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="../public/assets/images/eng.png" data-title="English">English</option>
                                <option value='fn' data-image="../public/assets/images/fn.png" data-title="France">France</option>
                                <option value='us' data-image="../public/assets/images/us.png" data-title="United States">United States</option>
                            </select> -->
                            <i class="ti-location-pin" style="float: left"></i>
                            <p style="float: left; margin: 0px;"><strong><?= $dataConf['direccion'] ?></strong></p>
                        </div>
                        <div class="mr-3">
                            <!--
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>-->
                        </div>
                        <ul class="contact_detail text-center text-lg-left">
                            <!--
                            <li><i class="ti-mobile"></i><span>994 009 195</span></li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-right">
                        <ul class="header_list">

                            <?php
                            if ($isSesionUser) {
                                if ($perfilUser != 'usuario') {
                                    if ($perfilUser == 'vendedor') {
                                        echo '<li><a href="../admin/pedidos.php"><i class="ti-control-shuffle"></i><span>Administrar</span></a></li>';
                                    } else {
                                        echo '<li><a href="../admin/"><i class="ti-control-shuffle"></i><span>Administrar</span></a></li>';
                                    }
                                }
                                echo '<li><a href="./my-account.php"><i class="ti-agenda"></i><span>Mi Cuenta</span></a></li>';
                                echo '<li><a href="../auth/logout.php"><i class="ti-user"></i><span>Cerrar Sesión</span></a></li>';
                            } else {
                                echo '<li><a href="./login.php"><i class="ti-user"></i><span>Iniciar Sesión</span></a></li>';
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    //$listaMarcas = $conexion->query("SELECT * FROM marcra_productos");
    $listaOfertas = $productoDao->getDataofertas();
    $listaMarcas = $conexion->query("SELECT * FROM marcra_productos order by nombre_marca asc ");
    ?>
    <div class="nav-new">
        <a class="navbar-brand" href="index.php" style="width: 13%;">
            <img src="../public/images/logo-white.png" alt="logo" />
        </a>
        <div class="nav-options"><span><a href="/"><span>INICIO</a></span></div>
        <div class="nav-options pink panel-palpitante"><span class="texto-palpitante">
            <a href="shop-list-prod-ofertas.php">Ofertas</a></span></div>
        <div class="nav-options"><span><a href="shop-list-prod.php?search=+&type=last">PROFORMA</a></span></div>
        <div class="nav-options pink panel-palpitante"><span class="texto-palpitante"><a href="shop-list-prod-remate.php">COMPUTADORAS</a></span></div>
        <div class="nav-options"><span><a href="./shop-list-prod-exclu.php">REMATES</a></span></div>
        <div class="nav-options pink panel-palpitante"><span class="texto-palpitante"><a href="shop-list-prod-remates.php">TALLERES</a></span></div>
        <!--<div class="nav-options"><span>Silver Volt</span></div>-->
        <div class="nav-options"><span><a href="./contact.php">Contactanos</a></span></div>
        <div class="nav-options dropdown cart_dropdown" id="content-carrito">
            <a class="nav-link cart_trigger" id="btnMostarCarrito" href="#" data-toggle="dropdown" style="color: white;"><i class="linearicons-bag2"></i><span v-if="listaCarrito.length>0" class="cart_count">{{listaCarrito.length}}</span><span class="amount"><span class="currency_symbol">$</span>{{totalCar}}</span></a>
            <div class="cart_box cart_right dropdown-menu dropdown-menu-right" id="divCarrito" style="width: 320px;">
                <ul class="cart_list">
                    <li v-for="(item, index) in listaCarrito">
                        <a href="#" @click="eliminarProdCarrito(index)" class="item_remove"><i class="ion-close"></i></a>
                        <a href="#"><img style="max-width: 80px;max-height: 80px" :src="'../public/img/productos/'+item.imagen" alt="cart_thumb1">{{item.nombre_prod}}</a>
                        <span class="cart_quantity"> {{item.cantidad}} x <span class="cart_amount"> <span class="price_symbole">$</span></span>{{item.precio}}</span>
                    </li>
                </ul>
                <div class="cart_footer">
                    <p class="cart_total" style="color: #000;"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>{{totalCar}}</p>
                    <p class="cart_buttons"><a href="shop-cart.php" class="btn btn-fill-line view-cart">Ver carrito</a><a href="checkout.php" class="btn btn-fill-out checkout">Pagar</a></p>
                </div>
            </div>
        </div>
    </div>

</header>
<script>
    var showCarrito = false
    var showNav = false
    window.addEventListener('DOMContentLoaded', (event) => {
        const element = document.getElementById("btnMostarCarrito");
        const showNavButton = document.getElementById("showNav");
        if(element){
            element.addEventListener("click", myFunction);
        }
        if(showNavButton){
            showNavButton.addEventListener("click", myFunctionNav);
        }
        

        function myFunction() {
            showCarrito = !showCarrito
            if (showCarrito) {
                document.getElementById("divCarrito").classList.add("show");
            } else {
                document.getElementById("divCarrito").classList.remove("show");
            }
        }

        function myFunctionNav() {
            showNav = !showNav
            console.log('showNav');
            if (showNav) {
                document.getElementById("navbarSupportedContent").classList.add("show");
            } else {
                document.getElementById("navbarSupportedContent").classList.remove("show");
            }
        }
    });
</script>