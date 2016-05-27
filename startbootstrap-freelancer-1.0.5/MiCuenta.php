<?php $usuario = $con->getUser($_SESSION['id']); ?>
<head>
	

</head>


<div class="container">
	<div class="card-panel red lighten-2 white-text">
		<h5><!--<i class="material-icons">person_pin</i>--> Informacion Personal <a href="updateProfile.php"><i class="white-text material-icons right tooltipped" data-position="right" data-delay="30" data-tooltip="Modificar tus datos personales"><!--mode_edit--></i></a></h5>
		<li class="divider"></li><br>
		<div class="row">
			<div class="col s12">
			<span><b>Nombre:</b> <?php echo $usuario['nombre'];?></span>
			<br>
			<span><b>Apellido:</b> <?php echo $usuario['apellido'];?></span>
			</div>
			<div class="col s12">
			<br>
			<span><b>Usuario:</b> <?php echo $usuario['user'];?></span>
			<br>
			<span><b>Contraseña:</b> **** </span>
			</div>
			<div class="col s12 ">
			<br>
			<!--<span><b>Tarjeta de Credito:</b> <?php echo $usuario['tarjeta_credito'];?></span>-->
			</div>
		</div>
	</div>
	<div class="card-panel red lighten-2 white-text">
		<h5><i class="material-icons"><!--email--></i> Informacion de Contacto <a href="updateProfile.php"><i class="white-text material-icons right tooltipped" data-position="right" data-delay="30" data-tooltip="Modificar tus datos personales"><!--mode_edit--></i></a></h5>
		<li class="divider"></li><br>
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
		<a  class="red-text tooltipped" data-position="bottom" data-delay="30" data-tooltip="Modificar tus datos personales" href="updateProfile.php"><u>Editar Datos</u></a>
		<br>
		<br>
		</div>
		<div class="col s6 m4" >
		<a class="red-text tooltipped" type="button" data-position="bottom" data-delay="30" data-tooltip="Modificar unicamente tu contraseña" href="updatePassword.php"><u>Editar Contraseña</u></a>
		</div>
		<div class="col s12 hide-on-med-and-up">
		<br>
		</div>
		<div class="col s12 m4 valign" >
		<a class="red-text tooltipped modal-trigger" data-position="bottom" data-delay="30" data-toggle="modal" data-target="#Eliminar" data-tooltip="Eliminar tu cuenta" href="#"><u>Eliminar Cuenta</u></a>
		<br>
		<br>
		<?php echo "<input type='button' value='Volver al Home' onClick='history.go(-1);'>"?>
									
		</div>
	</div>
	
	<div id="Eliminar" class="modal">
	hol
		<div class="modal-content">
		holaaaa
			<h4>Eliminar cuenta </h4>
			<p>¿Estas seguro de eliminar tu cuenta en CouchInn? Todavia tenemos mucho que ofrecerte!.<br><br>Si nos dejas, tus subastas activas se cancelaran y tus ofertas se tomaran como invalidas. Ademas no podrás loguearte con este nombre de usuario si te arrepientes y tu progreso se perdera. Esta accion no se puede deshacer<br><br></p>
		</div>
		<div class="modal-footer">
			<a href="#cancelar" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
			<a href="eliminarCuenta.php" class="modal-action modal-close waves-effect waves-red btn-flat">Eliminar de todas formas</a>
		</div>
	</div>
	<div id="cancelar" class="modal hide fade in" style="display: none; "> <!-- ESTA PARTE LO AGREGUE YO (VICKY)-->
								<div class="modal-body">
									<h4>Aviso</h4>	      
									<p> Esta seguro que desea Cancelar? </p>
								</div>
								<div class="modal-footer">
									<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
									<a class="btn btn-danger"  href="updatePassword.php">Aceptar</a>
								</div>
	</div>
	
</div>