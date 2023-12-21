<?php
 
  include_once('../config/config.php');
  include('../config/database.php');
  

  class Candidato{

  public $conexion; 

  function __construct()
  {
    $db = new Database();
    $this->conexion =$db->connectToDatabase();
  }

  function save($params){
    $NombreCompleto = $params['NombreCompleto'];
    $CorreoElectronico = $params['CorreoElectronico'];
    $Celular = $params['Celular'];
    $HojadeVida = $params['HojadeVida'];

    $insert = "INSERT INTO candidatos VALUES (NULL,'$NombreCompleto', '$CorreoElectronico', '$Celular', '$HojadeVida') ";
    return mysqli_query($this->conexion, $insert);
  }

  function getAll(){
    $sql = "SELECT * FROM Candidatos";
    return mysqli_query($this->conexion, $sql);

  }

  function getOne($id){
    $sql = "SELECT * FROM Candidatos WHERE id = $id";
    return mysqli_query($this->conexion, $sql);
  }
function update($params){
  $NombreCompleto = $params['NombreCompleto'];
  $CorreoElectronico = $params['CorreoElectronico'];
  $Celular = $params['Celular'];
  $HojadeVida = $params['HojadeVida'];
    $id = $params['id'];

    $update = " UPDATE Candidatos SET NombreCompleto='$NombreCompleto', 
    CorreoElectronico='$CorreoElectronico', Celular='$Celular', HojadeVida='$HojadeVida' WHERE id = $id";
    return mysqli_query($this->conexion, $update);
  }
    function delete($id){
     $delete = "DELETE FROM Candidatos WHERE id = $id";
     return mysqli_query($this->conexion, $delete);
    }
  
}

?>