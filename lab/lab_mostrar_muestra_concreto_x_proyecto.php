<?php
	include('../conexion.php');
	//$id=$_GET["id"];
	$id_codigo_proyecto=$_GET["id_codigo_proyecto"];
$c=0;

//SubConsultas en mysql
//http://quidel.inele.ufro.cl/~pvalenzu/tutoriales/sql/sql7.html
//str_split()

/*
"SELECT MC.id_fecha_muestra, GROUP_CONCAT(E.elemento) as b
	FROM `tbl_lab_muestra_concreto` as MC
	LEFT JOIN `tbl_elemento` as E
	ON MC.id_elemento = E.id_elemento
	WHERE MC.id_codigo_proyecto ='" . $id_codigo_proyecto ."'
	GROUP BY MC.id_fecha_muestra, MC.id_elemento
	ORDER BY MC.id_fecha_muestra DESC"
*/


$query = "SELECT
    D.id_fecha_muestra,
    GROUP_CONCAT(' ►► ',D.elemento) as b
FROM
    (
    SELECT
        MC.id_fecha_muestra,
        E.elemento
    FROM
        tbl_lab_muestra_concreto AS MC
    LEFT JOIN tbl_elemento AS E
    ON
        MC.id_elemento = E.id_elemento
    WHERE
        MC.id_codigo_proyecto = '" . $id_codigo_proyecto . "' GROUP BY
        MC.id_fecha_muestra,
        MC.id_elemento
) AS D
GROUP BY
    D.id_fecha_muestra
ORDER BY D.id_fecha_muestra ASC";


	if($resultset=getSQLResultSet($query)){
// (SELECT m.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m)
		$row = array();
		while ($fila = $resultset->fetch_assoc()){
			//$fila["b"] = str_replace(",", " ► ", $fila["b"]);
			$row[] = $fila;
		}
		echo json_encode($row);
	}


//"SELECT cv.id_fecha_muestra, CONCAT('Total Cilindros: ', COUNT(cv.id_n_cilindro_viga))  FROM `tbl_lab_cilindro_viga_muestra_concreto` as cv WHERE cv.id_fecha_muestra in (SELECT m.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m) group by cv.id_fecha_muestra order by cv.id_fecha_muestra ASC"
// WHERE id='$id' y group by m.id_fecha_muestra
//"SELECT cv.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m INNER JOIN tbl_lab_cilindro_viga_muestra_concreto as cv on m.id_fecha_muestra = cv.id_fecha_muestra"

//(SELECT m.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m)




?>
