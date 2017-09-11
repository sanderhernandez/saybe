<?php
	include('../conexion.php');
	$user=$_GET["user"];
	//$contra=$_GET["contra"];

$query = "SELECT id_grupo_usuario, id_codigo_proyecto
	FROM tbl_usuario_x_grupo_usuario_x_proyecto
	WHERE id_usuario='" . $user . "'and activo = 1";

	if($resultset=getSQLResultSet($query)){
// (SELECT m.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m)
		$row = array();
		while ($fila = $resultset->fetch_assoc()){
			$row[] = $fila;
		}
		echo json_encode($row);
	}
?>
