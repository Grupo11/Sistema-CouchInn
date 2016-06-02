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
		<p align=center>Esperamos que hayas disfrutado el servicio de CouchInn<br>No dudes en visitarnos de nuevo</p>
		<br>
	</div>
</div>
  
<?php
}else{
?>
<div class="center">
	<h3 class="center red-text">ERROR</h3>
	<br><img src="img/Error.jpg" width="250px"></img><br><a class="btn red" href="index.php">PAGINA PRINCIPAL</a><br><br></div> 
</div>
<?php
}
