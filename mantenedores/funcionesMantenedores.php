<?php

switch($_REQUEST['mant']){

    case "1"://mantenedor usuario
            include "../clases/Usuario.php";
            $Usuario= new Usuario();

              switch($_REQUEST['func']){

                  case "1":// Ingresar / Modificar Usuario
                                
                                $campoRut=$_REQUEST['txt_runCrear'];
                                $posicionGuion= strpos($campoRut,"-");
                                $rut= substr($campoRut,0,$posicionGuion);
                                $dv= substr($campoRut,$posicionGuion+1,$posicionGuion+1);

                                $Usuario->setRun($rut);
                                $Usuario->setDv($dv);
                                $Usuario->setNombre($_REQUEST["txt_nombreCrear"]);
                                $Usuario->setApellido($_REQUEST["txt_apellidoCrear"]);
                                $Usuario->setCorreo($_REQUEST["txt_correoCrear"]);
                                $Usuario->setClave($_REQUEST["txt_clave1Crear"]);
                                $Usuario->setGrado($_REQUEST["select_gradoCrear"]);
                                $Usuario->setEstado("1");
                                $Usuario->setTipo($_REQUEST["select_tipoUsuarioCrear"]);

                                $Usuario->insertarModificarUsuario();
                            break;
                  case "2"://Comprobar Rut
                                echo $Usuario->validarRut($_REQUEST['txt_run']);
                            break;
                  case "3"://listar Usuario
                            ?>
                            <table class="table table-bordered table-colapse">
                              <thead>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Grado</th>
                                <th>Estado</th>
                                <th>Privilegios</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                              </thead>
                              <tbody>
                            <?php
                                          $retorno= $Usuario->BuscarFiltarRegistros("vistausuarios","nombre",$_REQUEST['buscar'],$_REQUEST['pag'],$_REQUEST['cantidadReg']);
                                          $listado=$retorno[0][0];
                                          $contador=0;
                                          foreach($listado as $columna){
                                          $contador++;
                                          echo '<tr>
                                                    <td><input type="text" readonly class="form-control" id="txt_run'.$contador.'" value="'.$columna['run'].'" ></td>
                                                    <td><input type="text"readonly class="form-control"  id="txt_nombre'.$contador.'" value="'.$columna['nombre'].'" ></td>
                                                    <td><input type="text"readonly class="form-control"  id="txt_apellido'.$contador.'" value="'.$columna['apellido'].'" ></td>
                                                    <td><input type="text" readonly class="form-control" id="txt_correo'.$contador.'" value="'.$columna['correo'].'" ></td>
                                                    <td><input type="text" readonly class="form-control" id="txt_grado'.$contador.'" value="'.$columna['descripcion_grado'].'" >
                                                    <input type="hidden" readonly class="form-control" id="txt_grado1'.$contador.'" value="'.$columna['id_grado'].'" ></td>
                                                    <td><input type="text" readonly class="form-control" id="txt_estado'.$contador.'" value="'.$columna['descripcion_estado'].'" >
                                                    <input type="hidden" readonly class="form-control" id="txt_estado1'.$contador.'" value="'.$columna['id_estado'].'" ></td>
                                                    <td><input type="text" readonly class="form-control" id="txt_tipo_usuario'.$contador.'" value="'.$columna['descripcion_tipoUsuario'].'" >
                                                    <input type="hidden" readonly class="form-control" id="txt_tipo_usuario1'.$contador.'" value="'.$columna['id_tipoUsuario'].'" ></td>
                                                    <td><button type="button"  onclick="mostrarModal('.$contador.')" data-toggle="modal" data-target="#ventanaModal" class="btn btn-warning">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                      </button>
                                                    </td>
                                                    <td>
                                                      <a href="javascript:alert("ELIMINADA")" class="btn btn-danger">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                      </a>
                                                    </td>
                                                </tr>';
                                              }?>
                                              <tr>
                                                                                            <td colspan="9">
                                                                                              <center>
                                                                                              <?php
                                                                                                echo $retorno[0][1];
                                                                                              ?>

                                                                                            </center>
                                                                                            </td>
                                                                                          </tr>
                                                                         </tbody>
                                                                      </table>



                                              <?php
                            break;
              }
             break;
}
?>
