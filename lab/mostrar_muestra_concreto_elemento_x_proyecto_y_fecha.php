<?php
	include('../conexion.php');
	//$id=$_GET["id"];
	$id_codigo_proyecto=$_GET["id_codigo_proyecto"];
	$id_fecha_muestra=$_GET["id_fecha_muestra"];
$c=0;

//SubConsultas en mysql
//http://quidel.inele.ufro.cl/~pvalenzu/tutoriales/sql/sql7.html

$query1 = "SELECT MC.id_elemento as id_elemento, E.elemento
	FROM `tbl_lab_muestra_concreto` as MC
	LEFT JOIN tbl_elemento as E
	ON MC.id_elemento = E.id_elemento
	WHERE MC.id_codigo_proyecto = '" . $id_codigo_proyecto . "' and " . "MC.id_fecha_muestra = '" . $id_fecha_muestra .
	"' Group by MC.id_elemento ORDER BY 'MC.id_fecha_muestra' DESC";


$query0 = "SELECT MC.id_elemento as id_elemento,
		IF(MC.id_fecha_muestra = '" . $id_fecha_muestra ."', CONCAT('*** ', E.elemento), E.elemento) as elemento,
		MC.id_fecha_muestra
	FROM `tbl_lab_muestra_concreto` as MC
		INNER JOIN tbl_elemento as E
		ON MC.id_elemento = E.id_elemento
	WHERE MC.id_codigo_proyecto = '" . $id_codigo_proyecto .
		"' AND MC.id_fecha_muestra = '" . $id_fecha_muestra .
		"' Group by MC.id_elemento ORDER BY 'MC.id_fecha_muestra' DESC";

$query = "SELECT
    E.id_elemento,
    IF(
        E.id_elemento IN(
        SELECT
            id_elemento
        FROM
            `tbl_lab_muestra_concreto`
        WHERE
            id_codigo_proyecto = '" . $id_codigo_proyecto . "' AND id_fecha_muestra = '" . $id_fecha_muestra ."'
    ),
    CONCAT(' ► © ', E.elemento),
    CONCAT(' ► ', E.elemento)
    ) AS elemento
FROM
    tbl_elemento AS E
WHERE
    E.id_codigo_proyecto = '" . $id_codigo_proyecto . "'".
		"ORDER BY elemento";

	if($resultset=getSQLResultSet($query)){
// (SELECT m.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m)
		$row = array();
		while ($fila = $resultset->fetch_assoc()){
			$row[] = $fila;
		}
		echo json_encode($row);
	}


//"SELECT cv.id_fecha_muestra, CONCAT('Total Cilindros: ', COUNT(cv.id_n_cilindro_viga))  FROM `tbl_lab_cilindro_viga_muestra_concreto` as cv WHERE cv.id_fecha_muestra in (SELECT m.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m) group by cv.id_fecha_muestra order by cv.id_fecha_muestra ASC"
// WHERE id='$id' y group by m.id_fecha_muestra
//"SELECT cv.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m INNER JOIN tbl_lab_cilindro_viga_muestra_concreto as cv on m.id_fecha_muestra = cv.id_fecha_muestra"

//(SELECT m.id_fecha_muestra FROM `tbl_lab_muestra_concreto` as m)




?>
