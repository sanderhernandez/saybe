<?php
# Cargamos la librería dompdf.
require_once("../dompdf/dompdf_config.inc.php");
include_once("../class/conexion.php");

$conexion = new Conexion();

$codigoProyecto = $_GET['codProyecto'];
$cliente ="Nombre del cliente";
$nombreProyecto="Nombre del proyecto";
$ubicacion="Localizacion del proyecto";

//Primero se extrae la información del proyecto:
	$consultaSQL = "select a.id_codigo_proyecto, "
				."b.nombre_cliente, "
				."a.nombre_proyecto, "
				."a.ubicacion "
				."from tbl_proyecto a "
				."inner join tbl_cliente b on a.id_cliente = b.id_cliente "
				."where a.id_codigo_proyecto = '".$codigoProyecto."'";

	$resultado = $conexion->ejecutarInstruccion($consultaSQL);
	while ($fila = $conexion->obtenerFila($resultado)){
		 $cliente = $fila['nombre_cliente'];
		 $nombreProyecto = $fila['nombre_proyecto'];
		 $ubicacion = $fila['ubicacion'];
	}

	$conexion->liberarResultado($resultado);

# Contenido HTML del documento que queremos generar en PDF.
$html='
<html>
<head>
	<title>Reporte</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<style type="text/css">
		* {
		  margin:0; padding:0;
		}

		body{
		  font:14px Arial, serif;
		}

		#page-wrap{
		  width:1000px;
		  margin: 0 auto;
		}

		.table{
		   border-collapse: collapse;
		   width: 100%;
		}

		.table td{
		   border:1px solid #000; padding:5px;
		}

		.tabla-descripcion{
		   border-style: none;
		   width: 100%;
		   font:14px Arial, serif;
		   font-weight: bold;
		}

		.noborders{
			border:1px solid #FFF;
			border-left-width: 0px;
			border-right-width: 0px;
			border-bottom-width: 1px;
			border-top-width: 0px;
		}

		.tabla-descripcion td{
			padding-left: 15px;
			padding-right: 5px;
			padding-bottom: 5px;
			padding-top: 5px;
		}

		.celdas-subtitulo{
			border:1px solid #000;
			border-left-width: 0px;
			border-right-width: 0px;
			border-bottom-width: 1px;
			border-top-width: 0px;
		}
		.texto-tabulacion{
			font:12px Arial, serif;
		}

		.fondo_celda{
			background-color: #C0C0C0;
		}

		thead{
		   width:100%;position:fixed;
		   height:109px;
		}
		</style>


</head>
<body id="page-wrap">
 	<br>
	<table  class="table">
		<tr>
			<td rowspan="2" width="20%"><img src="../imagenes/saybelogo.png"></td>
			<td rowspan="2" width="60%">
				<CENTER><h3>RESUMEN DE RUPTURA DE VIGAS DE CONCRETO EN TEGUCIGALPA</h3></CENTER>
			</td>
			<td width="20%"><CENTER><h3>CÓDIGO:</h3></CENTER></td>
		</tr>
		<tr>
			<td width="20%"><CENTER><h3>VERSION: </h3></CENTER></td>
		</tr>
	</table>
	<p>Ref. Norma ASTM C 78/C 78M 10</p>
	<br>
	<table class="tabla-descripcion">
		<tr>
			<td width="10%" >Cliente:</td>
			<td width="60%" >'.$cliente.'</td>
			<td width="5%">&nbsp;&nbsp;</td>
			<td width="20%" rowspan="2">Código de proyecto</td>
			<td width="5%" rowspan="2" >'.$codigoProyecto.'</td>
		</tr>
		<tr>
			<td>Proyecto:</td>
			<td >'.$nombreProyecto.'</td>
			<td>&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td>Localización:</td>
			<td >'.$ubicacion.'</td>
			<td>&nbsp;&nbsp;</td>
		</tr>
	</table>
	<br>

	<table class="table texto-tabulacion"  >
					 <tr class="fondo_celda">
						<td width="4%">No. Viga</td>
						<td width="8%">Fecha de colado</td>
						<td width="6%">Rev. Pulgs.</td>
						<td width="15%">Elemento</td>
						<td width="6%">Temp. °C</td>
						<td width="8%">Fecha Ruptura</td>
						<td width="5%">No. Días</td>
						<td width="5%">Ancho</td>
						<td width="5%">Alto</td>
						<td width="6%">Claro</td>
						<td width="6%">Lectura Lbs.</td>
						<td width="6%">M.R. Lbs/Pulg^2</td>
						<td width="6%">M.R. Diseño</td>
						<td width="6%">% Alcanzado</td>
						<td width="7%">Orden de trabajo</td>
					 </tr></tr>';

	$consultaSQL = 	"select a.id_n_cilindro_viga, "
					."a.fecha_colado, "
        			."c.rev_pulg, "
        			."c.elemento, "
        			."c.temperatura, "
       		 		."a.fecha_ruptura, "
        			."a.n_dias, "
        			."a.lectura_lbs, "
			        ."a.resistencia_lbsPulg2, "
			        ."a.rest_porcentaje, "
			        ."a.orden_trabajo  "
					."from tbl_lab_cilindro_viga_muestra_concreto a "
					."left join tbl_lab_muestra_concreto c on a.id_codigo_proyecto = c.id_codigo_proyecto "
					."where a.tipo_cilindro_viga = 'viga' and c.id_codigo_proyecto = '".$codigoProyecto."'";
	$cont=0;
	$resultado = $conexion->ejecutarInstruccion($consultaSQL);
	while ($fila = $conexion->obtenerFila($resultado)){
		$cont++;
		$html.='
			<tr>
				<td>'.$cont.'</td>
				<td>'.$fila['fecha_colado'].'</td>
				<td>'.$fila['rev_pulg'].'</td>
				<td>'.$fila['elemento'].'</td>
				<td>'.$fila['temperatura'].'</td>
				<td>'.$fila['fecha_ruptura'].'</td>
				<td>'.$fila['n_dias'].'</td>
				<td>'.$cont.'</td>
				<td>'.$cont.'</td>
				<td>'.$cont.'</td>
				<td>'.$fila['lectura_lbs'].'</td>
				<td>'.$fila['resistencia_lbsPulg2'].'</td>
				<td>'.$cont.'</td>
				<td>'.$fila['rest_porcentaje'].'</td>
				<td>'.$fila['orden_trabajo'].'</td>
			</tr>';
	}

	$conexion->liberarResultado($resultado);
	$conexion->cerrarConexion();

	$html.='</table></body></html>';
	echo $html;

 # Instanciamos un objeto de la clase DOMPDF.
$mipdf = new DOMPDF();

# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf ->set_paper("letter", "landscape");

# Cargamos el contenido HTML.
$mipdf ->load_html(utf8_decode($html));

# Renderizamos el documento PDF.
$mipdf ->render();
echo $html;
# Enviamos el fichero PDF al navegador.
$mipdf ->stream('Reporte_Ruptura_Vigas.pdf');

?>
