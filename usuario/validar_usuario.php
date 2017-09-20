<?php
	include('../conexion.php');
	$user=$_GET["user"];
	$contra=$_GET["contra"]; 

	$sql = "SELECT
			P.id_identidad,
			P.titulo,
			P.nombre_primero,
			P.nombre_segundo,
			P.apellido_primero,
			P.apellido_segundo
		FROM `tbl_usuario` as U left Join tbl_persona as P
		on U.id_identidad = P.id_identidad
		WHERE U.id_usuario='$user' and U.contrasena='$contra' and U.activo = 1";

	if($resultset=getSQLResultSet($sql)){
		while ($row = $resultset->fetch_array(MYSQLI_NUM)){ 
			echo json_encode($row);
		}
	}else
		echo "error";
?>
