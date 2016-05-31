
 <?php 


if(isset($_POST['nuevoTipo'])){
    $con->addType($_POST['nuevoTipo']);
}

if(isset($_GET['delTipo'])){
    echo $_GET['delTipo'];
    $con->removeType($_GET['delTipo']);
    header("Location: menuadmin.php"); 
}


$tipos = $con->getAllTypes(); ?>


<ul class="collection">
   
    <?php foreach ($tipos as $tipo) { ?>
        <div class="card-panel white-text" style="height:28px; width:700px" >
            <div align="" style="float: left;height:28px; width:200px">
            <a class=""><?php echo $tipo['nombre'] ?></a>
            </div>


             <div align="" style="float: left">
             <a href="menuadmin.php" onclick="deleteTipo(this,<?php echo $tipo['id']; ?>,<?php echo $tipo['items']; ?>); return false;">Eliminar</a> 

             </div>
              
            <br>
            <br>
         </div>
    <?php }?>

    <br>
<br>
<div class="col s12 center">
    <form method="post" action="menuadmin.php#tipos">
        <div class="input-field" style="float: left">
            <input name="nuevoTipo" id="nuevoTipo" placeholder="Nombre" type="text" maxlength="45" required="" />
            <button href="#" class="btn waves-effect waves-light red lighten-1" type="submit">Agregar</button>
        </div>
        
    </form>
</div>
   
</ul>

<script type="text/javascript">
    function deleteTipo(element,id,items){
        if(!items){
            if(confirm("Seguro desea borrar el tipo?")){
                $.get('menuadmin.php?delTipo='+id);
                $(element).parent().slideUp();
            }
        }else{
            alert("Existen hospedajes asociados al tipo, no puede ser borrado.")
        }
    }
</script>

