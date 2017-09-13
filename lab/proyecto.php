<?php

include_once("../class/class_conexion.php");  
$miConexion = new Conexion();

$codProyecto = $_GET['codProyecto'];

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
 		.texto-tabulacion{
			font:12px Arial, serif;
		}

		.col5{
			width: 5%;
		}

		.col10{
			width: 10%;
		}
 	</style>


</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<br>
			<div class="col-lg-12  ">
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
				  	<!-- tab de opciones  --> 
				  	<div>
				  	<!-- Nav tabs -->
					  <ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" class="active">
					    	<a href="#general" aria-controls="general" role="tab" data-toggle="tab">
					    	Datos de proyecto
					    	</a>
					    </li>
					    <li role="presentation">
					    	<a href="#elementos" aria-controls="elementos" role="tab" data-toggle="tab">
					    	Muestras de elementos
					    	</a>
					    </li>
					    <li role="presentation">
					    	<a href="#muestras" aria-controls="muestras" role="tab" data-toggle="tab">
					    	Muestras de elementos
					    	</a> 
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
					  	<!--Inicio de tab general -->
					    <div role="tabpanel" class="tab-pane active" id="general">
					    	<!--extrayendo los datos del proyecto -->
					    	<?php 

								$proyQuery = "Select id_codigo_proyecto, id_cliente, nombre_proyecto, nombre_proyecto_abreviado, ubicacion, fecha_inicio, fecha_fin, fecha_registro, activo from tbl_proyecto where id_codigo_proyecto = '".$codProyecto."'"; ;
								$proyectoResult = $miConexion->ejecutarInstruccion($proyQuery);
								if (!$proyectoResult) {
									echo "<script type='text/javascript'>alert('no se pudo ejecutar consulta')</script>";
								}else 
									$fila = $miConexion->obtenerFila($proyectoResult);
					    	?>
					    	
						    <div class="col-lg-8 col-lg-offset-2 panel-body">
						    	<form class="form-horizontal">
						    		<div class="form-group">
						    			 
						    			<div class="col-sm-12">
						    				<div class="btn-group pull-right" role="group" aria-label="...">
						    					<button type="button" class="btn btn-default" onclick="volver();">
								  					Volver
								  				</button> 
								  				<button type="button" class="btn btn-default" onclick="editarProyecto();">
								  					Editar
								  				</button>  
								  			<div class="btn-group" role="group">
								   				 <?php 
											      		if ($fila[8] == 1) {
											      			echo '<button id="btnEstado" type="button" class="btn btn-default btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Activo<span class="caret"></span></button>';
											      		}else
											      		    echo '<button id="btnEstado" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								   				 		Inactivo<span class="caret"></span></button>';
											     ?>
											    <ul class="dropdown-menu">
											      <li><a href="#" onclick="activarProyecto();"> Activo  </a></li>
											      <li><a href="#" onclick="desactivarProyecto();">Inactivo</a></li>
											    </ul>
								  			</div>
											</div>
						    			</div>
						    		</div>
						    		<div class="form-group">
						    			<label class="col-sm-2">Código proyecto:</label>
						    			<div class="col-sm-4">
						    				<input type="text" class="form-control" id="txtCodProyecto" placeholder="codigo"
						    				 <?php echo "value = '".$fila[0]."'  readonly> " ?>
						    		    </div>
						    			<label class="col-sm-2">Código cliente:</label>
						    			<div class="col-sm-4">
						    				<input type="text" class="form-control" id="txtCodCliente" placeholder="codigo"
						    				<?php echo "value = '".$fila[1]."'  readonly> " ?>
						    			</div>
						    		</div>
						    		<div class="form-group">
						    			<label class="col-sm-2">Nombre de proyecto:</label>
						    			<div class="col-sm-4">
						    				<input type="text" class="form-control" id="txtNomProyecto" placeholder="Nombre"
						    				<?php echo "value = '".$fila[2]."'  readonly> " ?>
						    			</div>

						    			<label class="col-sm-2">Referencia:</label>
						    			<div class="col-sm-4">
						    				<input type="text" class="form-control" id="txtProyectoAbrev" placeholder="referencia"<?php echo "value = '".$fila[3]."'  readonly> " ?>
						    			</div>
						    		</div>
						    		<div class="form-group">
						    			<label class="col-sm-2">Fecha inicio:</label>
						    			<div class="col-sm-4">
						    				<input type="text" class="form-control" id="txtfechaInicio" placeholder=""
						    				<?php echo "value = '".$fila[5]."'  readonly> " ?>
						    			</div>

						    			<label class="col-sm-2">Fecha final:</label>
						    			<div class="col-sm-4">
						    				<input type="text" class="form-control" id="txtFechaFinal" placeholder=""
						    				<?php echo "value = '".$fila[6]."' readonly > " ?>
						    			</div>
						    		</div>
						    		<div class="form-group">
						    			<label class="col-sm-2">Fecha de registro:</label>
						    			<div class="col-sm-4">
						    				<input type="text" class="form-control" id="txtFechaRegistro" placeholder=""
						    				<?php echo "value = '".$fila[7]."' readonly > " ?>
						    			</div>

						    			<label class="col-sm-2">Ubicación:</label>
						    			<div class="col-sm-4"> 
						    				<textarea class="form-control" rows="3" id="txtUbicacion" readonly>
						    					<?php echo  $fila[4] ?>
						    				</textarea>
						    			</div>
						    		</div> 						    		
						    	</form>
 
						    	<div class="btn-toolbar pull-right hidden" role="toolbar" id="editGroup">
								  <div class="btn-group" role="group" >
								  	<button type="button" class="btn btn-default" onclick="cancelEdit();">Cancelar</button> 
								  </div>
								  <div class="btn-group" role="group">
								  	<button type="button" class="btn btn-success" onclick="updateProject();">Guardar</button> 
								  </div>
								</div> 
						    </div>  
					    </div>
					    <!-- fin del tab general -->

					    <!-- Inicio de tab de muestras -->
					    <div role="tabpanel" class="tab-pane" id="elementos">
					    	<br>
					    	<div class="row ">
					    		<div class="col-lg-8">
					    		<form class="form-inline">
			  							<div class="form-group">
			  								<select class="form-control" name="tiposReporte">
			  								  <option>Seleccione un elemento</option>
											  <option value="1">elemento 1</option>
											  <option value="2">elemento 2</option>
											  <option value="3">elemento 3</option> 
											</select>
			  							</div> 
			  							<div class="form-group">
			  								<select class="form-control" name="ordenTrabajo">
			  								  <option>Orden Trabajo</option>
											  <option value="1">104</option>
											  <option value="2">901</option>
											  <option value="3">100</option> 
											</select>
			  							</div> 
			  							<div class="form-group">
			  								<div class="btn-group" role="group" aria-label="...">
											  <button type="button" class="btn btn-default">Nuevo</button>
											  <button type="button" class="btn btn-default">Editar</button>
											  <button type="button" class="btn btn-default">Eliminar</button>
											</div>

											<div class="btn-group" role="group" aria-label="...">
											  <button type="button" class="btn btn-default">Generar Reporte</button> 
											</div>
			  							</div>
			  							 
			  						</form>
					    		</div>
					    		
					    	</div>

					    	<!-- recuperar info de la base de datos -->
					    	<?php 
					    		// $varOrden = "<script type='text/javascript'>
					    		// 		$('select[name=ordenTrabajo]').val();
					    		// 	</script> "; 
					    		// 	echo "numero: ".$varOrden;
					    	?>
 

							<div class="table-responsive">
								<table class="table table-striped texto-tabulacion" id="tablaMuestras"  >
								<thead>
									<th class="col5">No. de viaje</th>
									<th width="5%">Cantidad (M^3)</th>
									<th width="5%">No. De Camión</th>
									<th class="col10">Hora Salida Planta</th>
									<th class="col10">Hora Llegada al <br>Proyecto</th>
									<th class="col10">Hora Salida del Proyecto</th>
									<th width="7%">Temp. (°c)</th>
									<th width="7%">Rev. (Pulg)</th>
									<th width="7%">Aditivo (ml)</th>
									<th width="7%">fc Lbs/Pulg2</th>
									<th width="10%">No. Cilindros/Vigas</th>
									<th  >Observaciones</th>
								</thead>
								<tbody>
									<!--desplegar datos en la tabla -->
							    	 
								</tbody>
								</table>
							</div>
	

					    </div>
					    <div role="tabpanel" class="tab-pane" id="muestras">...</div> 
					  </div>

					</div>
				  	<!--fin de tap de opciones-->
				  	 
				     <?php 
				     	
					$miConexion->cerrarConexion();

					?>
				     
				  </div>
				</div> 		 
			</div>			
		</div>
					
	</div>

	<script src="../js/jquery.js"></script>
	<script src="../js/datatables.js"></script>
	<script src="../js/controller.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	 
	<script type="text/javascript">
		activarTabla(); 
		 
	</script>


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
	      		<form>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div> 
				</form>
			   
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
	        <button type="button" class="btn btn-primary">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>


</body>
</html>