<?php 

if (!(isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_USER'] == 'Edgar' 
    && $_SERVER['PHP_AUTH_PW'] == 'edgar123')) {
    header('WWW-Authenticate: Basic realm="Restricted area"');
    header('HTTP/1.1 401 Unauthorized');
    exit;
}else{
	if (!empty($_POST)) {
		require_once '../user.php';
		echo "Welcome to my api";		
		$authData = json_decode($_POST['auth']);
		$login = User::login($authData->usuario, $authData->password);
		if (mysqli_num_rows($login)>=1) {			
			$saveData = json_decode($_POST['data']);
			echo "\nUsuario: $authData->usuario";
			echo "\nContraseña: $authData->password";
			if(is_array($saveData)){
				foreach ($saveData as $reg) {				
					if (!guardar($reg))
						header('HTTP/1.0 500 Unsuccesfull Transaction');
				}
			}			
			else{			
				if(!guardar($saveData))
					header('HTTP/1.0 500 Unsuccesfull Transaction');
			}
		}else{
			header('HTTP/1.0 300 Forbbiden');
		}
		
			
	}else{
		header('HTTP/1.0 400 Bad Request');
	    echo "<h1>400 Bad Request</h1>";
	    echo "This api support only post method and this was not found.";
	    exit();
	}	
}

function guardar($json){	
	require_once '../conectar.php';	
	$email=$json->mail;
	$nombre= $json->nombre;
	$ruc= $json->ruc;
	$pass= $json->clave;
	$role= $json->role;
	$unico= $json->uni;
	$codigo= $json->cod;
	$fecha=  date('Y-m-d', strtotime($json->fec));
	$estab= $json->est;
	$ptoemi= $json->pe;
	$total= $json->tot;
	$secuencial= $json->secuen;
	$claveac= $json->ca;
	$numaut= $json->na;
	$descargado= $json->des;
	$revisado= $json->rev;
	$enviado= $json->env;

	$con = Conector::getConexion();
	$query= "CALL save('{$email}','{$nombre}','{$ruc}','{$pass}','{$role}','{$unico}','{$codigo}','{$fecha}','{$estab}','{$ptoemi}','{$total}','{$secuencial}','{$claveac}','{$numaut}','{$descargado}','{$revisado}','{$enviado}');";
	$result=mysqli_query($con, $query);

	return $result;
}

 ?>