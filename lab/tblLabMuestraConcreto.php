<?php
	//tbl_lab_muestra_concreto
	//Resivirá un parametro de operación según o que se quiera hacer:
	// 1. insertar, 2.modificar, 4. eliminar , 5. consultar
	//recive string con los datos del objeto en formato json.
	include_once("../conexion.php");
	// $jsonData = $_GET['jsonData'];
	// $operacion = $_GET['operacion'];



	$jsonData = 	 "{ "
				     .'"id_fecha_muestra": "12/10/17", '
					 .'"id_n_viaje": "1", '
					 .'"id_codigo_proyecto" : "S1702", '
					 .'"elemento" : "elemento 45", '
					 .'"cantidad_M3":"1", '
					 .'"n_camion" :"2", '
					 .'"hora_salida_en_planta":"10:00:00",'
					 .'"hora_llegada_proyecto":"10:01:00", '
					 .'"hora_salida_proyecto":"10:12:12", '
					 .'"temperatura":"12", '
					 .'"rev_pulg":"12", '
					 .'"aditivo_ml":"123", '
					 .'"fc_lbsPulg2":"45", '
					 .'"observaciones":"alguna cosa que observar", '
					 .'"fecha_registro":"12/11/12", '
					 .'"id_usuario":"alexander" '
					 .'}';

	$operacion = 3;

	switch ($operacion) {
		case '1':
			//insertar el objeto en la tabla tbl_lab_muestra_concreto
			$nuevoRegistro = json_decode($jsonData);
			$insert = "insert into tbl_lab_muestra_concreto ( "
					 ."id_fecha_muestra, "
					 ."id_n_viaje, "
					 ."id_codigo_proyecto, "
					 ."elemento, "
					 ."cantidad_M3, "
					 ."n_camion, "
					 ." hora_salida_en_planta,"
					 ." hora_llegada_proyecto, "
					 ."hora_salida_proyecto, "
					 ."temperatura, "
					 ."rev_pulg, "
					 ."aditivo_ml, "
					 ."fc_lbsPulg2, "
					 ." observaciones, "
					 ."fecha_registro, "
					 ."id_usuario ) "
					 ."values ( '"
					 .$nuevoRegistro->{'id_fecha_muestra' }."', '"
					 .$nuevoRegistro->{'id_n_viaje' }."', '"
					 .$nuevoRegistro->{'id_codigo_proyecto' }."', '"
					 .$nuevoRegistro->{'elemento' }."', '"
					 .$nuevoRegistro->{'cantidad_M3' }."', '"
					 .$nuevoRegistro->{'n_camion' }."', '"
					 .$nuevoRegistro->{'hora_salida_en_planta'}."', '"
					 .$nuevoRegistro->{'hora_llegada_proyecto' }."', '"
					 .$nuevoRegistro->{'hora_salida_proyecto' }."', '"
					 .$nuevoRegistro->{'temperatura' }."', '"
					 .$nuevoRegistro->{'rev_pulg' }."', '"
					 .$nuevoRegistro->{'aditivo_ml' }."', '"
					 .$nuevoRegistro->{'fc_lbsPulg2' }."', '"
					 .$nuevoRegistro->{'observaciones' }."', '"
					 .$nuevoRegistro->{'fecha_registro' }."', '"
					 .$nuevoRegistro->{'id_usuario' }."' )";

			echo $insert;
			$Result = getSQLResultSet($insert);
			if ($Result == 1) {
				echo "almacenado correctamente";
			}else
				echo "no se almacenó el registro".$Result;

			break;

		case '2':
		//Modificar un registro de la tabla
		//update tbl_lab_muestra_concreto set elemento = "un elemento" where id_fecha_muestra = "2012-10-17"
			$nuevoRegistro = json_decode($jsonData);
			$Update = "Update tbl_lab_muestra_concreto set "
					 ."id_fecha_muestra =  '".$nuevoRegistro->{'id_fecha_muestra' }."', "
					 ."id_n_viaje =  '".$nuevoRegistro->{'id_n_viaje' }."', "
					 ."id_codigo_proyecto =  '".$nuevoRegistro->{'id_codigo_proyecto' }."', "
					 ."elemento =  '".$nuevoRegistro->{'elemento' }."', "
					 ."cantidad_M3 = '".$nuevoRegistro->{'cantidad_M3' }."', "
					 ."n_camion = '".$nuevoRegistro->{'n_camion' }."', "
					 ." hora_salida_en_planta = '".$nuevoRegistro->{'hora_salida_en_planta'}."', "
					 ." hora_llegada_proyecto = '".$nuevoRegistro->{'hora_llegada_proyecto' }."', "
					 ."hora_salida_proyecto =  '".$nuevoRegistro->{'hora_salida_proyecto' }."', "
					 ."temperatura =  '".$nuevoRegistro->{'temperatura' }."', "
					 ."rev_pulg =  '".$nuevoRegistro->{'rev_pulg' }."', "
					 ."aditivo_ml =  '".$nuevoRegistro->{'aditivo_ml' }."', "
					 ."fc_lbsPulg2 =  '".$nuevoRegistro->{'fc_lbsPulg2' }."', "
					 ." observaciones = '".$nuevoRegistro->{'observaciones' }."', "
					 ."fecha_registro =  '".$nuevoRegistro->{'fecha_registro' }."', "
					 ."id_usuario = '".$nuevoRegistro->{'id_usuario' }."' "
					 ." where id_fecha_muestra = '".$nuevoRegistro->{'id_fecha_muestra' }."'";


			echo $Update;
			$Result = getSQLResultSet($Update);
			if ($Result == 1) {
				echo "Actualilzado correctamente";
			}else
				echo "no se almacenó el registro".$Result;

			break;

		case '3':
			//eliminar un registro de la base de datos
			//DELETE FROM `tbl_lab_muestra_concreto` WHERE id_fecha_muestra =
			$nuevoRegistro = json_decode($jsonData);
			$delete = "DELETE FROM tbl_lab_muestra_concreto WHERE id_fecha_muestra = '".$nuevoRegistro->{'id_fecha_muestra' }."'";
			echo $delete;
			$Result = getSQLResultSet($delete);
			if ($Result == 1) {
				echo "se elimino";
			}
			break;
		default:
			echo "Operacion desconocida";
			break;
	}




?>
