<?php


$isSesionUser = isset($_SESSION['usuario']);
$perfilUser = '';

//echo $isSesionUser?'11111111111':'222222222222';
if ($isSesionUser) {
    $perfilUser = $_SESSION['perfil'];
    if ($perfilUser == 'usuario') {
        header("Location: ../CYM");
    }
} else {
    header("Location: ../CYM/");
}

?>
<header class="header_wrap fixed-top header_with_topbar">

    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img class="logo_light" src="../public/images/cym.png" alt="logo" />
                    <img class="logo_dark" src="../public/images/cym.png" alt="logo" />
                </a>
                <!--button style="padding: 5px;padding-left: 12px;margin-left: 5px;}" class="btn btn-info"><i class="fa fa-edit"></i></button-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                       
		  <li class="dropdown">
                            <a data-toggle="dropdown" class="nav-link dropdown-toggle " href="#">Tienda</a>
                            <div class="dropdown-menu">
                                <ul>
			<li><a class="dropdown-item nav-link nav_item" href="../CYM/">Administrar</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="./reclamosrec.php">Reclamos</a></li>
                                   

                                </ul>
                            </div>
                        </li>



                        <li <?= $_SESSION['perfil'] == 'vendedor' ? 'hidden' : '' ?> class="dropdown">
                            <a data-toggle="dropdown" class="nav-link dropdown-toggle " href="#">Configuracion</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="./">Principal</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="./confBaner.php">Banners</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="./usuarios.php">Usuarios</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="./usuarios_promociones.php">Usuarios Suscritos</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="./formas_pago.php">Formas de Pago</a></li>

                                </ul>

                            </div>

                        </li>
                        <li <?= $_SESSION['perfil'] == 'vendedor' ? 'hidden' : '' ?> class="dropdown">
                            <a data-toggle="dropdown" class="nav-link dropdown-toggle " href="#">Productos</a>
                            <div class="dropdown-menu">


                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="./productos.php">Lista de Productos</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="./categorias.php">Categorias</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="./marcas.php">Marcas</a></li>



                                </ul>

                            </div>

                        </li>

                        <li <?= $_SESSION['perfil'] == 'vendedor' ? 'hidden' : '' ?> class="dropdown">
                            <a data-toggle="dropdown" class="nav-link dropdown-toggle " href="#">Listas</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="./productos_pc_armadas.php">Pc Armadas</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="./ofertas.php">Ofertas</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="./exclusivo.php">Exclusivos</a></li>

                                </ul>
                            </div>
                        </li>

                        <li <?= $_SESSION['perfil'] == 'vendedor' ? 'hidden' : '' ?>><a class="nav-link nav_item" href="./contacto.php">Contacto</a></li>
                        <li <?= $_SESSION['perfil'] == 'vendedor' ? 'hidden' : '' ?>><a class="nav-link nav_item" href="./nosotros.php">Nosotros</a></li>
                        <?php
                        if ($_SESSION['perfil'] == 'admin') {
                            echo '<li><a class="nav-link nav_item" href="./pedidos.php">Pedidos</a></li>';
                        }
                        ?>
                        <?php
                        if ($_SESSION['perfil'] == 'admin') {
                            echo '<li><a class="nav-link nav_item" href="./compras.php">Compras</a></li>';
                        }
                        ?>

                        <li><a class="nav-link nav_item" href="../auth/logout.php">Salir</a></li>
                    </ul>
                </div>

            </nav>
        </div>
    </div>
</header>