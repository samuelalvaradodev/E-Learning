<?php include_once 'header.php'; include_once 'perfil.php';?>
<br>
 <center>
    <img  src="<?php echo $perfil;?>" class="img-fluid rounded-circle " width=200 
                       />
                    
  <div class="container">
  <div class="form-group">
<form action="subirfoto.php" method="post" enctype="multipart/form-data">
  
                    
               

  <strong>Cambia tu foto de perfil</strong>
  <div class="input-group mb-3">
  <input type="hidden" name="MAX_FILE_SIZE" value="5120000"/>
  <input type="file" class="form-control" name="archivo">
</div>
  <button type="submit" class="btn btn-secondary" name="subida">Subir</button>
</form>
</div>
<?php 
if (isset($_SESSION["mensaje"])) {
  echo $_SESSION["mensaje"];
  $_SESSION["mensaje"]=NULL;
}
 ?>
</div>
 </center>
 

 <?php include_once 'fot.php';
  include_once 'foot.php';
  ?>
