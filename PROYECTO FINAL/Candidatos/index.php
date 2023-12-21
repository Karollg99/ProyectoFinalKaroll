<?php
  include_once('../config/config.php');
  include('candidatos.php');

  $p = new Candidato();
  $data = $p->getAll();

  if ( isset ($_GET['id']) && !empty ($_GET[ 'id']) ){
     $remove = $p->delete($_GET['id']);
     if ($remove){
        header('Location:'.ROOT. '/Candidatos/index.php');
      } else{
          $mensaje = '<div class="alert alert-danger" role="alert"> Error al eliminar </div>';

        }
     } 
  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Candidatos </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>
    <body>
    <?php include('../menu.php'); ?>
        <div class= "container">
            <h2 class="text center mb-2" > Candidatos </h2>
            <div class ="row">
            <?php
            while( $pt = mysqli_fetch_object($data) ){
               
                echo "<div class='col'>";
                  echo " <div class='border' border-info p-2'> ";
                  echo "<h5>Nombres:$pt->NombreCompleto 
                  <br>
                  Celular: $pt->Celular 
                  <br>
                  Correo: $pt->CorreoElectronico </h5>";
                  
                   echo "<div class='text-center'>";
                   echo "<a class='btn btn-success' href='".ROOT."/Candidatos/edit.php?id=$pt->id' > Modificar </a> - <a class='btn btn-danger' href='".ROOT."/Candidatos/index.php?id=$pt->id'> Eliminar</a>";
                   echo "</div>";
                   echo "</div>";
                   echo "</div>";

            }
            ?>
            </div>
        </div>
    </body>
</html>