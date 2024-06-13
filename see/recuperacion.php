<html>
<head>
	<title></title>

		<meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="description" content="">
	  <meta name="author" content="">
		<title>Home</title>

	
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">  
	  <link href="css/blog-post.css" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="css/cupertino/jquery.ui.theme.css">
	  <link rel="stylesheet" type="text/css" href="css/cupertino/jquery-ui.css">

	  <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	  <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
	  <script type="text/javascript" src="js/bootstrap.js"></script>
	  <style type="text/css">
	  	body {
          background-image: url("img/fondo.jpg"); 
          background-color: #cccccc;
          background-position: -100px -100px; 
          background-attachment:fixed;
        }
	  </style> 

</head>
<body>

	<div class="container">

<?php 
	if ($_POST) {
		include_once("user.php");
		$ruc=$_POST['ruc'];
		$p1=$_POST['pass1'];
		$p2=$_POST['pass2'];		
		if ($p1==$p2) {
			User::changePass($p1, $ruc);		

			?>
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4"><div class="alert alert-warnig">Su contraseña se a cambiado correctamente ahora puede autenticarse <a class="btn btn-primary" href="login.php"><i class="glyphicon glyphicon-lock"></i>aqui</a></div></div>
					<div class="col-lg-4"></div>
				</div>
			<?php 			
		}else{
			?>
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4"><div class="alert alert-warnig">Lo sentimos las contraseñas no coinciden para salir click aqui: <a class="btn btn-primary" href="login.php"><i class="glyphicon glyphicon-lock"></i>aqui</a></div></div>
				<div class="col-lg-4"></div>
			</div>
			<?php
		}		
		
	}
	
?>
	</div>
</body>
</html>