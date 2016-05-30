<?php 
session_start();
include('includes/modelo.class.php');
include('includes/header.php');

$con = new Modelo();

if (isset($_SESSION['id'])){
?>

<div class="row">
	<div class="col s12">
	  <ul class="tabs">
		<!--<li class="tab"><a href="#MiCuenta">Cuenta</a></li>
		<li class="tab"><a href="#MisSubastas">Subastas</a></li>
		<li class="tab"><a href="#MisOfertas">Ofertas</a></li>-->
	  </ul>
	</div> 
	<div id="MiCuenta" class="col s12"><br> <?php include('MiCuenta.php'); ?></div>
	

</div>
  
<?php
}else{
?>

<div class="center" class="col s12 center-align" align="center">
	<h3 class="center red-text" align="center">ERROR</h3>
	<h5 class="center red-text" align="center"> DEBES ESTAR LOGEADO PARA VER ESTA PAGINA </h5>
	<br><img align=center style="float:center;" src="img/error.png"  width="150px"></img><br><br><br><a class="btn red" align="center" href="index.php">PAGINA PRINCIPAL</a><br><br> 
	<br>
	<!--<?php //echo "<input type='button' value='Volver al Home' onClick='history.go(-1);'>"?>-->
									
</div>
<?php

}?>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>