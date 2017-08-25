<?php
	//tbl_lab_elemento_muestra_concreto
	//Resivirá un parametro de operación según o que se quiera hacer:
	// 1. insertar, 2.modificar, 4. eliminar , 5. consultar
	//recive string con los datos del objeto en formato json. 
	include_once("../conexion.php"); 
	// $jsonData = $_GET['jsonData'];
	// $operacion = $_GET['operacion'];
	$jsonData = '{ '
				.'"id_fecha_muestra": "12/12/17", '
				.'"id_elemento":"44", ' 
				.'"nombre_elemento":"modificadox2", '
				.'"id_codigo_proyecto":"s1704", '
				.'"id_usuario":"alexander" ' 
			    .' }';
	
	$operacion = 3;

	switch ($operacion) {
		case '1':
			//insertar el objeto en la tabla tbl_lab_elemento_muestra_concreto
			$nuevoRegistro = json_decode($jsonData);
			$insert = "insert into tbl_lab_elemento_muestra_concreto "
					 ."(id_fecha_muestra, "
					 ."id_elemento, "
					 ."nombre_elemento, "
					 ."id_codigo_proyecto, "
					 ."id_usuario) "
					 ."values ( '".$nuevoRegistro->{'id_fecha_muestra'}
					 ."' , null  "
					 ." , '".$nuevoRegistro->{'nombre_elemento'}
					 ."' , '".$nuevoRegistro->{'id_codigo_proyecto'}
					 ."' , '".$nuevoRegistro->{'id_usuario'} 
					 ."' )";
			echo $insert;
			$Result = getSQLResultSet($insert);
			if ($Result == 1) {
				echo "almacenado correctamente";
			}else
				echo "no se almacenó el registro".$Result;
			
			break;
		
		case '2':
			//modificar un registro
			$nuevoRegistro = json_decode($jsonData);
			$update = "update tbl_lab_elemento_muestra_concreto set  "
					 ."id_fecha_muestra = '".$nuevoRegistro->{'id_fecha_muestra'}."', "
					 ."id_elemento = '".$nuevoRegistro->{'id_elemento'}."', "
					 ."nombre_elemento = '".$nuevoRegistro->{'nombre_elemento'}."', "
					 ."id_codigo_proyecto = '".$nuevoRegistro->{'id_codigo_proyecto'}."', "
					 ."id_usuario = '".$nuevoRegistro->{'id_usuario'}."' "
					 ." where id_elemento = ".$nuevoRegistro->{'id_elemento'};

			echo $update;

			$Result = getSQLResultSet($update);
			if ($Result == 1) {
				echo "almacenado correctamente";
			}else
				echo "no se almacenó el registro".$Result;
			
			break;

		case '3':
			//eliminar un registro de la tabla
			$nuevoRegistro = json_decode($jsonData);
			$delete = "DELETE FROM tbl_lab_elemento_muestra_concreto WHERE id_elemento = '".$nuevoRegistro->{'id_elemento'}."'";
			echo $delete;
			$Result = getSQLResultSet($delete);
			if ($Result == 1) {
				echo "se elimino";
			}
			break;
		default:
			# code...°		
			break;
	} 




?>