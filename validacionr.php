<?php 
include_once 'session.php';
include_once 'conec.php';


$usuario= strtolower(trim(mysqli_real_escape_string($mysqli,$_POST["nombre"])," "));

$contrasena=mysqli_real_escape_string($mysqli,$_POST["contrasena"]);


if (!empty($usuario) && !empty($contrasena)) {

$min_len=5;
$max_len=15;
$req_may=1;
$req_min=1;
$req_num=1;
if (isset($_POST["resgistrar"])) {
	

$validacion = '/^';

    if ($req_min >= 1) 
    	{ $validacion .= '(?=.*[a-z])';
    	 }else{
 	header("location:registro");
 	$_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Debe contener caracteres en minuscula.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
 }       
    if ($req_may >= 1)
     { $validacion .= '(?=.*[A-Z])';
      }   else{
 	header("location:registro");
 	$_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Debe contener caracteres en mayuscula.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
 }        
    if ($req_sym == 1)
     { $validacion .= '(?=.*[0-9A-Za-z])';
      } else{
 	header("location:registro");
 	$_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Debe contener combinacion de caracteres alfanumericos.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
 }
   if ($req_num >= 1) 
   	{ $validacion .= '(?=.*\d)'; 
}else{
 	header("location:registro");
 	$_SESSION["mensaje"]=" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Debe contener combinacion de caracteres numericos.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
 }
   

    $validacion .= '.{' . $min_len . ',' . $max_len . '}$/';

    if(preg_match($validacion,$contrasena)) {
    	
    	$b1 = password_hash($contrasena, PASSWORD_BCRYPT);
    	$b = base64_encode($b1);

$stmt=$mysqli->prepare("SELECT usuario FROM inicio WHERE usuario=?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$row=$result->fetch_assoc();
$nombre=$row["usuario"];

if ($usuario==$nombre) {
header("location:registro.php");
$_SESSION["mensaje"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>intenta con otro usuario</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
else{
$stmt=$mysqli->prepare("INSERT INTO inicio(id_unica,usuario,contrasena,status,perfil,act) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("isssss",$id_unica,$usuario,$b,$status,$perfil,$act);
$id_unica = rand(time(),100000000);
$status="U";
$act="D";
$perfil="img/prede.png";
$stmt->execute();

$stmt=$mysqli->prepare("SELECT*FROM inicio WHERE status ='P' ");
$stmt->execute();
$result = $stmt->get_result();
$row01 = mysqli_fetch_array($result);
$id_entrada= $row01["id_unica"];

$ejercicio="calculadora sencilla";
$texto="Despues de haber visto el uso de los operadores matematicos :escribe un programa que utilice las variables (x) y (y). Asignales los valores 144 y 999 respectivamente. A continuación, muestra por pantalla el valor de cada variable, la suma, la resta, la división
y la multiplicación.";
$id_salida = $id_unica;
$id_entrada = $row01["id_unica"];

$stmt=$mysqli->prepare("INSERT INTO agregar(id_entrada,id_salida,ejercicio,porcentaje,texto,fecha,estatus) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param("iisssss",$id_entrada,$id_salida,$ejercicio,$porcentaje,$texto,$fecha,$estatus);
$porcentaje=0;
$fecha=date("d-m-y");
$estatus="N";
$stmt->execute();

header("location:login");
  $_SESSION["mensaje"]="<div class='alert alert-primary alert-dismissible fade show' role='alert'>
  <strong>Ya puedes iniciar sesion.!!</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";

}

    }
    else{
    		header("location:registro");
    		$_SESSION["mensaje"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Ingresa al menos:</strong> Un caracter mayuscula, Un caracter minuscula y un numero, la contraseña de debe pasar de los 5 caracteres.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    	}
    


}
}else{
	echo "!Todos los campos de entrada son obligatorios!";
}



?>