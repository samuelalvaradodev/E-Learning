<?php 
include_once 'conec.php';
include_once 'session.php';
if ($_SESSION["status"]=== "U"){
$id = $_SESSION["id_unica"]; 
 $stmt1=$mysqli->prepare("SELECT*FROM agregar WHERE estatus='N' AND id_salida ='{$id}' ");
 $stmt1->execute();
 $stmt1->store_result(); 
 $cont1=$stmt1->num_rows;
}else{
$id = $_SESSION["id_unica"]; 
 $stmt1=$mysqli->prepare("SELECT*FROM agregar WHERE estatus='N' AND id_salida ='{$id}' ");
 $stmt1->execute();
 $stmt1->store_result(); 
 $cont1=$stmt1->num_rows;
 if ($cont1>0) {
 	$cont1=0;
 }
}
?>