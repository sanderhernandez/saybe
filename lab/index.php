<?php

include_once("../class/conexion.php");  
$miConexion = new Conexion();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Generador de reportes</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="../css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<div class="container">
		<div class="row">
			<br>
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel panel-default">
				  <div class="panel-heading">
				  	<div class="row">
				  		<div class="col-sm-4">
				  		<img src="../imagenes/saybelogo.png">
				  		</div>
				  		<div class="col-sm-6">
				  			<h2>Reportes de Laboratorio</h2>
				  		</div>
				  	</div>
				  </div>
				  <div class="panel-body">
				  	<div class="row">
				  		<div class="col-sm-5">
				  			<select class="form-control" name="tiposReporte">
							  <option value="1">Reporte de control de muestras de campo</option>
							  <option value="2">Reporte de rupturas de vigas</option>
							  <option value="3">Reporte de rupturas de Cilindros</option>
							</select>
				  		</div>
				  		<div class="col-sm-2">
				  			<input type="text" class="form-control" id="txtCodProyecto" placeholder="Codigo">
				  		</div>
				  		<div class="col-sm-2">
				  			<input type="text" class="form-control" id="txtOrden" placeholder="Orden de trabajo">
				  		</div>
				  		<div class="col-sm-3">
				  			<a  onclick="descargar()"  href="#" class="btn btn-default ">Descargar <img src="../imagenes/pdf.png" width="25" height="20"/></a>
				  		</div>
				  	</div>
				    <br>
				    <table class="table">
				    	<thead>
			    			<th>Codigo  </th>
			    			<th>Nombre de proyecto</th>
			    			<th>Localizacíón</th>
				    	</thead>
				    	<tbody>
				    <?php

					    $consultaSQL = "select id_codigo_proyecto, nombre_proyecto, ubicacion from tbl_proyecto";
						$resultado = $miConexion->ejecutarInstruccion($consultaSQL);
						while ($fila = $miConexion->obtenerFila($resultado)){
					?>
							<tr>
								<td><?php echo $fila['id_codigo_proyecto']?></td>
								<td><?php echo $fila['nombre_proyecto']?></td>
								<td><?php echo $fila['ubicacion']?></td>
							</tr>

					<?php 	}

					$miConexion->liberarResultado($resultado);
					$miConexion->cerrarConexion();

				    ?>

				    	</tbody>
				    </table>
				  </div>
				</div>
			</div>
		</div>

	</div>

	<script src="../js/jquery.js"></script>
	<script type="text/javascript">
		function codProyectoVacio(){
			if ($('#txtCodProyecto').val() == '') {
				alert('Necesita indicar el código del proyecto');
				return true;
			}else
				return false;
		}

		function txtOrdenvacio(){
			if ($('#txtOrden').val() == '') {
				alert('Necesita indicar el numero de orden de trabajo');
				return true;
			}else
				return false;
		}

		function descargaR1(){
			if( codProyectoVacio()==false && txtOrdenvacio()==false){
				var url1 = "reporteControlMuestraConcreto.php?codProyecto="+$('#txtCodProyecto').val()+"&ordenTrabajo="+$('#txtOrden').val();
				window.location.href = url1;
			}
		}

		function descargaR2(){
			if( codProyectoVacio()==false  ){
				var url1 = "reporteRupturaDeVigas.php?codProyecto="+$('#txtCodProyecto').val();
				window.location.href = url1;
			}
		}

		function descargaR3(){
			if( codProyectoVacio()==false  ){
				var url1 = "reporteRupturaCilindros.php?codProyecto="+$('#txtCodProyecto').val();
				window.location.href = url1;
			}
		}

		function descargar(){
			var opcion = $('select[name=tiposReporte]').val();
			switch(opcion){
				case '1':
					alert(opcion);
					descargaR1();
					break;
				case '2':
					descargaR2();
					break;
				case '3':
					descargaR3();
					break;
			}
		}

	</script>

</body>
</html>
