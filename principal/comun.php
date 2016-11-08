<?php
function ConectarBD(){
  $con = new Conexion("localhost","root","","sistemadeactas");
}

function head(){
  ?>
  <script type="text/javascript" src="../js/jquery-3.1.0.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> -->

<?php
}

function cargarHeader(){
    ?>
     <header class="header">

        <nav class="navbar navbar-default menu" role="navigation">
        <!-- El logotipo y el icono que despliega el menú se agrupan
             para mostrarlos mejor en los dispositivos móviles -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse"
                  data-target=".navbar-ex1-collapse">
          </button>
          <a class="navbar-brand " href="../principal/principal.php">GESTION DE ACTAS</a>
        </div>


        <div class="collapse navbar-collapse navbar-ex1-collapse">

          <ul class="nav navbar-nav">
            <li><a href="../principal/pasoCreacion1.php">Creacion Actas</a></li>

            <li><a href="../principal/pasoBusqueda1.php">Busqueda Actas</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Configuraciones <b class="caret"></b>
              </a>

              <ul class="dropdown-menu">
                <li><a href="../mantenedores/mantenedorUsuarios.php">Usuarios</a></li>
              </ul>
            </li>
          </ul>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Salir</a></li>
          </ul>

        </div>

      </nav>
    </header>
<?php
}

function cargarPasos($paso){

             echo '<div class="container center-block">
                 <div class="btb button-group">
          				<h4><span class="col-xs-12 col-sm-6 col-md-6 col-lg-4 label label-'; if($paso==1){echo'primary';}else{echo'info fondoBlanco letraNegra';} echo'" style="float:left;" >Identificar Actas</span></h4>
          			<!--	<h4><span class="col-xs-12 col-sm-6 col-md-6 col-lg-4 label label-'; if($paso==2){echo'primary';}else{echo'info fondoBlanco letraNegra';} echo'" style="float:left;" >Seleccionar Actas</span></h4> -->
          				<h4><span class="col-xs-12 col-sm-6 col-md-6 col-lg-4 label label-'; if($paso==3){echo'primary';}else{echo'info fondoBlanco letraNegra';} echo'" style="float:left;" >Completar</span></h4>
          				<h4><span class="col-xs-12 col-sm-6 col-md-6 col-lg-4 label label-'; if($paso==4){echo'primary';}else{echo'info fondoBlanco letraNegra';} echo'" style="float:left;" >Imprimir</span></h4>
                </div>
            	</div>';
}

function cargarFooter(){
?>
    <footer>
		<div class="container">

		</div>
	</footer>

<?php
}
?>
