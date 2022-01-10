<?php  

include_once 'conec.php';
include_once 'session.php';

$id1 = base64_decode($_GET["id"]);

$pagina_eliminar = "pagina_eliminar";
if (isset($_SESSION["nombre"])) {
if ($pagina_eliminar == "pagina_eliminar") {
	$stmt = $mysqli->prepare("DELETE  FROM agregar WHERE id='".$id1."'");
$stmt->execute();
echo "se elimino la id :" .$id1 ;
header("location:ejer.php?val=".$_SESSION["token"]."");
$_SESSION["mensaje"]="<div class='alert alert-primary alert-dismissible fade show' role='alert'>
  <strong>tarea eliminada</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
}
else{
}
?>