<?php
include('../conexion.php');

	$id_proyecto=$_GET["id_proyecto"];
	$id_grupo_usuario=$_GET["id_grupo_usuario"];
	$id_fecha_muestra=$_GET["id_fecha_muestra"];
	$id_elemento=$_GET["id_elemento"];

/*
$query1 = "SELECT CONCAT('false') as chequeado, U.id_usuario, P.nombre_primero, P.apellido_primero
	FROM (tbl_usuario_x_grupo_usuario_x_proyecto AS UGP INNER JOIN tbl_usuario AS U INNER JOIN tbl_persona AS P
	ON  UGP.id_usuario = U.id_usuario and U.id_identidad = P.id_identidad) LEFT JOIN tbl_lab_laboratorista_x_muestra as LM ON LM.id_usuario = UGP.id_usuario
	WHERE UGP.id_codigo_proyecto='" . $id_proyecto . "' and UGP.id_grupo_usuario='" . $id_grupo_usuario . "' and UGP.activo = 1";
*/

	$query = "SELECT
			UGP.id_usuario,
			P.nombre_primero,
			P.apellido_primero,
			IF( UGP.id_usuario = LM.id_usuario, 'true', 'false' ) AS cheaquedo
		FROM ( ( tbl_usuario_x_grupo_usuario_x_proyecto AS UGP
						LEFT JOIN tbl_usuarios_x_procesos_laborales AS LM
							ON UGP.id_usuario = LM.id_usuario AND LM.id_fecha = '" . $id_fecha_muestra ."'
							AND LM.id_elemento = '" . $id_elemento ."'
						) LEFT JOIN tbl_usuario AS U
							ON UGP.id_usuario = U.id_usuario
					) INNER JOIN tbl_persona AS P
						ON U.id_identidad = P.id_identidad
		WHERE UGP.id_codigo_proyecto = '" . $id_proyecto .
		"' AND UGP.id_grupo_usuario = '" . $id_grupo_usuario . "'";

	if($resultset=getSQLResultSet($query)){
		$row = array();

		while ($fila = $resultset->fetch_assoc()){
			$row[] = $fila;
		}
	}
	$json = json_encode($row);

	echo $json;

?>
