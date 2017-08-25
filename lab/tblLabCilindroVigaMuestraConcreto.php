<?php
	//	tbl_lab_cilindro_viga_muestra_concreto
	//Resivirá un parametro de operación según o que se quiera hacer:
	// 1. insertar, 2.modificar, 4. eliminar , 5. consultar
	//recive string con los datos del objeto en formato json. 
	include_once("../conexion.php"); 
	// $jsonData = $_GET['jsonData'];
	// $operacion = $_GET['operacion'];

	 

	$jsonData = 	 "{ "
				     .'"id_n_cilindro_viga": "17", '
					 .'"tipo_cilindro_viga": "tipo ", '
					 .'"id_fecha_muestra" : "2017-01-30", '
					 .'"id_n_viaje" : "45", '
					 .'"id_codigo_proyecto":"S1702", ' 
					 .'"peso_lbs" :"2", '
					 .'"fecha_ruptura":"2017-08-10",'
					 .'"n_dias":"10", '
					 .'"lectura_lbs":"10", '
					 .'"resistencia_lbsPulg2":"12", '
					 .'"fc_lbsPulg2":"12", '
					 .'"rest_porcentaje":"123", '
					 .'"tipo_fractura":"45", '
					 .'"orden_trabajo":"34", '
					 .'"fecha_registro":"2017-08-17 00:00:00" ' 
					 .'}';	
	$operacion = 1;

	switch ($operacion) {
		case '1':
			//insertar un registro
			$nuevoRegistro = json_decode($jsonData);
			$insert = "insert into tbl_lab_cilindro_viga_muestra_concreto ( "
					 .'id_n_cilindro_viga, '
					 .'tipo_cilindro_viga, '
					 .'id_fecha_muestra, '
					 .'id_n_viaje, '
					 .'id_codigo_proyecto, ' 
					 .'peso_lbs, '
					 .'fecha_ruptura,'
					 .'n_dias, '
					 .'lectura_lbs, '
					 .'resistencia_lbsPulg2, '
					 .'fc_lbsPulg2, '
					 .'rest_porcentaje, '
					 .'tipo_fractura, '
					 .'orden_trabajo, '
					 .'fecha_registro ) '
					 ."values ( '"
					 .$nuevoRegistro->{'id_n_cilindro_viga' }."', '"
					 .$nuevoRegistro->{'tipo_cilindro_viga' }."', '"
					 .$nuevoRegistro->{'id_fecha_muestra' }."', '"
					 .$nuevoRegistro->{'id_n_viaje' }."', '"
					 .$nuevoRegistro->{'id_codigo_proyecto' }."', '" 
					 .$nuevoRegistro->{'peso_lbs' }."', '"
					 .$nuevoRegistro->{'fecha_ruptura'}."', '"
					 .$nuevoRegistro->{'n_dias' }."', '"
					 .$nuevoRegistro->{'lectura_lbs' }."', '"
					 .$nuevoRegistro->{'resistencia_lbsPulg2' }."', '"
					 .$nuevoRegistro->{'fc_lbsPulg2' }."', '"
					 .$nuevoRegistro->{'rest_porcentaje' }."', '"
					 .$nuevoRegistro->{'tipo_fractura' }."', '"
					 .$nuevoRegistro->{'orden_trabajo' }."', '"
					 .$nuevoRegistro->{'fecha_registro' }."' )";

			echo $insert;
			$Result = getSQLResultSet($insert);
			if ($Result == 1) {
				echo "almacenado correctamente";
			}else
				echo "no se almacenó el registro".$Result;
			 
			break;

		case '2':
			//modificar un registro

		
		default:
			# code...
			break;
	}

?>