<?php
# Cargamos la librería dompdf.
require_once("../dompdf/dompdf_config.inc.php");
include_once("../class/conexion.php");

$conexion = new Conexion();

$codigoProyecto = $_GET['codProyecto'];
$ordenTrabajo = $_GET['ordenTrabajo'];
$cliente ="Nombre del cliente";
$nombreProyecto="Nombre del proyecto";
$ubicacion="Localizacion del proyecto";
$elemento = "";
$fechaMuestra = "";
$tipoMuestra = "";

$laboratorista = "";

//Primero se extrae la información del proyecto:
	$consultaSQL = "select DISTINCT a.id_codigo_proyecto, b.nombre_cliente, a.nombre_proyecto, a.ubicacion, c.id_fecha_muestra, c.elemento, d.orden_trabajo, d.tipo_cilindro_viga from tbl_proyecto a inner join tbl_cliente b on a.id_cliente = b.id_cliente left join tbl_lab_muestra_concreto c on a.id_codigo_proyecto = c.id_codigo_proyecto left join tbl_lab_cilindro_viga_muestra_concreto d on d.id_fecha_muestra = c.id_fecha_muestra where a.id_codigo_proyecto = '".$codigoProyecto."' and d.orden_trabajo = ".$ordenTrabajo;


	$resultado = $conexion->ejecutarInstruccion($consultaSQL);
	while ($fila = $conexion->obtenerFila($resultado)){
		 $cliente = $fila['nombre_cliente'];
		 $nombreProyecto = $fila['nombre_proyecto'];
		 $ubicacion = $fila['ubicacion'];
		 $elemento =  $fila['elemento'];
		 $fechaMuestra = $fila['id_fecha_muestra'];
		 $tipoMuestra = $fila['tipo_cilindro_viga'];
	}

	$conexion->liberarResultado($resultado);

# Contenido HTML del documento que queremos generar en PDF.
$html='
<html>
<head>
	<title>Reporte de control de muestras de concreto</title>

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
			<td rowspan="2" width="55%">
				<CENTER><h3>CONTROL DE MUESTRAS DE CONCRETO EN CAMPO</h3></CENTER>
			</td>
			<td width="28%"><CENTER><h3>CÓDIGO:</h3></CENTER></td>
		</tr>
		<tr>
			<td width="22%"><CENTER><h3>VERSION: </h3></CENTER></td>
		</tr>
	</table>

	<br>
	<table class="tabla-descripcion">
		<tr>
			<td width="10%" >Cliente</td>
			<td width="40%" class="celdas-subtitulo">'.$cliente.'</td>
			<td width="3%">&nbsp;&nbsp;</td>
			<td width="20%">Orden de trabajo:</td>
			<td width="27%" class="celdas-subtitulo">'.$ordenTrabajo.'</td>
		</tr>
		<tr>
			<td>Proyecto</td>
			<td class="celdas-subtitulo">Proyecto</td>
			<td>&nbsp;&nbsp;</td>
			<td>Código de proyecto:</td>
			<td class="celdas-subtitulo">'.$codigoProyecto.'</td>
		</tr>
		<tr>
			<td>Ubicación</td>
			<td class="celdas-subtitulo">'.$ubicacion.'</td>
			<td>&nbsp;&nbsp;</td>
			<td>Fecha</td>
			<td class="celdas-subtitulo">'.$fechaMuestra.'</td>
		</tr>
		<tr>
			<td>Laboratorista:</td>
			<td class="celdas-subtitulo">Nombre laboratorista</td>
			<td>&nbsp;&nbsp;</td>
			<td>Elemento</td>
			<td class="celdas-subtitulo">'.$elemento.'</td>
		</tr>
	</table>
	<br>
	<table class="tabla-descripcion">
		<tr>
			<td width="14%">Tipo de muestra: </td>
			<td width="50%">'.$tipoMuestra.'</td>
			<td></td>
		</tr>
	</table>
	<br>

	<table class="table texto-tabulacion"  >
					 <tr>
						<td width="5%">No. de viaje</td>
						<td width="5%">Cantidad (M^3)</td>
						<td width="5%">No. De Camión</td>
						<td width="10%">Hora de Salida en Planta</td>
						<td width="10%">Hora Llegada al <br>Proyecto</td>
						<td width="10%">Hora de Salida del Proyecto</td>
						<td width="7%">Temp. (°c)</td>
						<td width="7%">Rev. (Pulg)</td>
						<td width="7%">Aditivo (ml)</td>
						<td width="7%">fc Lbs/Pulg2</td>
						<td width="10%">No. Cilindros/Vigas</td>
						<td  >Observaciones</td>
					 </tr>';

	$consultaSQL = "Select * from tbl_lab_muestra_concreto where id_codigo_proyecto = '".$codigoProyecto."'";
	$resultado = $conexion->ejecutarInstruccion($consultaSQL);
	while ($fila = $conexion->obtenerFila($resultado)){
		$html.='
			<tr>
				<td>'.$fila['id_n_viaje'].'</td>
				<td>'.$fila['cantidad_M3'].'</td>
				<td>'.$fila['n_camion'].'</td>
				<td>'.$fila['hora_salida_en_planta'].'</td>
				<td>'.$fila['hora_llegada_proyecto'].'</td>
				<td>'.$fila['hora_salida_proyecto'].'</td>
				<td>'.$fila['temperatura'].'</td>
				<td>'.$fila['rev_pulg'].'</td>
				<td>'.$fila['aditivo_ml'].'</td>
				<td>'.$fila['fc_lbsPulg2'].'</td>
				<td>######</td>
				<td>'.$fila['observaciones'].'</td>
			</tr>';
	}

	$conexion->liberarResultado($resultado);
	$conexion->cerrarConexion();

	$html.='</table></body></html>';

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
$mipdf ->stream('Reporte_Control_Muestras_concreto.pdf');

?>
