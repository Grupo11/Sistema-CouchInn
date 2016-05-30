<?php $usuario = $con->getUser($_SESSION['id']); ?>
<head>
	

</head>


<div class="container">
	<div class="card-panel red lighten-2 white-text">
		<h5><!--<i class="material-icons">person_pin</i>--> Informacion Personal  <!--<a href="updateProfile.php"><i class="white-text material-icons right tooltipped" data-position="right" data-delay="30" data-tooltip="Modificar tus datos personales"><!--mode_edit--><!--</i></a>--></h5>
		<!--<li class="divider"></li><br>-->
		<div class="row">
			<div class="col s12 " align="center">
			<span><b>Nombre:</b> <?php echo $usuario['nombre'];?></span>
			<br>
			<span><b>Apellido:</b> <?php echo $usuario['apellido'];?></span><br>
			<span><b>Localidad:</b> <?php echo $usuario['localidad'];?></span>
			<br>
			<span><b>Telefono:</b> <?php echo $usuario['telefono'];?></span>
			<br>
			<span><b>Usuario:</b> <?php echo $usuario['user'];?></span>
			<br>
			<span><b>Contraseña:</b> **** </span>
			<div class="col s12 ">
			<br>
			<!--<span><b>Tarjeta de Credito:</b> <?php echo $usuario['tarjeta_credito'];?></span>-->
			</div>
		</div>
	</div>
	<div class="card-panel red lighten-2 white-text">
	    <!--<li class="divider"></li>-->
		<h5><i class="material-icons"><!--email--></i> Informacion de Contacto <a href="updateProfile.php"><i class="white-text material-icons right tooltipped" data-position="right" data-delay="30" data-tooltip="Modificar tus datos personales"><!--mode_edit--></i></a></h5>
		
		<div class="row">
			<div class="col s12 m6">
			<span><b>Email:</b> <?php echo $usuario['user'];?></span>
			<br>
			<br>
			</div>
		</div>
	</div>
	<div class="row center-align valign">
		<div class="col s6 m4">
		<a  class="red-text tooltipped"  data-position="bottom" data-delay="30" data-tooltip="Modificar tus datos personales" href="updateProfile.php"><u style="color:rgb(12, 15, 103  );">Editar Datos</u></a>
		<br>
		<br>
		</div>
		<div class="col s6 m4" >
		<a class="red-text tooltipped" type="button" data-position="bottom" data-delay="30" data-tooltip="Modificar unicamente tu contraseña" href="updatePassword.php"><u style="color:rgb(12, 15, 103   );">Editar Contraseña</u></a>
		</div>
		<div class="col s12 hide-on-med-and-up">
		<br>
		</div>
		<div class="col s12 m4 valign" >
		<a class="red-text tooltipped modal-trigger" data-position="bottom" data-delay="30" data-toggle="modal" data-target="#Eliminar" data-tooltip="Eliminar tu cuenta" href="#"><u style="color:rgb(12, 15, 103    );">Eliminar Cuenta</u></a>
		<br>
		<br>
		   <a class="btn red" align="center" href="index.php" style="color: #22335E">Ir Inicio</a>						
		</div>
	</div>
	
	<div id="Eliminar" class="modal">
	
		<div class="modal-content">
		
			<h4>Eliminar cuenta </h4>
			<p>¿Estas seguro de eliminar tu cuenta en CouchInn? Todavia tenemos mucho que ofrecerte!<br><br> No podrás loguearte con el mismo usuario. Esta accion no se puede deshacer.<br><br></p>
		</div>
		<div class="modal-footer">
		    <style type="text/css">
            input {background-color:#22335E  ;color:white;}</style>  <input  type="submit" action="eliminarCuenta.php"  class="col s12 btn waves-effect waves-light red lighten-1"  name="cancelar modif" onclick="location='index.php'"  value="Cancelar" /> </input>
            <input  type="submit"  onclick="location='eliminarCuenta.php'" class="col s12 btn waves-effect waves-light red lighten-1"  name="eliminar" value="Eliminar de todas formas" /> </input>
		</div>
	</div>

	
</div>


<!--<a href="#cancelar" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a> Esto crea un botoncito etiqueta <a> que al pasarle el mouse por encima le pone una rayita-->