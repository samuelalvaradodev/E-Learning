<?php 
include_once 'session.php';
include_once 'conec.php';



$id=$_GET["id"];


$respu= $_POST["respuesta"];
/*$valid=$validacion = array("<",">");
$respu=str_replace($valid, ' ', $respue);*/

$stu="N";

 $stmt=$mysqli->prepare("UPDATE agregar SET respuestas='".$respu."', estatus='".$stu."' WHERE id='".$id."' ");
$stmt->bind_param("ssi",$respu,$estatus,$id);
$stmt->execute();
if ($stmt==TRUE) {
header("location:ejercicios.php?val=".$_SESSION["token"]."");
$_SESSION["mensaje"]=" <div class='alert alert-primary alert-dismissible fade show' role='alert'>
  <strong>Espere a que sea corregido el ejercicio.</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}



 ?>