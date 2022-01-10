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
      <th scope="col">Ejercio</th>
      <th scope="col">Porcentaje</th>
      <th scope="col">Fecha inicio</th>
      <?php  if ($_SESSION["status"]=="A" || $_SESSION["status"]=="P") {
        ?>
   
      <th scope="col"></th>
      <th scope="col"></th> 
    <?php   } ?>
    </tr>
  
  <?php 
include_once 'session.php';
include_once 'conec.php';
if ($_SESSION["status"] === "A" || $_SESSION["status"]=="P") {
  $status=$_SESSION["status"];
  $stmt=$mysqli->prepare("SELECT*FROM inicio WHERE status ='".$status."' ");
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);
$id_entrada= $row["id_unica"];
if(isset($_GET["id"])){
$id=base64_decode($_GET["id"]);
}
$stmt=$mysqli->prepare("SELECT*FROM agregar WHERE (id_salida =".$id.")");
$stmt->execute();
$result = $stmt->get_result();
while ($row2 = mysqli_fetch_array($result)) {
  echo"<tr>";
  echo"<td>";echo $row2["ejercicio"]; echo " </a> </td>";
  echo"<td>";echo $row2["porcentaje"]."%"; echo"</td>";
  echo"<td>";echo $row2["fecha"]; echo "</td>";
  if ($_SESSION["status"]=="A" || $_SESSION["status"]=="P") {
      echo"<td> <a href='ver.php?id=".base64_encode($row2['id'])."&val=".$_SESSION["token"]."'> <input type='button' class='btn btn-success' name='activar' value='revisar' onClick='window.location.reload()'></td>";
      echo "<td> <button class='btn btn-danger' type='button' data-toggle='modal' data-target='#exampleModal'>Eliminar</button></td>
       <!-- Modal -->
        <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
          <div class='modal-dialog' role='document'>
            <div class='modal-content'>
              <div class='modal-header'>
                               <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
              <div class='modal-body'>
                Desea eliminar esta actividad?
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                <a href='eliminar.php?id=".base64_encode($row2['id'])."&val=".$_SESSION["token"]."''><button type='button' class='btn btn-danger'>Eliminar</button></a>
              </div>
            </div>
          </div>
        </div> ";
  }
   

}
}
else
{
$id=$_SESSION["id_unica"];


$stmt=$mysqli->prepare("SELECT*FROM inicio WHERE status ='P' ");
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);
$id_entrada= $row["id_unica"];





$stmt=$mysqli->prepare("SELECT*FROM agregar WHERE (id_entrada =".$id_entrada." AND id_salida=".$id." ) ");
$stmt->execute();
$result = $stmt->get_result();
while ($row2 = mysqli_fetch_array($result)) {
  echo"<tr>";
  echo"<td> <a href='responder.php?id=".base64_encode($row2["id"])."&val=".$_SESSION["token"]."'>";echo $row2["ejercicio"]; echo " </a> </td>";
  echo"<td>";echo $row2["porcentaje"]."%"; echo"</td>";
  echo"<td>";echo $row2["fecha"]; echo "</td>";
   
}
}?>
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