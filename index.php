<?php
    include("./principal/comun.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="./js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>

<body>



		<div class="container">
      <div class="login col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<form name="formularioLogin">

          <div class="row">
              <h3 class="text-primary text-center">Ingreso</h3>
          </div>
          <div class="row">
              <input class="form-control" type="text" id="rut" onkeypress="return soloNumerosyK(event);" maxlength="12" onBlur="formatearRut(this.value)" placeholder="Ingrese su rut"/>
          </div>
          <div class="row">
            <input class="form-control" type="password" id="contrasena" placeholder="Contraseña"/>
          </div>
          <div class="row">
            	<a href="./principal/principal.php" class="col-sm-4 btn btn-primary" style="width:100%;" >Ingresar</a>
          </div>

      				<div id="mensaje">
      					<span id="etiquetaMensaje"></span>
      				</div>

		  	</form>
    	</div>
		</div>

		<script type="text/javascript">
/*				  document.onkeypress=function(e){
					var esIE=(document.all);
					var esNS=(document.layers);
					tecla=(esIE) ? event.keyCode : e.which;
					if(tecla==13){
						ingresar();
					  }
					}
*/

		</script>
		<script type="text/javascript">
			$("#login").fadeIn(1000,"swing");
		</script>
		<footer>

		</footer>
	</body>
</html>
