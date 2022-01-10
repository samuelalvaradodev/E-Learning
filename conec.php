<?php 

$mysqli = new mysqli("localhost", "root", "", "calse");
if (mysqli_connect_errno()) {
  printf("Fallo la coneccion: %s\n", mysqli_connect_error());
  exit();
}

 ?>