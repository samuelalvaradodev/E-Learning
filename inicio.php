<?php include_once 'header.php';
//include_once 'contadores.php';
 ?>

        
        <div id="content" class="bg-grey w-100">

              <section class="bg-light py-3">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-9 col-md-8">
                            <h1 class="font-weight-bold mb-0">Bienvenido <?php  //echo $_SESSION["nombre"];
                            echo $nombre; ?></h1>
                            <p class="lead text-muted">Revisa la última información</p>
                          </div>
                      </div>
                  </div>
              </section>

               <!-- Page Content -->
<div class="cuadro1">
              <section class="bg-mix ">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Numero de actividades</h6>
                                        <h3 class="font-weight-bold"><?php echo $cont; ?></h3>
                                        <h6 class="text-success">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Actividades por completar</h6>
                                        <h3 class="font-weight-bold"><?php echo $cont1 ?></h3>
                                       
                                    </div>
                                </div>
                              
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">No. de usuarios</h6>
                                        <h3 class="font-weight-bold"><?php echo $cont3 ?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Usuarios conectados</h6>
                                        <h3 class="font-weight-bold"><?php echo $cont2 ?></h3>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </section>
              </div>

              <section>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8 my-3">
                              <div class="card rounded-0">
                                  <div class="card-header bg-light">
                                    <h6 class="font-weight-bold mb-0">Introduccion a PHP</h6>
                                  </div>
                                  <div class="card-body">
                                    <div class="video-responsive" >
                                    <iframe  src='https://www.youtube.com/embed/HKFDsC_rMpU' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                                  </div>
                                    <!--<canvas id="myChart" width="300" height="150"></canvas>-->
                                  </div>
                              </div>
                          </div>                          
                          <div class="col-lg-4 my-3">
                            <div class="card rounded-0">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold mb-0">Nuevos usuarios</h6>
                                </div>
                                <div class='card-body pt-2'>
                                <?php

                          $stmt=$mysqli->prepare("SELECT*FROM inicio ORDER BY id DESC LIMIT 6");
                          $stmt->execute();
                            $result = $stmt->get_result();
                            while ($row = mysqli_fetch_array($result)) {
                           
                               echo "
                                    <div class='d-flex border-bottom py-2'>
                                        <div class='d-flex mr-3'>
                                       <h2 class='align-self-center mb-0'> <img src='".$row["perfil"]."' class='img-fluid rounded-circle avatar mr-2'>
                                          <i ></i></h2>
                                        </div>

                                        <div class='align-self-center'>
                                          <h6 class='d-inline-block mb-0'>".$row["usuario"]."</h6>";if($row["act"]=="L"){ echo "<span class='badge badge-success ml-2'>Conectado</span>
                                        </div>
                                    </div>";
                                  }
                                  else{
                                      echo "<span class='badge badge-danger ml-2'>Desconectado</span>
                                        </div>
                                    </div>";
                                    }
                                  }
                                    ?>
                                    
        </div>
     
        </div>

    </div>

  </div>
<div>
   <?php include_once 'foot.php'; ?>
</div>
    <style type="text/css">

.video-responsive {
  height: 0;
  overflow: hidden;
  padding-bottom: 56.25%;
  padding-top: 30px;
  position: relative;
  }
.video-responsive iframe, .video-responsive object, .video-responsive embed {
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
  }
  @media handheld, only screen and (max-width: 767px) {
.cuadro1 {
display:none;
}
}

@media only screen and (max-width: 1023px) {
.cuadro1 {
display:none;
}
}
@media handheld, only screen and (max-width: 767px) {
.prueba {
display:contents;
}
}

@media only screen and (max-width: 1023px) {
.prueba {
display:contents;
}
}

          </style>
<?php   include_once 'fot.php'; 
?>