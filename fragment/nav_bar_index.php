<div class="middle-header dark_skin" >
    <div class="custom-container" style="background-color: #232323;">
        <div class="nav_block">
            <a class="navbar-brand" href="index.php">
                <img class="logo_light" src="../public/images/cym.png" alt="logo" />
                <img class="logo_dark" src="../public/images/cym.png" alt="logo" />
            </a>
            <?php
            if ($body_class == 'desktop') { ?>
                <div class="product_search_fcymounded_input" style="width: 50%;">
                    <form action="shop-list-prod.php" method="GET">
                        <div class="search-container">
                            <input class="rounded-left-input" name="search" placeholder="Buscar producto en COMPUTER." required="" type="text">
                            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                        </div>

                    </form>
                </div>
            <?php } ?>
            <ul class="navbar-nav attr-nav align-items-center">
                <li><a href="#" class="nav-link" style="color:#fff;"><i class="linearicons-user"></i></a></li>
                <?php

                if ($isSesionUser) {
                    if ($perfilUser != 'usuario') {
                        if ($body_class == 'desktop') {
                            if ($perfilUser == 'vendedor') {
                                echo '<li><a href="../admin/pedidos.php"> <span>Administrar</span></a></li>';
                            } else {
                                echo '<li><a style="color:#FF00FE" href="../admin/"> <span>Administrar</span></a></li>';
                            }
                            echo '<li><a href="../auth/logout.php" class="nav-link" style="color:#fff;"> Cerrar Sesi&oacute;n</a></li>';
                        } else {
                            if ($perfilUser == 'vendedor') {
                                echo '<li>
                                        <a style="padding-bottom: 5px;" href="../admin/pedidos.php" class="nav-link" style="color:#fff;"> Administrar</a>
                                        <a style="padding-top: 5px;" href="../auth/logout.php" class="nav-link" style="color:#fff;"> Cerrar Sesi&oacute;n</a>
                                    </li>';
                            } else {
                                echo '<li>
                                        <a style="padding-bottom: 5px;" href="../admin/" class="nav-link" style="color:#fff;"> Administrar</a>
                                        <a style="padding-top: 5px;" href="../auth/logout.php" class="nav-link" style="color:#fff;"> Cerrar Sesi&oacute;n</a>
                                    </li>';
                            }
                        }
                    } else {
                        if ($body_class == 'desktop') {
                            echo '<li><a href="./my-account.php"><span>Mi Cuenta</span></a></li>';
                            echo '<li><a href="../auth/logout.php" class="nav-link" style="color:#fff;"> Cerrar Sesión</a></li>';
                        } else {
                            echo '<li>
                                    <a style="padding-bottom: 5px;" href="./my-account.php"><span>Mi Cuenta</span></a>
                                    <a style="padding-top: 5px;" href="../auth/logout.php" class="nav-link" style="color:#fff;"> Cerrar Sesi&oacute;n</a>
                                    </li>';
                        }
                    }
                } else {
                    echo '<li><a href="./login.php" class="nav-link" style="color:#fff;"> Iniciar Sesi&oacute;n</a></li>';
                }
                ?>
                <li class="dropdown cart_dropdown" id="content-carrito"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-bag2" style="color:#fff;"></i><span v-if="listaCarrito.length>0" class="cart_count" >{{listaCarrito.length}}</span><span class="amount" style="color:#fff;"><span class="currency_symbol" style="color: green;">$</span>{{totalCar}}</span></a>
                    <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                        <ul class="cart_list">
                            <li v-for="(item, index) in listaCarrito">
                                <a href="#" @click="eliminarProdCarrito(index)" class="item_remove"><i class="ion-close"></i></a>
                                <a href="#"><img style="max-width: 80px;max-height: 80px" :src="'../public/img/productos/'+item.imagen" alt="cart_thumb1">{{item.nombre_prod}}</a>
                                <span class="cart_quantity"> {{item.cantidad}} x <span class="cart_amount"> <span class="price_symbole">$</span></span>{{item.precio}}</span>
                            </li>
                        </ul>
                        <div class="cart_footer">
                            <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>{{totalCar}}</p>
                            <p class="cart_buttons"><a href="shop-cart.php" class="btn btn-fill-line view-cart">Ver carrito</a><a href="checkout.php" class="btn btn-fill-out checkout">Pagar</a></p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php if ($body_class != 'desktop') { ?>
    <p style="    margin-bottom: 3px;
    text-align: center;
    font-family: movilfontlema;
    font-weight: bold;
    color: black;
    font-size: 31px;">"Superiores en Hardware"</p>
    <div class="product_search_fcymounded_input" style="padding: 15px 15px 7px;">
        <form action="shop-list-prod.php" method="GET">
            <div class="input-group">
                <input class="form-control" name="search" placeholder="Buscar producto..." required="" type="text">
                <button type="submit" class="search_btn2" style="right: 1px;top: -1px;"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
<?php
}
?>
