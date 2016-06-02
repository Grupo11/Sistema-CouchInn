
 <?php 

if(isset($_POST['nuevoTipo'])){
    $resp = $con->addType($_POST['nuevoTipo']);
}

if(isset($_GET['delTipo'])){
    $con->removeType($_GET['delTipo']); 
}

$tipos = $con->getAllTypes(); ?>

 <?php if(isset($resp)){  
    if($resp != "" ){ ?>

        <div  class="modal-content" align="center">
        <a class="red-text tooltipped modal-trigger">
         <h4>El tipo ingresado ya se encuentra cargado </h4> 
         </a>
         </div>
        <div align="center"><a href="menuadmin.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a></div>
      <?php } //else{ echo '<br>'; } ?> 
    <?php } //else{ echo '<br>'; } ?>


 <form method="post" action="menuadmin.php#tipos">
        <div class="input-field" style="height:28px; width:400px" align="center">
            <input name="nuevoTipo" id="nuevoTipo" placeholder="Ingrese el nombre del nuevo tipo" type="text" maxlength="45" required="" style="text-align: center;" />
            <button href="#" class="btn waves-effect waves-light red lighten-1" type="submit" style="float: left;">Agregar</button>
        </div>        
</form>


<ul class="collection">
   
    <?php foreach ($tipos as $tipo) { ?>

        <div class="card-panel white-text" >

            <div align="" style="float: left;height:28px; width:200px">
            <a class=""><h5><?php echo $tipo['nombre'] ?></h5></a>
            </div>

             <?php 
            $id= $tipo['id'];
            $items= $tipo['items'];
             ?>
             <div align="" style="float: left;height:28px; width:200px">
            
             <a class="red-text tooltipped modal-trigger" data-position="bottom" data-delay="30" data-toggle="modal" data-target="#Eliminarr" data-tooltip="Eliminar tipo" href="#Eliminarr" >Eliminar</a>
             
             </div>

             
             <div class="red-text" align="" style="float: left">
             <?php $id= $tipo['id']; ?>
             <a href="updatetipo.php?id=<?php echo $id ?>">Modificar</a> 

             </div>
              
            <br>
            <br>
        </div>
    <?php }?>

    <br>
<br>
</ul>

<div id="Eliminarr" class="modal" style="height: 150;width: 600">
         <?php
          if (($items)!= 0) {
            ?>   <div  class="modal-content" align="center" > <h4>No es posible eliminar el tipo: existen hospedajes asociados al mismo </h4> </div>
                 <a href="menuadmin.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
           <?php } else{ ?>
            <div  class="modal-content" align="center" > <h4>Eliminar tipo </h4> </div>
        
            <div align="right" style="float: right;"><a href="menuadmin.php" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar </a></div>
            <div align="right"><a href="menuadmin.php?delTipo=<?php echo $id ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Eliminar</a></div>
            
        <!-- </div> -->
         <?php } ?>
    </div>
</div>

<!-- <div  style="height: 150;width: 600"> -->
   
  
<!-- </div> -->

