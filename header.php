<?php 
include_once 'session.php';
include_once 'conec.php';
include_once 'perfil.php';
include_once 'contadores.php';
if (isset($_SESSION["nombre"]) && isset($_GET["val"]) ){
  if($_GET["val"] == $_SESSION["token"]){
  }
}
  else
  {
  header("location:cerrar.php");
  }

$nombr=$_SESSION["nombre"];
$nombre=ucfirst($nombr);

 
 ?>

<html lang="en">

<head>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
   

    <title>Aprendizaje</title>
</head>

<body>

    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0"><?php echo $nombre; ?></h4>
            </div>
            <div class="menu">
                <a href="inicio.php?val=<?php echo $_SESSION["token"] ?>" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
                    Inicio</a><?php if($_SESSION["status"]=="A"||$_SESSION["status"]=="P"){ ?>
                <a href="ejer.php?val=<?php echo $_SESSION["token"] ?>" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
                    Actividades</a><?php } 
                    else {
                      echo "<a href='ejercicios.php?val=".$_SESSION["token"]."' class='d-block text-light p-3 border-0'><i class='icon ion-md-people lead mr-2'></i>
                    Actividades</a>";
                    } ?>
                    <?php if ($_SESSION["status"]=="A"||$_SESSION["status"]=="P") {
                      ?> <a href="estu.php?val=<?php echo $_SESSION["token"] ?>" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
                     Agregar Ejercicios</a> <?php } ?>
                <a href="fotoperfil.php?val=<?php echo $_SESSION["token"] ?>" class="d-block text-light p-3 border-0"><i class="icon ion-md-person lead mr-2"></i>
                    Perfil</a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">

    
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline position-relative d-inline-block my-2">
                 
                  <a href="inicio.php?val=<?php echo $_SESSION["token"] ?>" class="nav-link text-dark">Inicio</a>
                  
                </form>
                <?php if ($_SESSION["status"]=="A"||$_SESSION["status"]=="P"){ 
                
                ?>
                <form class="form-inline position-relative d-inline-block my-2">
                
                  <a href="ejer.php?val=<?php echo $_SESSION["token"] ?>" class="nav-link text-dark" name="ejer" >Actividades</a>
                <?php }
                  else {
                  echo "<form class='form-inline position-relative d-inline-block my-2'>
                
                  <a href='ejercicios.php?val=".$_SESSION["token"]."' class='nav-link text-dark' name='ejer' >Actividades</a>";
                } ?>
                  
                </form>
                <?php if ($_SESSION["status"]=="A"||$_SESSION["status"]=="P") {
                  ?> <form class="form-inline position-relative d-inline-block my-2">
        
                  <a href="estu.php?val=<?php echo $_SESSION["token"] ?>" class="nav-link text-dark">Agregar ejercicios</a>
                  
                </form> <?php } ?>
                <form class="form-inline position-relative d-inline-block my-2">
          
                  <a href="fotoperfil.php?val=<?php echo $_SESSION["token"] ?>" class="nav-link text-dark">Perfil</a>

                  
                </form>
                  
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item dropdown">
                    <div class="punter0">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="<?php echo $perfil; ?>" class="img-fluid rounded-circle avatar mr-2"
                      alt="https://generated.photos/" />
                    <?php echo $_SESSION["nombre"];?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="cerrar.php?val=<?php echo $_SESSION["token"] ?>">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          </nav>
          


