<?php
	include('functions.php');
	$user=$_GET["user"];
	$contra=$_GET["contra"];

	if($resultset=getSQLResultSet("SELECT U.id_usuario, U.contrasena FROM `tbl_usuario` as U, tbl_persona as P WHERE U.id_usuario='$user' and U.contrasena='$contra'")){
		while ($row = $resultset->fetch_array(MYSQLI_NUM)){
			echo json_encode($row);
		}
	}
?>
