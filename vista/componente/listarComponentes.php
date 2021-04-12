<!doctype html>
<?php
  include_once '../../controlador/controladorComponentes.php';
  include_once '../../modelo/conexion.php';
  include_once '../../modelo/componente.php';
?>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Listado de Componentes</title>
  </head>
  <body>

    <div class="container">
      <div class="row mt-5">
        <div class="col-md-12">
          <h1 class="text-center">
            Listado de Componentes
          </h1>
          <div class="row">
            <div class="col">
              <a class="btn btn-primary" href="../formularioCrearComponente.php">Crear nuevo</a>
            </div>
          </div>
          <br>
          <table class="table table-bordered">
            <thread>
              <tr>
                <td>Referencia</td>
                <td>Motherboard</td>
                <td>Procesador</td>
                <td>RAM</td>
                <td>Video</td>
                <td>Fuente</td>
              </tr>
            </thread>
            <tbody>
              <?php

                $controladorComponentes=new controladorComponentes();
                $componentes=$controladorComponentes->listar();
                

                  foreach($componentes as $componente){
                    echo "<tr>";
                    echo "<td>" . $componente->getPzReferencia() . "</td>";
                    echo "<td>" . $componente->getPzMotherboard() . "</td>";
                    echo "<td>" . $componente->getPzProcesador() . "</td>";
                    echo "<td>" . $componente->getPzRam() . "</td>";
                    echo "<td>" . $componente->getPzVideo() . "</td>";
                    echo "<td>" . $componente->getPzFuente(). "</td>";
                    echo "</tr>";
                  }




                  
                /*
                try{
                  $conexion=new PDO("mysql:dbname=componentes;host=127.0.0.1;port=3306","root","");
                  $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  $sql="select * from listado";
                  $ps=$conexion->prepare($sql);
                  $ps->execute(null);
                  */
              
              /*
              while($row=$ps->fetch(PDO::FETCH_OBJ)){
                echo $row->pz_referencia . "" . $row->pz_motherboard . "" . $row->pz_procesador . "" . $row->pz_ram . "" . $row->pz_video . "" . $row->pz_fuente . "<br>";
              }
              */
              
              /*
              while($row=$ps->fetch(PDO::FETCH_OBJ)){
                echo "<tr>";
                  echo "<td>" . $row->pz_referencia . "</td>";
                  echo "<td>" . $row->pz_motherboard . "</td>";
                  echo "<td>" . $row->pz_procesador . "</td>";
                  echo "<td>" . $row->pz_ram . "</td>";
                  echo "<td>" . $row->pz_video . "</td>";
                  echo "<td>" . $row->pz_fuente. "</td>";
                echo "</tr>";
              }
                }catch(PDOException $e){
                  echo"Fallo la conexion a la base de datos" . $e->getMessage();
                }
                */



                ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
