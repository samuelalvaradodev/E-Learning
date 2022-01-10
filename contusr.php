<?php 
include_once 'conec.php';
include_once 'session.php';
 $stmt3=$mysqli->prepare("SELECT*FROM inicio");
                $stmt3->execute();
                $stmt3->store_result(); 
                $cont3=$stmt3->num_rows;

?>