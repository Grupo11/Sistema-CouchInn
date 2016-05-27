<?php 

session_start(); 


include('includes/modelo.class.php');

if(isset($_REQUEST['user'])){ 

	$con = new Modelo();

	if( $user = $con->verifyUser($_REQUEST['user'],$_REQUEST['password'])){
		if ( $user['deleted'] != 1 ){
		$_SESSION['user'] = $_REQUEST['user'];
		$_SESSION['id'] = $user['id'];
		$_SESSION['admin'] = $user['admin'];
		header("Location: index.php");
		}else{
			?><div class="center red-text" ><br> Este usuario fue eliminado </div> <?php
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="estiloinicio.css" rel="stylesheet">


</head>
<body>

<body>
		<form   action="" method="post" class="form-inicio">
        
          
               			
			<h1 class="form-titulo"> Iniciar Sesion</h1>
									
			<div class="contenedor-inputs">

			<input align="center" type="text" class="input-48" name="NombreUsuario" id="" placeholder="Username">
			<br>
			<input align="center" type="password" class="input-48" name="Password" id="" placeholder="Contraseña">
			<br>
			<br>
			<input class="btn-ingresar" type="submit" name="action" value="Ingresar">
			<br>
			<br>

			<a class="centrado" align="center" href="register.php">Registrarse</a> 
			<a class="centrado" align="center" href="recuperarPassword.php">Recuperar contraseña</a> 
			<a class="centrado" href="Ayuda.php">Ayuda</a>

									
								


</body>
</html>