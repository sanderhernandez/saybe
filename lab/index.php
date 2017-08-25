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
				    <br>
				    <table class="table">
				    	<thead>
			    			<th>Reporte disponible</th>
			    			<th>Formato</th>
			    			<th>Acción</th> 
				    	</thead>
				    	<tbody> 
				    		<tr>
				    			<td>Reporte de control de muestras de campo</td>
					    		<td>PDF</td>
					    		<td>
					    			<a href="reporteControlMuestraConcreto.php?codProyecto=S1608&ordenTrabajo=35" class="btn btn-default ">Descargar<img src="../imagenes/pdf.png" width="25" height="20"/></a>
					    		</td>
				    		</tr>
				    		<tr>
				    			<td>Reporte de rupturas de vigas</td>
					    		<td>PDF</td>
					    		<td>
					    			<a href="reporteRupturaDeVigas.php?codProyecto=S1702" class="btn btn-default ">Descargar<img src="../imagenes/pdf.png" width="25" height="20"/></a>
					    		</td>
				    		</tr>
				    		
				    	</tbody>
				    </table>
				  </div>
				</div> 				
			</div>			
		</div>
		
	</div>

</body>
</html>