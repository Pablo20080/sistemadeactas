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
				cargarPasos(4);
    ?>

  <div class="container contenedorPrincipal">
		<div class="container-fluid">

    			<div class="row">
    				<h3 class="text text-info ">¿Que actas desea imprimir?</h3>
    				<button class="col-xs-1 btn btn-default">TODO</button>
    				<button class="col-xs-1 btn btn-default">NINGUNO</button>
    			</div>

    			<div class="container col-xs-4 ">
    					<div class="row">
    						<input type="checkbox"><label for="">Acta allanamiento</label>
    					</div>
    					<div class="row">
    						<input type="checkbox"><label for="">Acta declaracion</label>
    					</div>
    					<div class="row">
    						<input type="checkbox"><label for="">Acta investigacion</label>
    					</div>
    					<div class="row">
    						<input type="checkbox"><label for="">Acta desalojo</label>
    					</div>
    					<div class="row">
    						<input type="checkbox"><label for="">Acta detencion</label>
    					</div>
    					<div class="row">
    						<input type="checkbox"><label for="">Acta solicitud</label>
    					</div>
              <div class="row">

                <a href="pasoCreacion2.php" class=" btn btn-danger">Volver</a>
        				<a href="#" class=" btn btn-success">IMPRIMIR</a>
              </div>
    			</div>

		</div>
</div>
    <?php
        cargarFooter();
    ?>


</body>
</html>
