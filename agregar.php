<?php include_once 'header.php'; ?>
<?php 
if (isset($_SESSION["mensaje"])) {
  echo $_SESSION["mensaje"];
  $_SESSION["mensaje"]=NULL;
}

 ?>

<div id="content" class="bg-grey w-100">

    <section class="bg-mix py-3">
        <div class="container">
            <div class="card rounded-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-muted">Numero de actividades</h6>
                                <h3 class="font-weight-bold"><?php echo $cont; ?></h3>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-muted">Actividades por completar</h6>
                                <h3 class="font-weight-bold"><?php echo $cont1; ?></h3>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-muted">No. de usuarios</h6>
                                <h3 class="font-weight-bold"><?php echo $cont3; ?></h3>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 d-flex my-3">
                            <div class="mx-auto">
                                <h6 class="text-muted">Usuarios conectados</h6>
                                <h3 class="font-weight-bold"><?php echo $cont2; ?></h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page content-->
    <?php if (isset($_GET["id"])) {
                $id=base64_decode($_GET["id"]);
              } ?>

    <div class="container">
        <form action="agregarr.php?id=<?php echo $id ?>&?val=<?php echo $_SESSION["token"] ?>" method="post">
            <legend>Agregar ejercicios</legend>
            <div class="form-group">
                <label for="exampleInputEmail1">Ejercicio</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="ejercicio">
            </div>

            <div class="form-group">
                <label for="exampleTextarea"></label>
                <textarea class="form-control" id="exampleTextarea" rows="10" name="texto"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>

    <?php include_once 'foot.php'; ?>
</div>
</div>


<?php include_once 'fot.php';
 ?>