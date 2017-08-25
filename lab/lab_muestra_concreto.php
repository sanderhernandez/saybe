<?php
	include('../conexion.php');
	//$id=$_GET["id"];
$c=0;

//SubConsultas en mysql
//http://quidel.inele.ufro.cl/~pvalenzu/tutoriales/sql/sql7.html

	if($resultset=getSQLResultSet(
		"SELECT cv.id_fecha_muestra, CONCAT(substring( m.elemento,1,100), '... con ',COUNT(cv.id_n_cilindro_viga))
			FROM `tbl_lab_cilindro_viga_muestra_concreto` as cv, `tbl_lab_muestra_concreto` as m
			WHERE cv.id_fecha_muestra = m.id_fecha_muestra
			group by cv.id_fecha_muestra, m.elemento
			order by cv.id_fecha_muestra ASC")){
// (SELECT m.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m)
		while ($row = $resultset->fetch_array(MYSQLI_NUM)){
			$c=$c+1;
			echo json_encode($row);
		}
	}


//"SELECT cv.id_fecha_muestra, CONCAT('Total Cilindros: ', COUNT(cv.id_n_cilindro_viga))  FROM `tbl_lab_cilindro_viga_muestra_concreto` as cv WHERE cv.id_fecha_muestra in (SELECT m.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m) group by cv.id_fecha_muestra order by cv.id_fecha_muestra ASC"
// WHERE id='$id' y group by m.id_fecha_muestra
//"SELECT cv.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m INNER JOIN tbl_lab_cilindro_viga_muestra_concreto as cv on m.id_fecha_muestra = cv.id_fecha_muestra"

//(SELECT m.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m)




?>
