<?php
	include('../conexion.php');
	//$id=$_GET["id"];
	$id_codigo_proyecto=$_GET["id_codigo_proyecto"];
	$id_fecha_muestra=$_GET["id_fecha_muestra"];
	$elemento=$_GET["elemento"];
	$id_n_viaje=$_GET["id_n_viaje"];

$c=0;
//echo $elemento;
//SubConsultas en mysql
//http://quidel.inele.ufro.cl/~pvalenzu/tutoriales/sql/sql7.html

$query = "SELECT *, E.elemento
	FROM `tbl_lab_muestra_concreto` as MC
	LEFT JOIN tbl_elemento as E
	ON MC.id_elemento = E.id_elemento
	WHERE MC.id_codigo_proyecto = '" . $id_codigo_proyecto . "'"
	. " and MC.id_fecha_muestra = '" . $id_fecha_muestra . "'"
	. " and MC.id_elemento = '" . $elemento . "'"
	. " and MC.id_n_viaje = '" . $id_n_viaje . "'"
	. " ORDER BY MC.id_n_viaje ASC";

	if($resultset=getSQLResultSet($query)){
// (SELECT MC.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m)
		$row = array();
		while ($fila = $resultset->fetch_assoc()){
			$row[] = $fila;
		}
		echo json_encode($row);
	}


//"SELECT cv.id_fecha_muestra, CONCAT('Total Cilindros: ', COUNT(cv.id_n_cilindro_viga))  FROM `tbl_lab_cilindro_viga_muestra_concreto` as cv WHERE cv.id_fecha_muestra in (SELECT MC.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m) group by cv.id_fecha_muestra order by cv.id_fecha_muestra ASC"
// WHERE id='$id' y group by MC.id_fecha_muestra
//"SELECT cv.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m INNER JOIN tbl_lab_cilindro_viga_muestra_concreto as cv on MC.id_fecha_muestra = cv.id_fecha_muestra"

//(SELECT MC.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m)




?>
