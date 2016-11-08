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
			  cargarPasos(3);
    ?>

		<div class="container contenedorPrincipal">
		<div class="container col-xs-9 col-xs-offset-2 contenedorPrincipal">
			<div class="col-lg-12">
			<h3 class="text text-info ">Datos comunes.</h3>
				<label for="">Dato<input type="text" class="form-control"></label>
				<label for="">Dato<input type="text" class="form-control"></label>
				<label for="">Dato<input type="text" class="form-control"></label>
				<label for="">Dato<input type="text" class="form-control"></label>
				<label for="">Dato<input type="text" class="form-control"></label>
				<label for="">Dato<input type="text" class="form-control"></label>
				<label for="">Dato<input type="text" class="form-control"></label>
				<label for="">Dato<input type="text" class="form-control"></label>
				<label for="">Dato<input type="text" class="form-control"></label>
				<label for="">Dato<input type="text" class="form-control"></label>

				<h3 class="text text-info ">Campos Acta Primera.</h3>
					<label for="">Dato<input type="text" class="form-control"></label>
					<label for="">Dato<input type="text" class="form-control"></label>
					<label for="">Dato<input type="text" class="form-control"></label>
					<label for="">Dato<input type="text" class="form-control"></label>
					<label for="">Dato<input type="text" class="form-control"></label>
					<label for="">Dato<input type="text" class="form-control"></label>
					<label for="">Dato<input type="text" class="form-control"></label>
					<label for="">Dato<input type="text" class="form-control"></label>
					<label for="">Dato<input type="text" class="form-control"></label>
					<label for="">Dato<input type="text" class="form-control"></label>

				</div>
				<div class="row pull-right">
              <a href="pasoCreacion1.php" class="btn btn-danger">Volver</a>
							<a href="pasoCreacion3.php" class="btn btn-success">Continuar</a>
				</div>
		</div>
  </div>
    <?php
        cargarFooter();
    ?>


</body>
</html>
