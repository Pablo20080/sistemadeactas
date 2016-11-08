<?php include("../principal/comun.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php head(); ?>
</head>
<body>
    <?php  cargarHeader(); ?>




    <div class="container contenedorMantenedor col-xs-6">
      <div class="bordeColor"></div>
      <div class="tituloMantenedor">Modificacion Usuario</div>
          <form class="form-horizontal formulario" name="formularioCreacion" id="formularioCreacion" action="">

      <?php $rutUsuario= $_REQUEST['id'];
            echo'
            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_run">Run</label>
                  <div class="col-lg-3">
                    <input  value="'.$rutUsuario.'" onBlur="validarRut();" required minlenght="12" title="Complete este campo" placeholder="Rut" class="form-control" id="txt_run" name="txt_run" type="text" >
                  </div>
            </div>

            <div class="form-group">
                  <label class="sr-only control-label col-lg-2" for="txt_nombre">Nombres</label>
                  <div class="col-lg-3">
                    <input required title="Complete este campo" placeholder="Nombre" id="txt_nombre" name="txt_nombre" type="text" class="form-control">
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
                        <option value="1">Administrador</option>
                        <option value="2">Funcionario</option>
                    </select>
                  </div>
            </div>';
        ?>

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
                              alert("MODIFICADOR CORRECTAMENTE");
                      }else{
                          alert(resultado);
                      }
                }
            });
          }else{
            $("#mensaje").html('<p class="text-danger" >Contraseña no coincide</p>');
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
