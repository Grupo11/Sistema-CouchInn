<?php
session_start();
require("includes/PHPMailer/class.phpmailer.php");
include("includes/modelo.class.php");
$con = new Modelo();
$recover = false;
if(isset($_SESSION['id'])){
    header("Location: index.php");
    die;
}
if(isset($_POST['Recuperar'])){
  
    $user = $con->getUserByEmail($_POST['user']);
    if((!$user) ||  ($user['deleted'] == 1)){
    
     
        $mje = '<script background-color:red>alert("El mail ingresado no existe")</script>';//'El email ingresado no existe';
    }
   
    else{
      $link ='http://127.0.0.1/Sistema-CouchInn/startbootstrap-freelancer-1.0.5/recuperarpassword.php?token='.$user['token'];//'http://127.0.0.1/Sistema-CouchInn/startbootstrap-freelancer-1.0.5/recuperarpassword.php?token='.$user['token'];
       /* $mail = new PHPMailer();
        $mail->Username = "info.couchinn@gmail.com";
        $mail->Password = "couchinn1234"; 
        $mail->AddAddress($user['user']);
        $mail->SetFrom('info.couchinn@gmail.com','Couchinn');
        $mail->Subject = 'Couchinn: Reestablecer Clave';
        $mail->Body    = 'Para reestablecer su clave de acceso por favor ingrese a este enlace: '."\n".$link; 
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        if($mail->Send()){
            $mje = 'El email ha sido enviado';
        }else{
            $mje = 'El email no pudo ser enviado';
        } */
       $mensaje='Para reestablecer su clave de acceso por favor ingrese a este enlace: '."\r\n"."\r\n".$link  ;
        
        file_put_contents("mailRecuperacionContraseña.txt", $mensaje);
        $mje='<script>alert("El mail ha sido enviado")</script>';//"El mail ha sido enviado";
    }

}
if(isset($_GET['token'])){
    $user = $con->getUserByToken($_GET['token']);
    $recover = true;
}
if(isset($_POST['recover'])){
    $recover = true;
    $mje = '';
    if( $_POST['pass'] != $_POST['repeticion'] ){
        $mje .= 'Las nuevas contraseñas no coinciden.' . PHP_EOL;
    }else{
        $user = $con->getUserByToken($_POST['recover']);
        $nuevo = $user;
        $nuevo['password'] = $_POST['pass'];
        $resp = $con->actualizarUsuario($user, $nuevo);
        $mje .= 'Su contraseña ha sido actualizada. <a href="Login.php">Ingresar</a>' . PHP_EOL;
    }
}

?>
<head>
  
<style type="text/css">
  </style>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
   <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
     <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<div class="container">
   <div class="row">
      <?php if(isset($mje)){?>
          <p class="center red-text"><?php echo $mje ?></p>
      <?php }else{ echo '<br>';}
      if(!$recover){ ?>
      <form class="col s12" method="post">
        <input type="hidden" name="edit" value="" />
        <div class="card-panel">
        <body id="page-top" class="index">

    <!-- Navigation -->
    <div class="c-fondocouchinn navbar-default ">
    <!--<nav class="navbar navbar-default navbar-fixed-top">-->
        <div class="container">
          
              <a class="brand-logo" href="#page-top">
                <h1 class="color" style="color: white"> Recuperar Contraseña</h1> 

              
                <img   src="img/llaves.png" alt="logo" style="float:left" width="100" height="100">
             </a> 
            </div>

            </div>
            </body>
          <!--<h5> Reestablecer contraseña</h5>-->
          <br>
          <p>Para reestablecer su contraseña ingrese su dirección de correo electrónico para que le enviemos un enlace de recuperación. </p><br><br>
            <div class="row">
            <div class="input-field col s12">
              <input required id="user" type="user" name="user" class="validate" />
              <label for="user">Correo asociado a su cuenta</label>
            </div>
          </div>

          <!--<p>Para reestablecer su contraseña ingrese su dirección de correo electrónico para que le enviemos un enlace de recuperación.</p>
          <!--<div class="row">
            <div class="input-field col s12">
              <input required id="user" type="user" name="user" class="validate" />
              <label for="user">Correo asociado a su cuenta</label>
            </div>
          </div>-->
          <br> <br>
          <div class="row">
           <style type="text/css">
           input {background-color:grey  ;color:white;}</style> <input  type="reset"  class="col s12 btn waves-effect waves-light red lighten-1"  name="cancelar modif" onclick="location='login.php'" value="Cancelar" /> </input>
           <input  type="submit"  class="col s12 btn waves-effect waves-light red lighten-1"  name="Recuperar" value="Recuperar" /> </input>
  
            </div>
        </div>
    </form>
    <?php }else{ ?>
    <form class="col s12" method="post">
        <input type="hidden" name="recover" value="<?php echo $_GET['token']?>" />
        <div class="card-panel">
          <h5><!--<i class="material-icons">person_pin</i>--> Reestablecer contraseña</h5>
          <!--<li class="divider"></li><br>-->
          <p>Ingrese su nueva contraseña.</p>
          <div class="row">
            <div class="input-field col s12">
              <input required id="pass" type="password" name="pass" class="validate" />
              <label for="pass">Su nueva contraseña</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input required id="repeticion" type="password" name="repeticion" class="validate" />
              <label for="repeticion">Repita la nueva contraseña</label>
            </div>
          </div>
          <div class="row">
            <button href="#" class="col s12 btn waves-effect waves-light red lighten-1" type="submit">Guardar</button>
          </div>
        </div>
    </form>
    <?php } ?>
  </div>
</div>
<?php
