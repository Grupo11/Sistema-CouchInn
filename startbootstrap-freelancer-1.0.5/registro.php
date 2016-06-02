<?php
	session_start();
	include('includes/modelo.class.php');
	if(isset($_POST['user'])){
	$con = new Modelo();
	
	$res = $con->crearUsuarioNuevo($_POST['password'],$_POST['localidad'],$_POST['user'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono']);
	if ($res == "Se creo el usuario exitosamente" ){
		header("Location: usuariocreado.php");
	}else{
		?><p class="center red-text">ERROR: <?php echo $res ?></p><?php
	}
}
?>
<!DOCTYPE html>
<head>
	 <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/-->

   <link href="estiloinicio.css" rel="stylesheet">


	<title>Formulario de registro</title>
</head>
<body>
 	
 		<form  method="post" class="form-registro" name="registro">

                 	<h2 class="form-titulo">Bienvenido a CouchInn</h2>
								
									<div class="contenedor-inputs">
									<input align="center" id="nombre" type="text" name="nombre" placeholder="Nombre" class="input-48" required>
									
									<br>
									
									<input align="center" id="apellido" type="text" name="apellido" placeholder="Apellido" class="input-48" required>
									
									<br>
									
									<input align="center" id="user" type="email" name="user" placeholder="Correo Electrónico" class="input-48" required>
									
									<br>
								
									<input align="center" id="password" type="password" name="password" placeholder="Contraseña" class="input-48" required>
									
									<br>
								
									<input align="center" id="localidad" type="text" name="localidad" placeholder="Localidad" class="input-48" required>
									
									<br>
									
									 <input align="center" id="telefono" type=""   name="telefono" placeholder="Telefono" class="input-100" required>
									
									<br>
								
									
									
									<button class="btn-enviar" type="submit" name="action">Registrar
									
									</button>
									<br>
									<p class="form-link">¿Ya tienes una cuenta?
									<a href="login.php">Ingresa aquí</a></p>
									<br>
									<br>
									<p class="red-text text-darken-2 center">Al registrarme, declaro que soy mayor de edad y acepto los Términos y Condiciones y las Políticas de Privacidad de CouhInn.</p>
									<?php echo "<input type='button' value='Volver al Home' onClick='history.go(-1);'>"?>;
									
					</div>
        		</div>
        	</div>
        </div>
       		
       
 



</form>
<script src="validar.js"></script>


</body>
</html>