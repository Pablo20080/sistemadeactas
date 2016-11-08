<?php require_once 'Conexion.php';

class Estado extends Conexion{

  private $id_estado;
  private $descripcion_estado;

  public function __construct(){
      parent::__construct();
  }

  public function setIdEstado($arg_estado){
      $this->id_estado= $arg_estado;
  }
  public function setDescripcionEstado($arg_descripcion_estado){
      $this->descripcion_estado= $arg_descripcion_estado;
  }
public function listarEstados(){
  $estados= $this->consultaRegistros("select * from tb_estado");
  return $estados;
}
}
?>
