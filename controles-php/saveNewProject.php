<?php
	include_once("../class/class_conexion.php");  
	$miConexion = new Conexion();

	$codProyecto = $_POST['codProyecto'];
	$cliente = $_POST['cliente'];
	$NomProyecto = $_POST['NomProyecto'];
	$fechaInicio = $_POST['fechaInicio'];
	$FechaFinal = $_POST['FechaFinal']; 
	$ProyectoAbrev = $_POST['ProyectoAbrev'];
	$Ubicacion = $_POST['Ubicacion'];
	$activo = $_POST['activo']; 
 
	$consultaSQL = "INSERT INTO tbl_proyecto ( "
								."id_codigo_proyecto, "
								."id_cliente, " 
								."nombre_proyecto, " 
								."nombre_proyecto_abreviado, " 
								."ubicacion, " 
								."fecha_inicio, " 
								."fecha_fin, " 
								."fecha_registro, " 
								."activo "
							.") VALUES ( "
								."'".$codProyecto."', "
								.$cliente.", "
								."'".$NomProyecto."', "
								."'".$ProyectoAbrev."', "
								."'".$Ubicacion."', "
								."'".$fechaInicio."', "
								."'".$FechaFinal."', "
								." NOW() ,"
								.$activo.")";
	$resultado = $miConexion->ejecutarInstruccion($consultaSQL);
	if ($resultado) {
		echo "Registro guardado exitosamente";
	}else
	   echo $consultaSQL;
 
	$miConexion->cerrarConexion();

?>