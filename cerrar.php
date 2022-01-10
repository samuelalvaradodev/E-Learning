<?php 
include_once 'session.php';
include_once 'conec.php';

if (isset($_SESSION['nombre'])){
	if (isset($_SESSION["status"])) {
$nombre=$_SESSION["nombre"];
$stmt=$mysqli->prepare("UPDATE inicio SET act='D' WHERE  usuario='".$nombre."'");
$stmt->bind_param("s",$act);
$stmt->execute();

if($_SESSION["status"]==="P"){
session_destroy();
	header("location:profesor");
}elseif ($_SESSION["status"]==="A") {
	session_destroy();
	header("location:login_admin");
}elseif ($_SESSION["status"]==="U") {
	session_destroy();
	header("location:login");
}
}
}else{
	header("location:login");
}


 ?>