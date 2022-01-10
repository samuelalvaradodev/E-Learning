<?php include_once 'header.php'; ?>
                   <?php 
if (isset($_SESSION["mensaje"])) {
  echo $_SESSION["mensaje"];
  $_SESSION["mensaje"]=NULL;
}
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
                  
                               <?php 
   $id=base64_decode($_GET["id"]);
   $stmt=$mysqli->prepare("SELECT*FROM agregar WHERE id=".$id." ");
   $stmt->execute();
  $result = $stmt->get_result();
  $row=$result->fetch_assoc();
  $titulo=$row["texto"];
  $texto=$row["respuestas"];
    ?>
    <br>
    <div class="container">
   <div class="card border-light mb-3">
  <div class="card-header"><?php echo $titulo; ?></div>
  <div class="card-body">
     <pre class="language-html">
      <code><textarea class="form-control" id="exampleTextarea" rows="10" disabled><?php echo $texto;?> </textarea></code></pre> 
      <form action="calificar.php?id=<?php echo $id; ?>&val=<?php  echo $_SESSION["token"]  ?>" method="post">
      <input type="text" placeholder="calificar" name="calificar" class="form-control"><br>
      <input type="submit"  class="btn-primary" name="enviar">
    </form>
    </div>
  </div>
  </div>
    </section>
<?php include_once 'fot.php'; 
include_once 'foot.php';?>
<style type="text/css">

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
    



   