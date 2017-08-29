
		<?php
			include('../conexion.php');
			header( 'Content-Type: text/html;charset=utf-8_spanish2_ci' );
			$user=$_GET["user"];
			$grupo_usuario=$_GET["grupo_usuario"];
			//$contra=$_GET["contra"];

			if($resultset=getSQLResultSet("SELECT P.id_codigo_proyecto, P.nombre_proyecto_abreviado
				FROM tbl_proyecto as P
				WHERE P.id_codigo_proyecto
					in(SELECT UGP.id_codigo_proyecto
						FROM tbl_usuario_x_grupo_usuario_x_proyecto as UGP
						WHERE UGP.id_usuario='$user' and UGP.id_grupo_usuario = '$grupo_usuario' and UGP.activo = 1
					)
				")){
					$row = array();
					while ($fila = $resultset->fetch_assoc()){
						$row[] = $fila;
					}
					echo json_encode($row);
			}
		/*

		SELECT UGP.id_codigo_proyecto
			FROM tbl_usuario_x_grupo_usuario_x_proyecto as UGP
			WHERE UGP.id_usuario='$user' and UGP.id_grupo_usuario = '$grupo_usuario' and UGP.activo = 1


		"SELECT UGP.id_codigo_proyecto, P.nombre_proyecto_abreviado
			FROM tbl_usuario_x_grupo_usuario_x_proyecto as UGP left join tbl_proyecto as P
			on UGP.id_codigo_proyecto = P.id_codigo_proyecto
			WHERE UGP.id_usuario='$user' and UGP.id_grupo_usuario = '$grupo_usuario' and UGP.activo = 1"

		*/
		?>
