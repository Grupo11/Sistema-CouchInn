<?php 
session_start();
include('includes/modelo.class.php');
include('includes/header.php');
$con = new Modelo();
$user = $con->getUser($_SESSION['id']);
if(isset($_SESSION['id']) && isset($_POST['edit'])){
    $nuevo = $user;
    $nuevo['nombre'] = $_POST['nombre'];
    $nuevo['apellido'] = $_POST['apellido'];
     $nuevo['telefono'] = $_POST['telefono'];
      $nuevo['localidad'] = $_POST['localidad'];
    $nuevo['user'] = $user['user'];
    $nuevo['password'] = $user['password'];

    //$nuevo['tarjeta_credito'] = $_POST['tarjeta'];
    //$nuevo['user'] = $_POST['usuario'];
    $resp = $con->actualizarUsuario($user, $nuevo);
    if(empty($resp)){
        header("Location: Perfil.php");
        die;
    }
}
if (isset($_SESSION['id'])){
?>


 <div class="container">
 <div class="row">
    <?php if(isset($resp)){?>
        <p><?php echo $resp ?></p>
    <?php }else{ echo '<br>'; } ?>
    <form class="col s12" method="post">
        <input type="hidden" name="edit" value="." />
    <div class="card-panel">
        <h5><!--<i class="material-icons">person_pin</i>--> Informacion Personal
         <a href="updateProfile.php"><i class="white-text material-icons right tooltipped" data-position="right" data-delay="30" data-tooltip="Modificar tus datos personales"><!--mode_edit--></i></a></h5>
         <br>
        <!--<li class="divider"></li><br>-->
          <div class="row">
            <div class="input-field col s6">
              <input required placeholder="Nombre" id="nombre" type="text" name="nombre" class="validate" value="<?php echo $user['nombre']; ?>" />
              <label for="nombre">Nombre</label>
            </div>
            <div class="input-field col s6">
              <input required placeholder="Apellido" id="apellido" type="text"data-delay="30" name="apellido" class="validate" value="<?php echo $user['apellido']; ?>" />
              <label for="apellido">Apellido</label>
            </div>
             <div class="input-field col s6">
              <input required placeholder="Localidad" id="localidad" type="text"data-delay="30" name="localidad" class="validate" value="<?php echo $user['localidad']; ?>" />
              <label for="localidad">Localidad</label>
            </div>
             <div class="input-field col s6">
              <input required placeholder="Telefono" id="telefono" type="text"data-delay="30" name="telefono" class="validate" value="<?php echo $user['telefono']; ?>" />
              <label for="telefono">Telefono</label>
            </div>
          </div>
          <div class="row">
            <!--<div class="input-field col s12">
              <input required placeholder="Usuario" id="usuario" type="text" name="usuario" class="validate"  value="<?php echo $user['user']; ?>" />
              <label for="usuario">Usuario</label>
            </div>-->
          </div>
          <div class="row">
            <!--<div class="input-field col s12">
              <input required placeholder="0000-0-0-000-000" id="tarjeta" type="text" name="tarjeta" class="validate" value="<?php echo $user['tarjeta_credito']; ?>" />
              <label for="tarjeta">Tarjeta de crádito</label>
            </div>-->
          </div>
        </div>
        <br><br><br>

   <!-- <div class="card-panel">
        <h5><!--<i class="material-icons"><!--email</i>--><!-- Informacion de Contacto <a href="updateProfile.php"><i class="white-text material-icons right tooltipped" data-position="right" data-delay="30" data-tooltip="Modificar tus datos personales"><!--mode_edit--></i></a></h5>
        <!--<li class="divider"></li><br>-->
         <!-- <div class="row">
            <div class="input-field col s12">
              <input required placeholder="Email" id="email" type="email" name="email" class="validate" value="<?php echo $user['user']; ?>" />
              <label for="email">Email</label>
            </div>
          </div>
      </div>-->
 <div class="row">
 <style type="text/css">
     input {background-color:#22335E  ;color:white;}</style> <input  type="reset"  class="col s12 btn waves-effect waves-light red lighten-1"  name="cancelar modif" value="Cancelar" /> </input>
     <input  type="submit"  class="col s12 btn waves-effect waves-light red lighten-1"  name="cancelar modif" value="Actualizar" /> </input>
    <br>
    <br>
    <br>
    <br><br><br><br>
   
        <a class="btn red" align="center" href="javascript:history.go(-1)" style="color: #22335E">Ir Atras</a>
    <a class="btn red" align="center" href="index.php" style="color: #22335E">Ir Inicio</a>
    
  
      
    
     
</div>
 </form>
</div>
</div>


<?php
}else{
?>
<div class="center">
    <h3 class="center red-text">ERROR</h3>
    <h5 align="center" class="center red-text"> DEBES ESTAR LOGEADO PARA VER ESTA PAGINA </h5>
    <br><img src="img/error.png" width="250px"></img><br><br><br><a class="btn red" href="index.php">PAGINA PRINCIPAL</a><br><br></div> 
</div>
<?php
}
