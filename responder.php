<?php include_once 'header.php';

              	$id=base64_decode($_GET["id"]) ;
              	$stmt=$mysqli->prepare("SELECT*FROM agregar WHERE id=".$id." ");
              	$stmt->execute();
				$result = $stmt->get_result();
				$row=$result->fetch_assoc();
				$titulo=$row["ejercicio"];
				$ejercicio=$row["texto"];
        $respuesta = $row["respuestas"];
				
             ?>

              	<div class="container">
    <div class="card border-light mb-3" style="max-width: relative;">
  <div class="card-header"><?php echo $titulo ?></div>
  <div class="card-body">
    <p class="card-text"><?php echo $ejercicio; ?></p>
  </div>
  
<div class="container">
<div class="form-group">
	<form action="respuestas.php?id=<?php echo $row["id"] ?>&?val=<?php echo $_SESSION["token"] ?>" method="post">
      <label for="exampleTextarea">Respuestas</label>
      <?php if ($respuesta != NULL){ ?>
        <textarea class="form-control" name="respuesta" rows="10" disabled></textarea> <br>
      <?php }else{ ?>
      <textarea class="form-control" name="respuesta" rows="10"></textarea> <br>
      <button type="submit" class="btn btn-primary" name="enviar">Entregar</button>
    <?php } ?>
      </form>
    </div>
</div>
    </div>
    </div>
    <?php include_once 'foot.php'; ?>
    
<?php include_once 'fot.php'; ?>