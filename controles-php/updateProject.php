<?php
	include_once("../class/class_conexion.php");  
	$miConexion = new Conexion();

	$codProyecto = $_POST['codProyecto'];
	$NomProyecto = $_POST['NomProyecto'];
	$fechaInicio = $_POST['fechaInicio'];
	$FechaFinal = $_POST['FechaFinal'];
	$FechaRegistro = $_POST['FechaRegistro'];
	$ProyectoAbrev = $_POST['ProyectoAbrev'];
	$Ubicacion = $_POST['Ubicacion'];
	$activo = $_POST['activo'];

	$consultaSQL = "UPDATE tbl_proyecto SET "
					." nombre_proyecto= '".$NomProyecto."',"
					." nombre_proyecto_abreviado= '".$ProyectoAbrev."',"
					." ubicacion= '".$Ubicacion."',"
					." fecha_inicio= '".$fechaInicio."',"
					." fecha_fin= '".$FechaFinal."',"
					." fecha_registro= '".$FechaRegistro."',"
					." activo= ".$activo." "
			."WHERE id_codigo_proyecto = '".$codProyecto."'";
	$resultado = $miConexion->ejecutarInstruccion($consultaSQL);
	if ($resultado) {
		echo "Registro actualizado";
	}else
	   echo $consultaSQL;
 
	$miConexion->cerrarConexion();


	


?>