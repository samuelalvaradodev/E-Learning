<?php 
include_once 'conec.php';
include_once 'session.php';
 $stmt2=$mysqli->prepare("SELECT*FROM inicio WHERE act='L'");
 $stmt2->execute();
 $stmt2->store_result(); 
 $cont2=$stmt2->num_rows;
?>