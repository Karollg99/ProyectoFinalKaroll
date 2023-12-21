<?php 
include_once('../config/config.php');
include('candidatos.php');

if ( isset($_POST) && !empty($_POST) ){
    $p =new candidato();

    if ($_FILES ['HojadeVida']['name'] !==''){
        $_POST['HojadeVida'] = saveImage($_FILES);
    }

    $ave =$p->save($_POST);
    if ($ave){
        $mensaje = '<div class="alert alert-sucess"> Sesión Registrada </div>';
    }else{
        $mensaje = '<div class="alert alert-danger"> Error al registrar </div>';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
     <meta chatset="UTF-8" />
     <title>Formulario de Contacto</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <link rel="stylesheet" href="../ESTILOS/styles.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary barra"> 
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="../IMAGENES/LOGO.png" width="150px" alt="" class=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav letra">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.html">Inicio<a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../página2.html">Tips</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Candidatos/add.php">Registrate</a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </nav>
        </div>
      </nav>      
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
             <input type="text" name="NombreCompleto"id="NombreCompleto" placeholder="Nombre del Candidato" class="form-control" />
            </div>
            <div class="col">
              <input type="email" name="CorreoElectronico" id="CorreoElectronico" placeholder="Correo electronico del Candidato" class="form-control"/>
            </div>

           </div>
           <div class="row mb-2">
            <div class="col">
             <input type="number" name="Celular"id="Celular" placeholder="Celular del Candidato" class="form-control" />
            </div>

            <div class="row mb-2">
            <div class="col">
             <input type="file" name="HojadeVida"id="HojadeVida" class="form-control" />
            </div>
            <button class="btn btn-success"> Registro </button>
            

           </form>
        </div>
    </body>
</html>