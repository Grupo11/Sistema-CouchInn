<?php 
session_start();
include('includes/modelo.class.php');
include('includes/header.php');
$con = new Modelo();
$user = $con->getUser($_SESSION['id']);
if(isset($_SESSION['id']) && isset($_POST['edit'])){
  $resp = '';
  if( $user['password'] != $_POST['pass'] ){
    $resp .= 'Contraseña incorrecta.' . PHP_EOL;
  }else if( $_POST['newpass'] != $_POST['repeticion'] ){
    $resp .= 'Las nuevas contraseñas no coinciden.' . PHP_EOL;
  }else{
    $nuevo = $user;
    $nuevo['password'] = $_POST['newpass'];
    $resp .= $con->actualizarUsuario($user, $nuevo);
    if(empty($resp)){
        header("Location: Perfil.php");
        die;
    }
  }
}
if (isset($_SESSION['id'])){ ?>
  <div class="container">
   <div class="row">
      <?php if(isset($resp)){?>
          <p class="center"><?php echo $resp ?></p>
      <?php }else{ echo '<br>'; }?>
      <form class="col s12" method="post">
        <input type="hidden" name="edit" value="" />
        <div class="card-panel">
        <br>
          <h5><!--<i class="material-icons">person_pin</i>--> Editar contraseña</h5>
          <!--<li class="divider"></li><br>--><br><br><br>
          <div class="row">
            <div class="input-field col s12">
              <input required id="pass" type="password" name="pass" class="validate" />
              <label for="pass">Tu contraseña actual</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input required id="newpass" type="password" name="newpass" class="validate" />
              <label for="newpass">Tu nueva contraseña</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input required id="repeticion" type="password" name="repeticion" class="validate" />
              <label for="repeticion">Tu nueva contraseña nuevamente</label>
            </div>
          </div>
        </div>
          <br><br><br>
        <div class="row">
         <style type="text/css">
     input {background-color:#22335E  ;color:white;}</style> <input  type="reset"  class="col s12 btn waves-effect waves-light red lighten-1"  name="cancelar modif" value="Cancelar" /> </input>
     <input  type="submit"  class="col s12 btn waves-effect waves-light red lighten-1"  name="cancelar modif" value="Actualizar" /> </input>
    <br>
    <br>
    <br>
    <br><br>
   
    <a class="btn red" align="center" href="javascript:history.go(-1)" style="color: #22335E">Ir Atras</a>
    <a class="btn red" align="center" href="index.php" style="color: #22335E">Ir Inicio</a>
  
           </div>
      </form>
    </div>
  </div>
<?php
}else{
?>
<div class="center" align="center">
    <h3 class="center red-text">ERROR</h3>
    <h5 class="center red-text"> DEBES ESTAR LOGEADO PARA VER ESTA PAGINA </h5><br>
    <br><img src="img/error.png" width="250px"></img><br><br><br><a class="btn red" href="index.php">PAGINA PRINCIPAL</a><br><br></div> 
</div>
<?php
}