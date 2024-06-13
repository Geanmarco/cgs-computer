<?php 
	$conex= mysqli_connect('localhost','root', '', 'de') or die('Error al conectar'. mysqli_error());
	if (isset($_GET['email'])&&isset($_GET['nombre'])&&isset($_GET['ruc'])&&isset($_GET['pass'])&&isset($_GET['role'])&&isset($_GET['unico'])&&isset($_GET['codigo'])&&isset($_GET['fecha'])&&isset($_GET['estab'])&&isset($_GET['ptoemi'])&&isset($_GET['total'])&&isset($_GET['secuencial'])&&isset($_GET['claveac'])&&isset($_GET['numaut'])&&isset($_GET['descargado'])&&isset($_GET['revisado'])&&isset($_GET['enviado'])) {

		$email=base64_decode($_GET['email']);
		$nombre=base64_decode($_GET['nombre']);
		$ruc=base64_decode($_GET['ruc']);
		$pass=base64_decode($_GET['pass']);
		$role=base64_decode($_GET['role']);
		$unico=base64_decode($_GET['unico']);
		$codigo=base64_decode($_GET['codigo']);
		$fecha= date('Y-m-d', strtotime(base64_decode($_GET['fecha'])));
		$estab=base64_decode($_GET['estab']);
		$ptoemi=base64_decode($_GET['ptoemi']);
		$total=base64_decode($_GET['total']);
		$secuencial=base64_decode($_GET['secuencial']);
		$claveac=base64_decode($_GET['claveac']);
		$numaut=base64_decode($_GET['numaut']);
		$descargado=base64_decode($_GET['descargado']);
		$revisado=base64_decode($_GET['revisado']);
		$enviado=base64_decode($_GET['enviado']);
		
		$query= "CALL save('{$email}','{$nombre}','{$ruc}','{$pass}','{$role}','{$unico}','{$codigo}','{$fecha}','{$estab}','{$ptoemi}','{$total}','{$secuencial}','{$claveac}','{$numaut}','{$descargado}','{$revisado}','{$enviado}');";
		$result=mysqli_query($conex, $query);
		echo $query;
		echo "<br>Succcessfull Transaction";
		
	}else{
		echo "Datos incompletos";
	}

 ?>