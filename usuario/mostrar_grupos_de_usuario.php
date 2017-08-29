<?php
	include('../conexion.php');
	$user=$_GET["user"];
	//$contra=$_GET["contra"];

	if($resultset=getSQLResultSet("SELECT id_grupo_usuario, id_codigo_proyecto
		FROM tbl_usuario_x_grupo_usuario_x_proyecto
		WHERE id_usuario='$user' and activo = 1")){
		while ($row = $resultset->fetch_array(MYSQLI_NUM)){
			echo json_encode($row);
		}
	}
?>
