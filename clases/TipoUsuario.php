<?php require_once 'Conexion.php';

class TipoUsuario extends Conexion{

  private $id_tipo;
  private $descripcion_tipo;

  public function __construct(){
      parent::__construct();
  }

  public function setIdTipo($arg_tipo){
      $this->id_tipo= $arg_tipo;
  }
  public function setDescripcionTipo($arg_descripcionTipo){
      $this->descripcion_tipo= $arg_descripcionTipo;
  }
public function listarTipo(){
  $tipoUsuario= $this->consultaRegistros("select * from tb_tipo_usuario");
  return $tipoUsuario;
}
}
?>
