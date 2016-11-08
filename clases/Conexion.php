<?php
  class Conexion{

    private $servidor;
    private $usuario;
    private $clave;
    private $baseDatos;
    protected $varConexion;

    public function __construct()
    {
      $this->servidor="localhost";
      $this->usuario="root";
      $this->clave="";
      $this->baseDatos="sistemadeactas";


      $this->varConexion = new mysqli($this->servidor,$this->usuario,$this->clave,$this->baseDatos);
        if ($this->varConexion->connect_errno) {
            echo "Error: Fallo al conectarse a MySQL debido a: \n";
            echo "Errno: " . $this->varConexion->connect_errno . "\n";
            echo "Error: " . $this->varConexion->connect_error . "\n";
            exit;
        }
    }

    public function consultaRegistros($arg_consulta){
      $resultado= $this->varConexion->query($arg_consulta);

        if(!$resultado) {
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $sql . "\n";
            echo "Error numero: " . $this->varConexion->errno . "\n";
            echo "Error: " . $this->varConexion->error . "\n";
            exit;
        }else{
           $listado = $resultado->fetch_all(MYSQLI_ASSOC);
           return $listado;
        }
    }

    public function ejecutarConsulta($arg_consulta){
      //echo $arg_consulta;
       $resultado= $this->varConexion->query($arg_consulta);
       $filas= $resultado->fetch_array();
       echo $filas;
    }

    public function consultaExistencia($arg_consulta){
      $resultado= $this->varConexion->query($arg_consulta);

        if (!$resultado) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $this->varConexion->errno . "\n";
            echo "Error: " . $this->varConexion->error . "\n";
            exit;
        }else{
            if($resultado->num_rows==0) {
              return false;//entrega false si no hay registros
            }else{
              return true;//entrega true si hay registros
            }
        }
    }
    public function cantidadRegistros($arg_consulta){
      $resultado= $this->varConexion->query($arg_consulta);

        if (!$resultado) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $arg_consulta . "\n";
            echo "Errno: " . $this->con->errno . "\n";
            echo "Error: " . $this->con->error . "\n";
            exit;
        }else{
            $cantidad= $resultado->num_rows;
            return $cantidad;
        }
    }

    public function mostrarVariables(){
      $variables= "host: ".$this->servidor."; user: ".$this->usuario."; clave: ".$this->clave."; baseDatos: ".$this->baseDatos;

      return $variables;
    }
    public function limpiarTexto($arg_campoTexto){
        $resultado= filter_var($arg_campoTexto, FILTER_SANITIZE_STRING);
        return $resultado;
    }

    public function BuscarFiltarRegistros($arg_tabla,$arg_campoBuscar,$arg_palabraBuscar,$arg_pagina,$arg_cantidadRegistros){
       $arg_palabraBuscar=$this->limpiarTexto($arg_palabraBuscar);

       $consulta="";
       $consultaCantidad;

       $cantidadRegistros = $arg_cantidadRegistros;
       $inicio = ($arg_pagina > 1 ) ? ($arg_pagina * $cantidadRegistros - $cantidadRegistros) : 0;

         if($arg_palabraBuscar!=''){
           $consulta="select sql_calc_found_rows * from ".$arg_tabla." where ".$arg_campoBuscar." like '%".$arg_palabraBuscar."%' limit ".$inicio.",".$cantidadRegistros;
           $consultaCantidad="select * from ".$arg_tabla." where ".$arg_campoBuscar." like '%".$arg_palabraBuscar."%' ";

         }else{
           $consulta="select sql_calc_found_rows * from ".$arg_tabla." limit ".$inicio.",".$cantidadRegistros;
           $consultaCantidad="select * from ".$arg_tabla;
         }
         //echo $consulta;
         $resultado=$this->consultaRegistros($consulta);
         $cantidad= $this->cantidadRegistros($consultaCantidad);

             $cantidad= ($cantidad/$arg_cantidadRegistros);
             $cantidad= ceil($cantidad);

             $paginador="";
                 for($c=1; $c<=$cantidad; $c++){
                    $paginador.='<a class="btn btn-default" href="javascript:cambiarPagina('.$c.')">'.$c.'</a>';
                 }
         $devuelve[0][0] = $resultado;
         $devuelve[0][1] = $paginador;

         return $devuelve;
     }
  }
?>
