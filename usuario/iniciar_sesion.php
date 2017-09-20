<?php  
	session_start();	
	include('../conexion.php'); 

	$user=$_POST["user"];
	$contra=$_POST["contra"];  

	if ($user=='') {
		header('Location: ../lab/login.php');
	}else
	{
		$sql = "SELECT
				U.id_usuario, 
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
				$_SESSION['nombreUsuario'] = $row[0];
				$_SESSION["iniciado"] = 1;
				echo "antes del if";
				if (!isset($row[0]) || $row[0] == '') {
					echo "<script>alert('hola');</script>";
					header('Location: login.php'); 
				}else 
					header('Location: ../lab/index.php');
			}
		}else
			header('Location: login.php');  
	}
?>
