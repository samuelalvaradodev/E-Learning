<?php 
include_once 'session.php';
include_once 'conec.php';
include_once 'funciones.php';



$usuario=$_POST["nombre"];

$usuario= strtolower(trim(mysqli_real_escape_string($mysqli,$_POST["nombre"])," "));

$contrasena=mysqli_real_escape_string($mysqli,$_POST["contrasena"]);
if (!empty($usuario) && !empty($contrasena)) {
	
$min_len=5;
$max_len=15;
$req_may=1;
$req_min=1;
$req_num=1;
if (isset($_POST["iniciar"])) {
	

$validacion = '/^';

    if ($req_min >= 1) 
      { $validacion .= '(?=.*[a-z])';
       }else{
  header("location:login");
  $_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Debe contener caracteres en minuscula.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
 }       
    if ($req_may >= 1)
     { $validacion .= '(?=.*[A-Z])';
      }   else{
  header("location:login");
  $_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Debe contener caracteres en mayuscula.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
 }        
    if ($req_sym >= 1)
     { $validacion .= '(?=.*[0-9A-Za-z])';
      } else{
  header("location:login");
  $_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Debe contener combinacion de caracteres alfanumericos.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
 }
   if ($req_num >= 1) 
    { $validacion .= '(?=.*\d)'; 
}else{
  header("location:login");
  $_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Debe contener combinacion de caracteres numericos.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
 }
   

    $validacion .= '.{' . $min_len . ',' . $max_len . '}$/';

    if(preg_match($validacion,$contrasena)) {
    	

$stmt=$mysqli->prepare("SELECT*FROM inicio WHERE usuario=?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$row=$result->fetch_assoc();
$nombre=$row["usuario"];
$contra=base64_decode($row["contrasena"]);
$status=$row["status"];
$id=$row["id_unica"];
$perfil=$row["perfil"];
if ($row["status"]==="U") {
    header("location:login");
  $_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>No puedes ingresar por aqui!</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}else{
$_SESSION["mensaje"]=NULL;
$_SESSION["status"]=$status;
$_SESSION["nombre"]=$nombre;
$_SESSION["perfil"]=$perfil;
$_SESSION["id"]=$row["id"];
$_SESSION["id_unica"]=$id;
$_SESSION["token"] = md5(uniqid(mt_rand(), true));
$_SESSION["tiempo"] = time();

if($nombre===$usuario){
}
else{
	header("location:profesor");
	$_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>El usuario o contraseña que estas ingresando no es correcto.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";

}
 if (password_verify($contrasena,$contra)){

 $stmt=$mysqli->prepare("UPDATE inicio SET act='L' WHERE  id_unica='".$id."'");
 $stmt->bind_param("s",$act);
 $stmt->execute();
 header("location:inicio.php?val=".$_SESSION["token"]."");
 }else{
 	header("location:profesor");
 	$_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>El usuario o contraseña que estas ingresando no es correcto.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
}
}else{
 	header("location:profesor");
 	$_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Los datos que estas ingresando no son correctos.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
 }
}else{
	header("location:profesor");
 	$_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Los campos no pueden quedar vacios.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
}




?>