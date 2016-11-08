<?php include("../principal/comun.php"); ?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html lang="es">
<head>
    <?php head(); ?>
</head>
<body>
    <?php  cargarHeader(); ?>


    <div class="container-fluid">

          <form class="form-horizontal" name="formularioCreacion" id="formularioCreacion" action="">

            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_run">Run</label>
                  <div class="col-lg-3">
                    <input  onBlur="validarRut();" required minlenght="12" title="Complete este campo" placeholder="Rut" class="form-control" id="txt_run" name="txt_run" type="text" >
                  </div>
            </div>

            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_nombre">Nombres</label>
                  <div class="col-lg-3">
                    <input required title="Complete este campo" placeholder="Nombre" id="txt_nombre" name="txt_nombre" type="text" class="form-control">
                  </div>
            </div>

            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_apellido">Apellidos</label>
                  <div class="col-lg-3">
                    <input required title="Complete este campo" placeholder="Apellido" id="txt_apellido" name="txt_apellido" type="text" class="form-control">
                  </div>
            </div>

            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_correo">Correo</label>
                  <div class="col-lg-3">
                    <input required title="Complete este campo" placeholder="Correo" id="txt_correo" name="txt_correo" type="text" class="form-control">
                  </div>
            </div>

            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="select_tipoUsuario">Tipo Usuario</label>
                  <div class="col-lg-3">
                    <select id="select_tipoUsuario" class="form-control" name="select_tipoUsuario" id="">
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
                  <label class="sr-only control-label col-lg-2" for="select_grado">Tipo Usuario</label>
                  <div class="col-lg-3">
                    <select id="select_grado" class="form-control" name="select_grado" id="">
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
                  <label class="sr-only control-label col-lg-2" for="txt_clave1">Contraseña</label>
                  <div class="col-lg-3">
                    <input required title="Complete este campo" placeholder="Contraseña" id="txt_clave1" name="txt_clave1" type="password" class="form-control">
                  </div>
            </div>

              <div id="divClave2" class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_clave2">Repita Contraseña</label>
                  <div class="col-lg-3">
                    <input required title="Complete este campo" placeholder="Confirme Contraseña" id="txt_clave2" name="txt_clave2" type="password" class="form-control">
                  </div>
              </div>

              <div  class="form-group">
                <div class="col-lg-4 col-lg-offset-2">
                    <div id="mensaje" class=""></div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-4 col-lg-offset-1">
                  <input required type="submit" onclick="crearUsuario()" class="btn btn-success pull-right" value="Guardar">
                </div>
              </div>
            </form>

        </div>

    </div>

<script type="text/javascript">

  $("#formularioCreacion").submit(function(){
      event.preventDefault();

        var clave1= $("#txt_clave1").val();
        var clave2= $("#txt_clave2").val();

        if(clave1==clave2){
            $.ajax({
                url:"./funcionesMantenedores.php?mant=1&func=1",
                data: $("#formularioCreacion").serialize(),
                success:function(resultado){

                      if(resultado=="2"){
                              alert("AGREGADO CORRECTAMENTE");
                      }else if(resultado=="3"){
                              alert("MODIFICADO CORRECTAMENTE");
                      }else{
                          alert(resultado);
                          $("#mensaje").html(resultado);
                      }
                }
            });
          }else{
            $("#mensaje").html('<p class="text-danger" >Contraseñas no coinciden</p>');
            $("#divClave2").addClass("has-warning");
            $("#divClave1").addClass("has-warning");
          }
    });

    function validarRut(){
        var rut= $("#txt_run").val();
        //alert(rut);
        $.ajax({
          url:"./funcionesMantenedores.php?mant=1&func=2",
          data:"txt_run="+rut,
          success:function(respuesta){
              if(respuesta=="1"){
                  alert("RUT CORRECTO");
              }else if(respuesta=="2"){
                  alert("RUT INCORRECTO");
              }else{
                  alert(respuesta);
              }
          }
        });
    }

//  $("#formularioCreacion").validate();


</script>

</body>
</html>
