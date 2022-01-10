<?php include_once 'session.php'; ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Clases</title>
	<link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stilo.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<body>
	
	<h1> Registrate </h1>

<div class="containerr">
 
 <form action="validacionr" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" required  maxlength="10">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="contrasena" required minlength="5" maxlength="15"> 
  </div>
  <button type="submit" class="btn btn-primary" name="resgistrar">Registrar</button>
</form> 
<a href="login">Ya tienes una cuenta? pulsa aqui!!</a>
  
</div>



</body>
</html>
<?php 
if (isset($_SESSION["mensaje"])) {
  echo $_SESSION["mensaje"];
  $_SESSION["mensaje"]=NULL;
}

 ?>