<?php
require_once '../clases/Conexion.php';

class Usuario extends Conexion{

  private $run;
  private $dv;
  private $nombre;
  private $apellido;
  private $correo;
  private $clave;
  private $grado;
  private $estado;
  private $tipo;

  public function __construct(){
      parent::__construct();
  }

  public function setRun($arg_run){
      $this->run= $arg_run;
  }
  public function setDv($arg_dv){
      $this->dv= $arg_dv;
  }
  public function setNombre($arg_nombre){
      $this->nombre= $arg_nombre;
  }
  public function setApellido($arg_apellido){
    $this->apellido= $arg_apellido;
  }
  public function setCorreo($arg_correo){
      $this->correo= $arg_correo;
  }
  public function setClave($arg_clave){
      $this->clave= $arg_clave;
  }
  public function setGrado($arg_grado){
        $this->grado= $arg_grado;
    }
  public function setEstado($arg_estado){
          $this->estado= $arg_estado;
      }
  public function setTipo($arg_tipo_usuario){
      $this->tipo= $arg_tipo_usuario;
  }

  public function validarRut($rut)
  {
      if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
          return false;
      }
      $rut = preg_replace('/[\.\-]/i', '', $rut);
      $dv = substr($rut, -1);
      $numero = substr($rut, 0, strlen($rut) - 1);
      $i = 2;
      $suma = 0;
      foreach (array_reverse(str_split($numero)) as $v){
          if ($i == 8)
              $i = 2;
          $suma += $v * $i;
          ++$i;
      }
      $dvr = 11 - ($suma % 11);
      if ($dvr == 11)
          $dvr = 0;
      if ($dvr == 10)
          $dvr = 'K';
      if ($dvr == strtoupper($dv))
          echo "1";
      else
          echo "2";
  }

  public function listarUsuario(){
    $usuarios= $this->consultaRegistros("select * from tb_funcionario inner join tb_grados on tb_funcionario.id_grado=tb_grados.id_grado
                                        inner join tb_estado on tb_funcionario.id_estado=tb_estado.id_estado
                                        inner join tb_tipo_usuario on tb_funcionario.id_tipo_usuario=tb_tipo_usuario.id_tipo_usuario");
    return $usuarios;
  }

  public function insertarModificarUsuario(){
  echo "call insertarModificarUsuario($this->run,'$this->dv','$this->nombre','$this->apellido','$this->correo',$this->grado,$this->estado,'$this->clave',$this->tipo)";
        //$this->ejecutarConsulta("call insertarModificarUsuario($this->run,'$this->dv','$this->nombre','$this->apellido','$this->correo',$this->grado,$this->estado,'$this->clave',$this->tipo)");

  }


}

?>
