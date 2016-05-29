
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<link href="estiloinicio.css" rel="stylesheet"> 
    <?php 
    include('includes/modelo.class.php');
    $con = new Modelo();
    if (isset($_REQUEST['id'])) {

    	 $hospedaje = $con->getHospedajeWithId($_REQUEST['id']);
    	 $nombre = $con->getNombreLocalidad($hospedaje['id_localidad']); 
    } ?>

</head>
<body>
<body>
		<form   action="login.php" method="post" class="form-inicio">
        		
			<h1 class="form-titulo"> <?php echo $hospedaje['nombre']; ?>  </h1> 						
			<h3 align="center"> <?php echo $hospedaje['descripcion']; ?> </h3>
			<h3 align="center"> <?php echo "Situado en: "; echo $nombre; ?> </h3>
			<div align="center"><img width="500" height="500" src="<?php echo $hospedaje['foto']; ?>" ></div> 
			<h3 align="center"> <?php echo "Precio por noche: $"; echo $hospedaje['precio']; ?> </h3> 
			<br>
			<br>

		</form>									
		<?php echo "<input type='button' value='Volver al Home' onClick='history.go(-1)'>" ?>						
</body>
</html>

