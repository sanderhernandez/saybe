<?php
	include('functions.php');
	$id=$_GET["id"];

	if($resultset=getSQLResultSet("SELECT * FROM `usuarios` WHERE id='$id'")){
		while ($row = $resultset->fetch_array(MYSQLI_NUM)){
			echo json_encode($row);
		}
	}
?>
