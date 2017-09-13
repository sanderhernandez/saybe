<?php

include_once("../class/class_conexion.php");  
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
	<link href="../css/datatables.css" rel="stylesheet" >
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">	
 	<link rel="stylesheet" href="../css/jquery-ui.css">

	<style type="text/css">
		.td-bkc{
			background-color: #0088CC;
		}
	</style>

</head>
<body>
	<div class="container">
		<div class="row">
			<br>
			<div class="col-lg-10 col-lg-offset-1">
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
				  	<!-- panel de opciones -->
				  		<div class="row">
				  			<div class="col-sm-9">  
			  						<form class="form-inline">
			  							<div class="form-group">
			  								<select class="form-control" name="tiposReporte">
			  								  <option>Seleccione un tipo de reporte</option>
											  <option value="1">Reporte de control de muestras de campo</option>
											  <option value="2">Reporte de rupturas de vigas</option>
											  <option value="3">Reporte de rupturas de Cilindros</option> 
											</select>
			  							</div> 
			  							<div class="form-group">
			  								<input type="text" class="form-control" size="8" id="txtCodProyecto" placeholder="Codigo">
			  							</div>
			  							<div class="form-group">
			  								<input type="text" class="form-control" size="8" id="txtOrden" placeholder="Orden de trabajo">
			  							</div>
			  							<div class="form-group">
			  								<a  onclick="descargar()"  href="#" class="btn btn-default ">Descargar <img src="../imagenes/pdf.png" width="25" height="20"/></a>
			  							</div>
			  						</form>
							  		<!-- <div class="col-sm-5">
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
							  		</div>   --> 
				  			</div>
				  			<div class="col-sm-3"> 
			  					<div class="btn-group" role="group" aria-label="...">
								  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" > 
								  Nuevo
								  </button> 
								  <button type="button" class="btn btn-default"> Eliminar </button>
								</div> 
				  			</div>

				  		</div>

				  	<!--fin de panel de opciones-->
				  	<hr>
				    <table class="table table-striped" id="tablaProyectos">
				    	<thead> 
			    			<th>Codigo  </th>
			    			<th>Nombre de proyecto</th>
			    			<th>Localizacíón</th>  
			    			<th></th>
				    	</thead>
				    	<tbody> 
				    <?php

					    $consultaSQL = "select id_codigo_proyecto, nombre_proyecto, ubicacion from tbl_proyecto";
						$resultado = $miConexion->ejecutarInstruccion($consultaSQL);
						while ($fila = $miConexion->obtenerFila($resultado)){ 
					?>
							<tr> 
								<td class="td-bkc"> <?php echo $fila['id_codigo_proyecto']?> </td>
								<td><?php echo $fila['nombre_proyecto']?></td>
								<td><?php echo $fila['ubicacion']?></td>  
								<td><button class="btn btn-info " onclick="verDetalles();">Detalles</button></td>
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
	<script src="../js/datatables.js"></script>
	<script src="../js/controller.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	



	<!-- ventanas modales -->
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Registro de nuevo proyecto</h4>
	      </div>
	      <div class="modal-body">
	      	<div>
	      		<form class="form-horizontal">
	      		  <div class="form-group">
				    <label   class="col-sm-4 control-label">Ingrese código:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="txtmCodProyecto" placeholder="Codigo Proyecto">
				    </div>
				  </div>
				   <div class="form-group">
				    <label   class="col-sm-4 control-label">Seleccione un cliente:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="txtmCliente" placeholder="Cliente">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-4 control-label">Nombre de proyecto:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="txtmNombreProyecto" placeholder="Nombre de proyecto">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-4 control-label">Nombre abreviado:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="txtmNombreAbrev" placeholder="Nombre abreviado">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-4 control-label">Fecha de inicio:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="txtmFechaInicio" placeholder="Fecha de inicio">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-4 control-label">Fecha de fin:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="txtmFechaFinal" placeholder="Fecha de fin">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-4 control-label">Ubicación:</label>
				    <div class="col-sm-8">
				    <textarea class="form-control" id="txtmUbicacion" rows="3" placeholder="Ubicación de proyecto"></textarea> 
				    </div>
				  </div>
				</form> 
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
	        <button type="button" class="btn btn-primary" onclick="saveNewProject();">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>

<script type="text/javascript">
		activarTablaProyectos();
		$('#txtmFechaFinal').datepicker({ dateFormat: 'yy-mm-dd' }); 
		$( "#txtmFechaInicio" ).datepicker({ dateFormat: 'yy-mm-dd' }); 		
	</script>
</body>
</html>