<?php require_once 'Conexion.php';

class Grado extends Conexion{

  private $id_grado;
  private $descripcion_grado;

  public function __construct(){
      parent::__construct();
  }

  public function setIdGrado($arg_grado){
      $this->id_grado= $arg_grado;
  }
  public function setDescripcionGrado($arg_descripcion){
      $this->descripcion_grado= $arg_descripcion;
  }
public function listarGrados(){
  $grados= $this->consultaRegistros("select * from tb_grados");
  return $grados;
}
}
?>
