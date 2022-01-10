<?php include_once 'header.php';?>
                   <?php 
if (isset($_SESSION["mensaje"])) {
  echo $_SESSION["mensaje"];
  $_SESSION["mensaje"]=NULL;
}
?>
          
        
        <div id="content" class="bg-grey w-100">

              <!--<section class="bg-light py-3">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-9 col-md-8">
                            <h1 class="font-weight-bold mb-0">Bienvenido <?php  echo $_SESSION["nombre"]; ?></h1>
                            <p class="lead text-muted">Revisa la última información</p>
                          </div>
                      </div>
                  </div>
              </section>-->

               <!-- Page Content -->
              <section class="bg-mix py-3">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Numero de actividades</h6>
                                        <h3 class="font-weight-bold"><?php echo $cont; ?></h3>
                                      
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Actividades por completar</h6>
                                        <h3 class="font-weight-bold"><?php echo $cont1; ?></h3>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">No. de usuarios</h6>
                                        <h3 class="font-weight-bold"><?php echo $cont3; ?></h3>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Usuarios conectados</h6>
                                        <h3 class="font-weight-bold"><?php echo $cont2; ?></h3>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </section>
<div calss="container">
  <div class="col-12">
    <div class="row">
<div class="col-12 grid-margin">
  <div class="card">
  <div class="card-body">
              <section>
                  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Estudiantes</th>
    </tr>
  
  <?php 
include_once 'session.php';
include_once 'conec.php';
$id_emisor=$_SESSION["id_unica"];

$stmt=$mysqli->prepare("SELECT*FROM inicio WHERE status='U' AND NOT id_unica ='{$id_emisor}' ORDER BY id DESC ");
$stmt->execute();
$result = $stmt->get_result();
$salida = "";
while ($row = mysqli_fetch_array($result)) {
  $sql2 = mysqli_query($mysqli, "SELECT*FROM agregar WHERE (id_entrada ={$row['id_unica']})");
  $row2 = mysqli_fetch_assoc($sql2);
 echo"<tr>";
  echo"<td> <div class='d-flex'>
                                        <div class='d-flex mr-3'>
                                       <h2 class='align-self-center mb-0'> <img src='".$row["perfil"]."' class='img-fluid rounded-circle avatar mr-2'>
                                          <i ></i></h2>
                                        <a href='ejercicios.php?id=".base64_encode($row["id_unica"])."&val=".$_SESSION["token"]."'>";echo $row["usuario"]; echo " </a> </td></div>";
                                        
   
}
?>
</thead>
</div>
        
          </div>
        </div>
         </div>
        </div>
    </div>
  </table>
</section>
</div>
</div>
 <div> <?php include_once 'foot.php'; ?></div>


   <?php include_once 'fot.php'; ?>