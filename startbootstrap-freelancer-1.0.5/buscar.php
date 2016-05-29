<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="estiloinicio.css" rel="stylesheet">
</head>
<?php 

session_start();


include('includes/modelo.class.php');

$con = new Modelo();
$tipos = $con->getAllTypes();
$localidades = $con->getLocalidades();

         
if ( (isset($_REQUEST['tipo'])) and (isset($_REQUEST['loc'])) ){

	$id_tipo = $con->getIdTipo($_REQUEST['tipo']);
	$localidad = $con->getIdLocalidad($_REQUEST['loc']);
	$hospedajes = $con->getHospedajesWith($id_tipo,$localidad);
 ?>

     
     <h1 class="red-text" align="center" style="font-weight: 900;">RESULTADOS DE LA BÚSQUEDA</h1>

     <?php foreach( $hospedajes as $hospedaje ){ ?>

       <form class="form-inicio" >

         <a href="verDetalle.php?id=<?php echo  $hospedaje['id'] ?>">

         <h1 class="form-titulo"> <?php echo $hospedaje['nombre']; ?>  </h1> 
         <h3 align="center"><img src="<?php echo $hospedaje['foto']; ?>" alt="" class="circle" width="600" height="400"></h3>
     	
     	 <br>
       </form>

     	<?php } ?>

    </html>
	<?php } else { ?>


<body>

<body>
		<form   action="" method="post" class="form-inicio">
        	
			<h1 class="form-titulo"> Búsqueda </h1>
									
			<div class="contenedor-inputs">

			<input class="centrado" align="center" list="tipo" name="tipo" placeholder="Seleccionar Tipo" required=""> 
			 <datalist id="tipo">
			    <?php foreach( $tipos as $tipo ){ ?>
					<option value="<?php echo $tipo['nombre']; ?>"><?php echo $tipo['nombre']; ?></option>
					<?php } ?>
			 	
			 </datalist>
           
             <input class="centrado" align="center" list="loc" name="loc" placeholder="localidad" required="">
             <datalist id="loc">
                 <?php foreach ($localidades as $localidad ){ ?>

                     <option value="<?php echo $localidad['nombre']; ?>"><?php echo $localidad['nombre']; ?></option>
                 <?php } ?>
             </datalist>
			<br>
			<br>
			<input class="btn-ingresar" type="submit" name="action" value="Buscar">
			<br>
			<br>

</body>
</html>
<?php } ?>