<?php 
session_start();
include('includes/modelo.class.php');
$con = new Modelo();
if (isset($_SESSION['id'])){
	$id= $_SESSION['id'];
	$con->deleteUser($id);
	session_destroy();
	$_SESSION = array();
	include('includes/header.php');
	?>

<div class="row">
 	

	<div align=center class="col s12 center-align"><br>
		<h4 class="red lighten-2 white-text z-depth-1">Cuenta Eliminada</h4>
		<br>
		<img src="img/caritaTriste.gif" width="100px"></img>
		<p align=center>¡Es una pena que te vayas!</p>
		<p align=center>Esperamos que hayas disfrutado el servicio de CouchInn.<br>No dudes en visitarnos de nuevo.</p>
		<br>
	</div>
</div>
  
<?php
}else{
?>
<div class="center" align="center">
	<h3 class="center red-text" align="center">ERROR</h3>
	<h5 class="center red-text" align="center"> DEBES ESTAR LOGEADO PARA VER ESTA PAGINA </h5>
	<br><img src="img/error.png" align="center" width="250px"></img><br><br><br><a class="btn red" align="center" href="index.php">PAGINA PRINCIPAL</a><br><br></div> -->
</div>
<?php
}
