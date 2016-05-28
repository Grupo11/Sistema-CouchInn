<?php 

session_start();


include('includes/modelo.class.php');

$con = new Modelo();
$tipos = $con->getAllTypes();

         
if ( (isset($_REQUEST['tipo'])) and (isset($_REQUEST['precio'])) ){
	$id_tipo = $con->getIdTipo($_REQUEST['tipo']);
	$precio = ($_REQUEST['precio']);
	$hospedajes = $con->getHospedajesWith($id_tipo,$precio);
 ?>

     <?php include('includes/header.php'); ?>
     <p class="red-text" align="center" style="font-weight: 900;">RESULTADOS DE LA BÚSQUEDA</p>

     

     <?php foreach( $hospedajes as $hospedaje ){ ?>

     	<div class="container">

     	<img style="float:left;" src="<?php echo $hospedaje['foto']; ?>" alt="" class="circle" width="200" height="150">
        <br>
        
     	<?php 
     	 echo "NOMBRE:";
     	 echo $hospedaje['nombre']; ?>
     	 <br>
     	 <?php 
     	 echo "PRECIO:";
     	 echo $hospedaje['precio'];
        ?>
        <br>
     	 <?php 
     	 echo "DESCRIPCIÓN:";
     	 echo $hospedaje['descripcion'];
        ?>
     
     	</div>
     	 <br>

     	<?php
     	}  
     ?>

   

     </html>

    	
	
	
	<?php
	 } else { 

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
        
          
               			
			<h1 class="form-titulo"> Búsqueda </h1>
									
			<div class="contenedor-inputs">

			<input class="centrado" align="center" list="tipo" name="tipo" placeholder="Seleccionar Tipo" required=""> 
			 <datalist id="tipo">
			    <?php foreach( $tipos as $tipo ){ ?>
					<option value="<?php echo $tipo['nombre']; ?>"><?php echo $tipo['nombre']; ?></option>
					<?php } ?>
			 	
			 </datalist>
            <br>
			<br>
            <input class="centrado" list="precios" name="precio" placeholder="Seleccionar Precio" required=""> 
            <datalist id="precios" class="centrado">
                <option>Hasta $500</option>
                <option>Hasta $1000</option>
                <option>Hasta $1500</option>
                <option>Hasta $2000</option>
                <option>Desde $2000</option>
                <option>Desde $500</option>
            </datalist>
			<br>
			<br>
			<input class="btn-ingresar" type="submit" name="action" value="Buscar">
			<br>
			<br>

			
 
									
								


</body>
</html>
<?php } ?>