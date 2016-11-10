<?php
    include("../principal/comun.php");
?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html lang="es">
<head>
    <?php head(); ?>
</head>
<body>
  <?php
     cargarHeader();
   ?>

    <div class="container" style="background:white;">
      <div class="" style="background:white;">
        <div class="row ">
                    <h1 class="col-xs-4 text text-primary">Lista de Funcionarios</h1>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <div class="input-group">
                  <span class="input-group-addon "></span>
                  <input placeholder="Buscar" onKeyUp="cambiarPagina(1)" id="txt_buscar" type="text" class="form-control">
              </div>
        </div>
        <div class="col-xs-4">
                      <label class="control-label col-xs-3" for="cmb_cantidadRegistros">Mostrar</label>
                      <div class="col-xs-6">
                          <select onChange="cambiarPagina(1)" name="cmb_cantidadRegistros" class="form-control" id="cmb_cantidadRegistros">
                            <option value="3">3</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="60">60</option>
                          </select>
                      </div>
              </div>
              <!--BOTON QUE ABRE MODAL DE CREAR NUEVO -->
              <div class="col-xs-4">
                <button class="pull-right col-xs-4 btn btn-success" data-toggle="modal" data-target="#ventanaModalCrear">Nuevo</button>
              </div>
            </div>
            <div class="row">
          <div id="contenedorMantenedor"></div><!-- DIV DONDE SE CARGA LA TABLA-->
          </div>
        </div>
    </div>
    <script>
    var pagina;
    //INICIO SCRIPT PARA CARGAR TABLA Y PAGINADA
      function cambiarPagina(arg_pagina){
           pagina= arg_pagina;
           listarTabla();
      }

      function listarTabla(){

          var busqueda= $("#txt_buscar").val();
          if(busqueda==null){
              busqueda="_";
          }

          $.ajax({
            url:"funcionesMantenedores.php",
            data:"mant=1&func=3&buscar="+busqueda+"&pag="+pagina+"&cantidadReg="+$("#cmb_cantidadRegistros").val(),
            success:function(respuesta){
                  $("#contenedorMantenedor").html(respuesta);
            }
          });

      }
      cambiarPagina(1); //FIN SCRIPT PARA CARGAR TABLA Y PAGINADA
    </script>

    <!--Modal para crear-->
 <div class="modal fade" data-backdrop=”static” data-keyboard=”false”  id="ventanaModalCrear" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Ingresar Nuevos Usuarios</h4>
            </div>
            <div id="modbody" class="modal-body">

              <form class="form-horizontal" name="formularioCreacion" id="formularioCreacion" action="">

                    <!-- CAMPO 1 DEL MODAL-->
            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_runCrear">Run</label>
                  <div class="col-lg-9">
                    <input  required minlenght="12" title="Complete este campo" placeholder="Ej.12123456-7" class="form-control" id="txt_runCrear" name="txt_runCrear" type="text" >
                  </div>
            </div>

            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_nombreCrear">Nombres</label>
                  <div class="col-lg-9">
                    <input required title="Complete este campo" placeholder="Nombre" id="txt_nombreCrear" name="txt_nombreCrear" type="text" class="form-control">
                  </div>
            </div>
            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_apellidoCrear">Apellidos</label>
                  <div class="col-lg-9">
                    <input title="Complete este campo" placeholder="Apellido" id="txt_apellidoCrear" name="txt_apellidoCrear" type="text" class="form-control">
                  </div>
            </div>

            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_correoCrear">Correo</label>
                  <div class="col-lg-9">
                    <input required title="Complete este campo" placeholder="Correo" id="txt_correoCrear" name="txt_correoCrear" type="text" class="form-control">
                  </div>
            </div>

            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="select_tipoUsuarioCrear">Tipo Usuario</label>
                  <div class="col-lg-3">
                    <select id="select_tipoUsuarioCrear" class="form-control" name="select_tipoUsuarioCrear">
                        <?php
                         require '../clases/TipoUsuario.php';
                         $TipoUsuario= new TipoUsuario();
                         $filas= $TipoUsuario->listarTipo();

                         foreach ($filas as $columna) {
                          echo"<option value=".$columna['id_tipo_usuario'].">".$columna['descripcion_tipo_usuario']."</option>";
                         }
                        ?>
                    </select>
                  </div>
            </div>

            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="select_grado">Grado Funcionario</label>
                  <div class="col-lg-3">
                    <select id="select_grado" class="form-control" name="select_grado">
                        <?php
                        require '../clases/Grado.php';
                        $Grados= new Grado();
                        $filas= $Grados->listarGrados();


                        foreach($filas as $columna){
                        echo "<option value=".$columna['id_grado'].">".$columna['descripcion_grado']."</option>";
                      }
                         ?>
                    </select>
                  </div>
            </div>

            <div id="divClave1" class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_clave1Crear">Contraseña</label>
                  <div class="col-lg-9">
                    <input required title="Complete este campo" placeholder="Contraseña" id="txt_clave1Crear" name="txt_clave1Crear" type="password" class="form-control">
                  </div>
            </div>

              <div id="divClave2" class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_clave2Crear">Repita Contraseña</label>
                  <div class="col-lg-9">
                    <input required title="Complete este campo" placeholder="Confirme Contraseña" id="txt_clave2Crear" name="txt_clave2Crear" type="password" class="form-control">
                  </div>
              </div>

                       <!-- BOTON QUE CIERRA MODAL-->
                  <div class="form-group">
                    <div class="col-lg-4 col-lg-offset-1">
                      <input required type="submit" data-toggle="modal" data-target="#ventanaModalCrear" class="btn btn-success pull-right" value="Guardar">
                    </div>
                  </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
          </div>
</div>
<script type="text/javascript">
$("#formularioCreacion").submit(function(){
      event.preventDefault();

        var clave1=$("#txt_clave1Crear").val();
        var clave2=$("#txt_clave2Crear").val();

//swal({title:"Cargando", text:"Espere un momento.", showConfirmButton:true,allowOutsideClick:false,showCancelButton: false,closeOnConfirm: false});
        if(clave1==clave2){
         $.ajax({
             url:"./funcionesMantenedores.php?mant=1&func=1",
             data: $("#formularioCreacion").serialize(),
             success:function(resultado){

               if(resultado=="1"){
                       swal("Operacion exitosa!", "Agregado Correctamente", "success");
                       cambiarPagina(1);
               }else if(resultado=="2"){
                       sweetAlert("Ocurrió un error", "Hay campos vacios", "error");
               }else if(resultado=="3"){
                       sweetAlert("Ocurrió un error", "El Run que intenta ingresar ya existe.", "error");
               }else{
                     sweetAlert("Ocurrió un error", "No se pudo concretar la operacion", "error");
               }
             }
         });
          }else{
            //alert("claves no coinciden");
          sweetAlert("Ocurrió un error", "No se pudo concretar la operacion, claves no coinciden!", "error");
          }
    });
</script>

</body>
</html>
