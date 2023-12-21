<?php
include('../config/config.php');
include('candidatos.php');

$p = new candidato();
$dp = mysqli_fetch_object($p->getOne($_GET['id']));


if (isset($_POST) && !empty($_POST)){
  $_POST['HojadeVida'] = $dp->HojadeVida;
  if ($_FILES['HojadeVida']['name'] !== ''){
    $_POST['HojadeVida'] = saveImage($_FILES);
  }
  $update = $p->update($_POST);
  if ($update){
    $mensaje = '<div class="alert alert-success" role="alert">Paciente modificado correctamente</div>';
  }else{
    $mensaje = '<div class="alert alert-danger" role="alert" > Error al modificar un paciente </div>';
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
     <meta chatset="UTF-8" />
     <title>Formulario de Contacto</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>
    <body>
    <?php include ('../menu.php') ?>        
    <div class="container">
            <?php
            if(isset($mensaje)){
                echo $mensaje;
            }
?>

           <h2 class="text-center mb-2"> Registro Formulario de Contacto</h2> 
           <form method="POST" enctype="multipart/form-data" >

           <div class="row mb-2">
            <div class="col">
             <input type="text" name="NombreCompleto"id="NombreCompleto" placeholder="Nombre del Candidato" class="form-control" value="<?= $dp->NombreCompleto ?>" />
             <input type="hidden" name="id"id="id" placeholder="Nombre del Candidato" class="form-control" value="<?= $dp->id ?>" />
            </div>
            <div class="col">
              <input type="email" name="CorreoElectronico" id="CorreoElectronico" placeholder="Correo Electronico del Candidato" class="form-control" value="<?= $dp->CorreoElectronico ?>" />
            </div>

           </div>
           <div class="row mb-2">
            <div class="col">
             <input type="number" name="Celular"id="Celular" placeholder="Celular del Candidato" class="form-control" value="<?= $dp->Celular?>" />
            </div>

            <div class="row mb-2">
            <div class="col">
             <input type="file" name="HojadeVida"id="HojadeVida" class="form-control" value="<?= $dp->HojadeVida ?>"/>
            </div>
            <button class="btn btn-success"> Registro </button>
            

           </form>
        </div>
    </body>
</html>