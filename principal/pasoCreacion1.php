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
				cargarPasos(1);
    ?>

	<div class="container">
		<div class=" col-lg-4 contenedoresCreacion">

        <h3 class="text text-info">Ingrese datos para identificar actas.</h3>
        <div class="internoCreacion">

    			<div class="">
    							<input class="form-control" type="date">
    			</div>
    			<div class="">
    							<select name="" id="" class="form-control">
    									<option value="">Funcionario 1</option>
    									<option value="">Funcionario 2</option>
    									<option value="">Funcionario 3</option>
    							</select>
    			</div>

        </div>
		</div>

		<div class=" col-lg-4 contenedoresCreacion">
			<h3 class="text text-info ">Seleccione Unidad.</h3>
			<div class="container internoCreacion">
					<div class="row">
						<input type="radio"><label for="">Unidad </label>
					</div>
					<div class="row">
						<input type="radio"><label for="">Unidad </label>
					</div>
					<div class="row">
						<input type="radio"><label for="">Unidad </label>
					</div>
					<div class="row">
						<input type="radio"><label for="">Unidad</label>
					</div>
			</div>
		</div>

    <div class=" col-lg-4 contenedoresCreacion">
      <h3 class="text text-info ">Seleccione actas que desea crear.</h3>
      <div class="container internoCreacion">
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
      </div>

    </div>
    <div class="row pull-right">
          <a href="pasoCreacion2.php" class="btn btn-success">Continuar</a>
    </div>
</div>

</body>
</html>
