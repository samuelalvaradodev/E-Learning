<?php 
include_once 'conec.php';
include_once 'session.php';


if (isset($_POST["enviar"])) {
	$cali=$_POST["calificar"];
	$id=$_GET["id"];

$stmt=$mysqli->prepare("UPDATE agregar SET porcentaje=? WHERE  id='".$id."'");
 $stmt->bind_param('i',$porcentaje);
 $porcentaje=$_POST["calificar"];

 $stmt->execute();
header("location:ejer.php?val=".$_SESSION["token"]."");


}



 ?>