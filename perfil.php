<?php 

include_once 'conec.php';
include_once 'session.php';
$id=$_SESSION["id"];
$stmt=$mysqli->prepare("SELECT*FROM inicio WHERE id='".$id."'");
$stmt->execute();
$result = $stmt->get_result();
$row=$result->fetch_assoc();
$perfil=$row["perfil"];




?>
