<?php 
session_start();
include('includes/modelo.class.php');
include('includes/header.php');
$con = new Modelo();
//$tipo=$con->getTipo($_REQUEST['id']);
 $id=$_REQUEST['id'];
   $nombre = $con->getNombreTipo($id);
if (isset($_REQUEST['id'])) {
  $id=$_REQUEST['id'];
  $nombre = $con->getNombreTipo($id);
 
  }

if( isset($_POST['edit'])){
    //$nuevo['nombre']=$nombre;
    //$nuevo['id']=$id;//lo carga con los datos que ya tenia el viejo
    $nuevonombre = $_POST['nombre'];

    //$nuevo['tarjeta_credito'] = $_POST['tarjeta'];
    //$nuevo['user'] = $_POST['usuario'];
    $resp = $con->actualizarTipo($nombre, $nuevonombre,$id);
  
    if(empty($resp)){
        header("Location: menuadmin.php");
        die;
    }
}
//if (isset($_SESSION['id'])){
?>


 <div class="container">
 <div class="row">
    <?php if(isset($resp)){?>
        <div  class="modal-content" align="center">
        <a class="red-text tooltipped modal-trigger">
         <h4>El tipo ingresado ya se encuentra cargado </h4> 
         </a>
         </div>
        <div align="center"><a href="menuadmin.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a></div>
    <?php }else{ echo '<br>'; } ?>
    
    <form class="col s12" method="post">
        <input type="hidden" name="edit" value="." />
    <div class="card-panel">
        <h5><!--<i class="material-icons">person_pin</i>--> Informacion del Tipo de Hospedaje
         <a href="updateProfile.php"><i class="white-text material-icons right tooltipped" data-position="right" data-delay="30" data-tooltip="Modificar tus datos personales"><!--mode_edit--></i></a></h5>
        <li class="divider"></li><br>
          <div class="row">
            <div class="input-field col s6">
              <label for="nombre">Nombre</label>
              <input required placeholder="Nombre" id="nombre" type="text" name="nombre" class="validate" value="<?php echo "$nombre"; ?>" />
              
            </div>
          
 <div class="row">
     <input  type="reset"  class="col s12 btn waves-effect waves-light red lighten-1"  name="cancelar modif" value="Cancelar" />
    <button href="#" class="col s12 btn waves-effect waves-light red lighten-1" type="submit">Actualizar</button>
    <br>
    <br>
    <br>
    <?php echo "<input type='button' value='Volver al Home' onClick='history.go(-1);'>"?>
    
     
</div>
 </form>
</div>
</div>