<!doctype html>
<?php
include_once '../modelo/componente.php';
include_once '../modelo/conexion.php';
include_once '../controlador/controladorComponentes.php';
?>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Agregar Componentes</title>
  </head>
  <body>
    <div class="container">
    <div class=row>
      <div class="col-md-10 offset-md-1">
      <?php
      try{
        if(!isset($_REQUEST["referencia"])){
          throw new PDOException("Por favor digite la identificación");
        }
        if(!isset($_REQUEST["motherboard"])){
          throw new PDOException("Por favor digite el modelo de motherboard");
        }
        if(!isset($_REQUEST["procesador"])){
          throw new PDOException("Por favor digite que procesador");
        }
        if(!isset($_REQUEST["ram"])){
          throw new PDOException("Por favor digite la memoria RAM");
        }
        if(!isset($_REQUEST["video"])){
          throw new PDOException("Por favor digite la Tarjeta de Video");
        }
        if(!isset($_REQUEST["fuente"])){
          throw new PDOException("Por favor digite la Fuente de Poder");
        }

        $pz_referencia=$_REQUEST["referencia"];
        $pz_motherboard=$_REQUEST["motherboard"];
        $pz_procesador=$_REQUEST["procesador"];
        $pz_ram=$_REQUEST["ram"];
        $pz_video=$_REQUEST["video"];
        $pz_fuente=$_REQUEST["fuente"];

        $componente=new componente();
        $componente->setPzReferencia($pz_referencia);
        $componente->setPzMotherboard($pz_motherboard);
        $componente->setPzProcesador($pz_procesador);
        $componente->setPzRam($pz_ram);
        $componente->setPzVideo($pz_video);
        $componente->setPzFuente($pz_fuente);

        $controladorComponentes=new controladorComponentes();
        $mensaje=$controladorComponentes->crear($componente);
        echo '<h2 class="text-center text-success">' . $mensaje . "<h2>";
      }catch(PDOException $e){
        echo '<h2 class="text-center text-success">' . $e->getMessage() . "<h2>";
      }
    ?>
      </div>
      
  <br>

  <div class="row">
    <div class="col">
      <a class="btn btn-warning" href="componente/listarComponentes.php">Regresar al listado</a>
    </div>
  </div>
  </div>
  </div>





      <!--<h3 class="text-center">Agregar Componentes</h3>
        <form action="http://localhost/ejemplo/controlador/controladorComponentes.php" method="post">
        <div class="mb-3 row">
          <label for="referencia" class="col-sm-2 col-form-label">Referencia</label>
          <div class="col-sm-10">
            <input type="text" name="referencia" class="form-control" id="referencia">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="motherboard" class="col-sm-2 col-form-label">Motherboard</label>
          <div class="col-sm-10">
            <input type="text" name="motherboard" class="form-control" id="motherboard">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="procesador" class="col-sm-2 col-form-label">Procesador</label>
          <div class="col-sm-10">
            <input type="text" name="procesador"  class="form-control" id="procesador">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="ram" class="col-sm-2 col-form-label">RAM</label>
          <div class="col-sm-10">
            <input type="text" name="ram"  class="form-control" id="ram">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="video" class="col-sm-2 col-form-label">Video</label>
          <div class="col-sm-10">
            <input type="text" name="video"  class="form-control" id="video">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="fuente" class="col-sm-2 col-form-label">Fuente</label>
          <div class="col-sm-10">
            <input type="text" name="fuente"  class="form-control" id="fuente">
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-sm-10">
            <input class="btn btn-primary" type="submit" class="form-control" value="Agregar">
          </div>
        </div>
        </form>-->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>