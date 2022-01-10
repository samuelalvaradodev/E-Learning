<?php 
include_once 'conec.php';
include_once 'session.php';
$directorio = 'img/';

/*var_dump(basename($_FILES['archivo']['tmp_name']));*/
$subir_archivo = $directorio.basename($_FILES['archivo']['name']);
//echo "subir_archivo";
//var_dump($subir_archivo);
//echo "<br>";
$id=$_SESSION["id"];


if (move_uploaded_file($_FILES['archivo']['tmp_name'], $subir_archivo)) {
      $stmt=$mysqli->prepare("UPDATE inicio SET perfil='".$subir_archivo."'  WHERE  id='".$id."'");
 $stmt->execute();
 header("location:fotoperfil.php?val=".$_SESSION["token"]."");
          } else {
       header("location:fotoperfil.php?val=".$_SESSION["token"]."");
       $_SESSION["mensaje"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Agrega una foto de perfil.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
   } 



 ?>