<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CouchInn-Soft</title>



    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
   <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
   <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
     <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <div class="c-fondocouchinn navbar-default ">
    <!--<nav class="navbar navbar-default navbar-fixed-top">-->
        <div class="container">
          
              <a class="brand-logo" href="#page-top">
                <img   src="img/fondo2.png" alt="logo" style="float:left" width="350" height="70">
             </a>
             
            <!-- Brand and toggle get grouped for better mobile display -->
          
                
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                    <li><a href="buscar.php">BUSCAR HOSPEDAJE</a></li>
                            <?php if(isset($_SESSION['user'])){ ?>
                               <!-- <li><a href="crearsubasta.php">SUBASTAR</a></li> -->

                                <li><a href="perfil.php"><span style="text-transform:uppercase"> <?php echo $_SESSION['user']; ?> </span> </a></li>
                                <li><a href="logout.php">SALIR</a></li>
                                <?php if($_SESSION['admin']){ ?><li><a href="menuadmin.php">ADMINISTRACIÓN</a></li><?php } ?>
                                <?php }else{ ?>
                                <li><a href="registro.php">REGISTRARSE</a></li>
                                <li><a href="login.php">INGRESAR</a></li>
                            <?php } ?>
                        
                            
                            <li class="divider"></li> 
                            </div>
                        </ul>   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>