<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
		<script src="jquery/jquery-1.11.3.js"></script>

<?php 
session_start();
include('includes/modelo.class.php');
include('includes/header.php');

$con = new Modelo();
$localidades = $con->getLocalidades();
$tipos = $con->getAllTypes();

if (isset($_SESSION['id']) && ($_SESSION['admin'])){


?>
   <div class="row">
	<div class="col s12">
	  <ul class="tabs">
		  <li class="tab"><a href="#tipos">Tipos</a></li>
		<li class="tab"><a href="#">Hospedajes</a></li>
	  </ul>
	</div> 
	<div id="tipos" class="col s12"><br> <?php include('tipos.php'); ?></div>
	                             
 <?php } ?>
                        
 <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
		<script src="scripts/main.js"></script>                           
  


   



