<?php

require_once "../utils/Conexion.php";

$conexion = (new Conexion())->getConexion();

$sql = "insert into usuarios set nombres='{$_POST['nombres']}', clave='{$_POST['clave']}',email='{$_POST['email']}', perfil='vendedor',token_reset=''";

$conexion->query($sql);

header("Location: usuarios.php");






