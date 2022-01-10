<?php 
include_once 'conec.php';
include_once 'session.php';
if ($_SESSION["status"]=== "U"){
$id = $_SESSION["id_unica"];
 $stmt=$mysqli->prepare("SELECT*FROM agregar WHERE id_salida='{$id}'");
                $stmt->execute();
                $stmt->store_result(); 
                $cont=$stmt->num_rows;
                }
                else{
$id = $_SESSION["id_unica"]; 
 $stmt1=$mysqli->prepare("SELECT*FROM agregar WHERE  id_salida ='{$id}' ");
 $stmt1->execute();
 $stmt1->store_result(); 
 $cont=$stmt1->num_rows;
 if ($cont>0) {
 	$cont=0;
 }
}

?>