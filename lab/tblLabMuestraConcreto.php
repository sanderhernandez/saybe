<?php
	//tbl_lab_muestra_concreto
	//Resivirá un parametro de operación según o que se quiera hacer:
	// 1. insertar, 2.modificar, 4. eliminar , 5. consultar
	//recive string con los datos del objeto en formato json.
	include_once("../class/class_conexion.php");

	$conexion = new Conexion();


$operacion=$_GET["operacion"];
$jsonData=$_GET["jsonData"];

//Indicando zona Horaria:
date_default_timezone_set('America/El_Salvador');

/*
$jsonData ="{ "
				     .'"id_fecha_muestra": "10/10/17", '
					 .'"id_n_viaje": "Se asignará al guardar", '
					 .'"id_codigo_proyecto" : "S1702", '
					 .'"elemento" : "elemento 45", '
					 .'"cantidad_M3":"8", '
					 .'"n_camion" :"mcm-01", '
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
$operacion = 1;
*/

//Reemplazado la (') por la (") en el formato JSON:
$jsonData = str_replace("'", "\"", $jsonData);

	switch ($operacion) {

		case '1':
			//insertar el objeto en la tabla tbl_lab_muestra_concreto
			$nuevoRegistro = json_decode($jsonData);

			$select = "SELECT MAX(id_n_viaje) as id_n_viaje
								FROM tbl_lab_muestra_concreto
								WHERE id_codigo_proyecto = '". $nuevoRegistro->{'id_codigo_proyecto' } . "'"
								."	and id_elemento = '". $nuevoRegistro->{'id_elemento' } . "'"
								."	and id_fecha_muestra = '". $nuevoRegistro->{'id_fecha_muestra' } . "'";

			$Result = $conexion->ejecutarInstruccion($select);
			while ($fila = $conexion->obtenerFila($Result)){
				 $id_n_viajeMas1 = $fila['id_n_viaje'] + 1;
			}

			$insert = "insert into tbl_lab_muestra_concreto ( "
					 ."id_fecha_muestra, "
					 ."id_n_viaje, "
					 ."id_codigo_proyecto, "
					 ."id_elemento, "
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
					 .$id_n_viajeMas1."', '"
					 .$nuevoRegistro->{'id_codigo_proyecto' }."', '"
					 .$nuevoRegistro->{'id_elemento' }."', '"
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
					 .date('Y-m-d H:i:s' , time())."', '"
					 .$nuevoRegistro->{'id_usuario' }."' )";

			//echo $insert;
			$Result = $conexion->ejecutarInstruccion($insert);
			if ($Result == 1) {
				$msj[] = "Se Guardó el viaje: " . $id_n_viajeMas1;
			}else
				$msj[] = "No se guradó. Ya existe el viaje". $id_n_viajeMas1;

			break;

		case '2':
		//Modificar un registro de la tabla
		//update tbl_lab_muestra_concreto set elemento = "un elemento" where id_fecha_muestra = "2012-10-17"
			$nuevoRegistro = json_decode($jsonData);
			$Update = "Update tbl_lab_muestra_concreto set "
					 ."id_fecha_muestra =  '".$nuevoRegistro->{'id_fecha_muestra' }."', "
					 ."id_n_viaje =  '".$nuevoRegistro->{'id_n_viaje' }."', "
					 ."id_codigo_proyecto =  '".$nuevoRegistro->{'id_codigo_proyecto' }."', "
					 ."id_elemento =  '".$nuevoRegistro->{'id_elemento' }."', "
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
					 ."fecha_registro =  '". date('Y-m-d H:i:s' , time()) ."', "
					 ."id_usuario = '".$nuevoRegistro->{'id_usuario' }."' "
					 ." where id_codigo_proyecto = '".$nuevoRegistro->{'id_codigo_proyecto' }."'"
					 ." and id_fecha_muestra = '".$nuevoRegistro->{'id_fecha_muestra' }."'"
					 ." and id_elemento = '".$nuevoRegistro->{'id_elemento' }."'"
					 ." and id_n_viaje = '".$nuevoRegistro->{'id_n_viaje' }."'";


			//echo $Update;
			$Result = $conexion->ejecutarInstruccion($Update);
			if ($Result == 1) {
				$msj[] = "Se Guardaron los cambios del viaje: " . $nuevoRegistro->{'id_n_viaje'};
			}else
				$msj[] = "No se guardaron los cambios del viaje: " . $nuevoRegistro->{'id_n_viaje'};

			break;

		case '3':
			//eliminar un registro de la base de datos
			//DELETE FROM `tbl_lab_muestra_concreto` WHERE id_fecha_muestra =
			$nuevoRegistro = json_decode($jsonData);
			$delete = "UPDATE tbl_lab_muestra_concreto
								SET fecha_eliminado = '". date('Y-m-d H:i:s' , time()) . "'"
							 ." where id_codigo_proyecto = '".$nuevoRegistro->{'id_codigo_proyecto' }."'"
		 					 ." and id_fecha_muestra = '".$nuevoRegistro->{'id_fecha_muestra' }."'"
		 					 ." and elemento = '".$nuevoRegistro->{'elemento' }."'"
		 					 ." and id_n_viaje = '".$nuevoRegistro->{'id_n_viaje' }."'";
			//echo $delete;
			$Result = $conexion->ejecutarInstruccion($delete);
			if ($Result == 1) {
				$msj[] = "Se Eliminó el viaje: " . $nuevoRegistro->{'id_n_viaje'};
			}else {
				# code...
				$msj[] = "No se eliminó el viaje: " . $nuevoRegistro->{'id_n_viaje'};
			}
			break;
		default:
				$msj[] = "Operacion desconocida";
			break;
	}

	echo json_encode($msj);

?>
