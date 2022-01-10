<?php 
include_once 'session.php';
include_once 'conec.php';

$ejercicio=$_POST["ejercicio"];
$texto=$_POST["texto"];
$id_salida = $_GET["id"];
$id_entrada = $_SESSION["id_unica"];

$stmt=$mysqli->prepare("INSERT INTO agregar(id_entrada,id_salida,ejercicio,porcentaje,texto,fecha,estatus) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param("iisssss",$id_entrada,$id_salida,$ejercicio,$porcentaje,$texto,$fecha,$estatus);
$porcentaje=0;
$fecha=date("d-m-y");
$estatus="N";
$stmt->execute();
if ($stmt==TRUE) {
	header("location:agregar.php?id='".base64_encode($id_salida)."&val=".$_SESSION["token"]."'");
	$_SESSION["mensaje"]="
<div class='alert alert-primary alert-dismissible fade show' role='alert'>
  <strong>tarea agregada</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
?>