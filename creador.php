<?php
$mysqli = new mysqli("localhost", "root", "", "pruebacrud");
if (mysqli_connect_errno()) {
	printf("Fall¨® la conexi¨®n: %s\n", mysqli_connect_error());
	exit();
}

//DATOS NECESARIOS
$DB = 'pruebacrud';
$TABLA = 'pruebacrud1';
//DATOS NECESARIOS

WRKHTML ($mysqli, $DB, $TABLA);
WRKPHP ($mysqli, $DB, $TABLA);

function WRKHTML ($mysqli, $DB, $TABLA) {
	$name="INS$TABLA.html";
	$BUFIN = '';
	$BUFINVAR = '';
	$BUFINPARM = '';
	$PARMSR = '';
	$TYPES = '';
	$LABINP = '';
	$conts = 0;
	//Preparado y ejecucion sentencia para informacion de tabla
	$stmt = $mysqli->prepare("SHOW COLUMNS FROM $TABLA FROM $DB");
	$stmt->execute();
	$result = $stmt->get_result();
   	//Preparado y ejecucion sentencia para informacion de tabla
	//Armado de fields
	while ($row = $result->fetch_assoc()) {
		$value = $row['Field'];
		if ($row['Key'] == 'PRI' && $row['Extra'] == 'auto_increment') {
		}
		else  {
			if ($row['Null'] != 'YES') {
				$conts += 1;
			}
			if (stristr($row['Type'], 'int')) {
				$TYPES = $TYPES.''.'i';
				$LABINP = $LABINP."
				<div class='form-group'>
				<label for='$value'>$value</label>
				<input type='number' class='form-control' name='$value' required>
				</div>\n";
			}
			else {
				$TYPES = $TYPES.''.'s';
				$LABINP = $LABINP."
				<div class='form-group'>
				<label for='$value'>$value</label>
				<input type='text' class='form-control' name='$value' required>
				</div>\n";
			}	
			$BUFIN = $BUFIN.','.$row['Field'];
			$BUFINVAR = $BUFINVAR.','.'$'.$row['Field'];
			$PARMSR = $PARMSR.',?';
		}
	}
	//Armado de fields
	$BUFIN = substr($BUFIN, 1);
	$BUFIN = explode(',', $BUFIN);
	$BUFINVAR = substr($BUFINVAR, 1);
	$TYPES = substr($TYPES, 1);
	$PARMSR = substr($PARMSR, 1);
	$x = "'"; 
	
	//EJECUCION DE GRABADO EN BUFER
	ob_start();	
	$plantillahtml = '<html>
	<head> 
	<meta charset="utf-8">
	<title>CIDIM</title>
	<link rel="shortcut icon" href="../img/icon/cidimico.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="../css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/fonts/all.min.css">
	<script src="../jquery/jquery-3.5.1.slim.min.js"></script>
	</head> 
	<body>
	<nav class="navbar navbar-expand-lg sticky-top navbar-light shadow p-3 colorcidim">
	<div class="container">
	<a> <img class="rounded" src="../img/cidimlogoO.png" alt=""></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
	<i class="fas fa-bars"></i>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<!-- Left Side Of Navbar -->
	<ul class="navbar-nav mr-auto"></ul>
	<br>
	<ul class="navbar-nav ml-auto">
	<!-- <li class="nav-item">
	<a class="nav-link text-light" href="../views/register.php"><h5><strong>REGISTRO</strong></h5></a>
	</li> -->
	</ul>
	<!-- Right Side Of Navbar -->
	</div>
	</div>
	</nav>
	<br>
	
	<div class="container">
	INSERTAR EN '.strtoupper($TABLA).'
	
	<form action="INS'.$TABLA.'.php" method="POST" accept-charset="utf-8">
	'.$LABINP.'
	<button type="submit" name="INSPARMS" value="1" class="btn btn-dark">
	Aceptar
	</button>
	</form>
	</div>

	<footer>
	<center>
	<strong>Copyright © <a href="https://webcidim.com">CIDIM </a>Integradores de Soluciones M17, C.A.</strong>
	Todos los derechos reservados. <b>(Versión</b> <b>1.0)</b>
	</center>
	</footer>
	<script src="../jquery/jquery-3.5.1.slim.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	</body>
	</html>'
	?>
	<?= $plantillahtml; ?>
	<?php
	$archivo = ob_get_contents();
	file_put_contents($name, $archivo);
	ob_end_flush();
	//FIN EJECUCION DE GRABADO EN BUFER

}

function WRKPHP ($mysqli, $DB, $TABLA) {
	$name="INS$TABLA.php";
	$BUFIN = '';
	$BUFINVAR = '';
	$BUFINPARM = '';
	$PARMSR = '';
	$TYPES = '';
	//Preparado y ejecucion sentencia para informacion de tabla
	$stmt = $mysqli->prepare("SHOW COLUMNS FROM $TABLA FROM $DB");
	$stmt->execute();
	$result = $stmt->get_result();
   	//Preparado y ejecucion sentencia para informacion de tabla
	//Armado de fields
	while ($row = $result->fetch_assoc()) {
		if ($row['Key'] == 'PRI' && $row['Extra'] == 'auto_increment') {
		}
		else  {
			if (stristr($row['Type'], 'int')) {
				$TYPES = $TYPES.''.'i';
			}
			else {
				$TYPES = $TYPES.''.'s';
			}	
			$BUFIN = $BUFIN.','.$row['Field'];
			$BUFINVAR = $BUFINVAR.','.'$'.$row['Field'];
			$PARMSR = $PARMSR.',?';
		}
	}
	//Armado de fields
	$BUFIN = substr($BUFIN, 1);
	$BUFINVAR = substr($BUFINVAR, 1);
	$PARMSR = substr($PARMSR, 1);
	$x = "'"; 

	//EJECUCION DE GRABADO EN BUFER
	ob_start();	
	$plantillaphp = '<?php
	$mysqli = new mysqli("localhost", "root", "", "'.$DB.'");
	if (mysqli_connect_errno()) {
		printf("Fall¨® la conexi¨®n: %s\n", mysqli_connect_error());
		exit();
	}
	if (isset($_POST["INSPARMS"])) {
		extract($_POST);
		$stmt = $mysqli->prepare("INSERT INTO pruebacrud1('.$BUFIN.') VALUES ('.$PARMSR.')");
		$stmt->bind_param('."'".''.$TYPES.''."'".', '.$BUFINVAR.');
		$stmt->execute();
		mysqli_stmt_close($stmt);
		echo "<script type='."'text/javascript'".'>
		alert('."'INSERTAR EJECUTADO'".');
		window.location.href='."'../WRKGRPPHP/INS$TABLA.html'".';
		</script>";

		
	} ?>'
	?>
	<?= $plantillaphp; ?>
	<?php
	$archivo = ob_get_contents();
	file_put_contents($name, $archivo);
	ob_end_flush();
	//FIN EJECUCION DE GRABADO EN BUFER

}




?>