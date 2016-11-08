<?php
    include("./comun.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
		    <?php head(); ?>
</head>
<body>
    <?php
        cargarHeader();
    ?>


		<div class="container contenedorPrincipal">
			<h3 class="text text-info ">Ingrese datos para buscar actas.</h3>
			<div class="row container">
					<select class="form-control" name="" id="">
							<option value="">Brigada Primera</option>
							<option value="">Brigada Segunda</option>
							<option value="">Brigada Tercera</option>
					</select>
			</div>
			<div class="row container">
							<input class="form-control" type="date">
			</div>
			<div class="row container">
							<select name="" id="" class="form-control">
									<option value="">Comisario 1</option>
									<option value="">Comisario 2</option>
									<option value="">Comisario 3</option>
							</select>
			</div>
			<div class="row container">
						<button onclick="buscarActas();" class="btn btn-success">Buscar <span class="glyphicon glyphicon-search"></span></button>
			</div>
		</div>

		<div id="divResultadoBusqueda" class="container contenedorPrincipal">

		</div>



	<script type="text/javascript" >
		function buscarActas(){
			$(document).ready(function(){


					$.post("../paginasAjax/resultadoBusquedaActas.php",$("#flc").serialize(),function(respuesta){
									document.getElementById('divResultadoBusqueda').innerHTML = respuesta;
					});
			});
		}
	</script>

</body>
</html>
