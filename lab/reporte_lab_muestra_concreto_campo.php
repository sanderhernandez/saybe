<?php
		//include('../conexion.php');
		require_once("../dompdf/dompdf_config.inc.php");

		$conexion=mysql_connect("localhost","root","");
				mysql_select_db("db_saybe",$conexion);


		$codigoHTML='
		<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1"
 http-equiv="content-type">
  <title>Control de Muestra</title>
</head>
<body>
<table style="border-collapse: collapse; width: 70%; height: 674px;"
 border="1" cellpadding="0" cellspacing="0">
  <col span="5" style="width: 16pt;" width="21">
  <col style="width: 13pt;" width="17"> <col
 span="33" style="width: 16pt;" width="21"> <col
 style="width: 27pt;" width="36"> <col span="5"
 style="width: 16pt;" width="21"> <col
 style="width: 32pt;" width="43"> <col span="5"
 style="width: 16pt;" width="21"> <tbody>
    <tr style="height: 16.5pt;" height="22">
      <td colspan="3" rowspan="2" class="xl71"
 style="border-right: 0.5pt solid black; border-bottom: 0.5pt solid black; height: 30.75pt; width: 48pt; text-align: center;"><small>No.
De Viaje</small></td>
      <td colspan="3" rowspan="2" class="xl83"
 style="border-bottom: 0.5pt solid black; width: 45pt; text-align: center;"
 width="59"><small>Cantidad (M<font class="font6"><sup>3</sup></font><font
 class="font5">)</font></small></td>
      <td colspan="3" rowspan="2" class="xl71"
 style="border-bottom: 0.5pt solid black; width: 48pt; text-align: center;"
 width="63"><small>No. De Camión</small></td>
      <td colspan="5" rowspan="2" class="xl71"
 style="border-right: 0.5pt solid black; border-bottom: 0.5pt solid black; width: 80pt; text-align: center;"
 width="105"><small>Hora de Salida en Planta<span
 style="">&nbsp;</span></small></td>
      <td colspan="5" rowspan="2" class="xl83"
 style="border-bottom: 0.5pt solid black; width: 80pt; text-align: center;"
 width="105"><small>Hora de Llegada al Proyecto</small></td>
      <td colspan="5" rowspan="2" class="xl83"
 style="border-bottom: 0.5pt solid black; width: 80pt; text-align: center;"
 width="105"><small>Hora de Salida del Proyecto</small></td>
      <td colspan="3" rowspan="2" class="xl71"
 style="border-right: 0.5pt solid black; border-bottom: 0.5pt solid black; width: 48pt; text-align: center;"
 width="63"><small>Temp. (°c)</small></td>
      <td colspan="3" rowspan="2" class="xl83"
 style="border-bottom: 0.5pt solid black; width: 48pt; text-align: center;"
 width="63"><small>Rev. (Pulg)</small></td>
      <td colspan="3" rowspan="2" class="xl71"
 style="border-right: 0.5pt solid black; border-bottom: 0.5pt solid black; width: 48pt; text-align: center;"><small>Aditivo
(ml)</small></td>
      <td colspan="4" rowspan="2" class="xl83"
 style="border-bottom: 0.5pt solid black; width: 64pt; text-align: center;"><small>fc<span
 style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </span>Lbs/Pulg2</small></td>
      <td colspan="6" rowspan="2" class="xl85"
 style="border-bottom: 0.5pt solid black; width: 107pt; text-align: center;"
 width="141"><small>No. Cilindros/Vigas</small></td>
      <td colspan="8" rowspan="2" class="xl77"
 style="border-right: 0.5pt solid black; border-bottom: 0.5pt solid black; width: 144pt; text-align: center;"><small>Observaciones</small></td>
    </tr>
    <tr style="height: 14.25pt;" height="18">
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
    <tr style="height: 15.6pt;" height="21">
      <td colspan="3" class="xl67"
 style="height: 15.6pt;" height="21">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl68"
 style="border-left: medium none; border-right: 0.5pt solid black;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="5" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="3" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="4" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="6" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
      <td colspan="8" class="xl67"
 style="border-left: medium none;">&nbsp;</td>
    </tr>
  </tbody>


		';



		$sql=mysql_query("select * from tbl_lab_muestra_concreto");
		while($res=mysql_fetch_array($sql)){
		$codigoHTML.='
			<tr>
				<td>'.$res['id_n_viaje'].'</td>
				<td>'.$res['cantidad_M3'].'</td>
				<td>'.$res['n_camion'].'</td>
				<td>'.$res['hora_salida_en_planta'].'</td>
				<td>'.$res['hora_llegada_proyecto'].'</td>
				<td>'.$res['hora_salida_proyecto'].'</td>
				<td>'.$res['cantidad_M3'].'</td>
				<td>'.$res['cantidad_M3'].'</td>
				<td>'.$res['cantidad_M3'].'</td>
				<td>'.$res['cantidad_M3'].'</td>
				<td>'.$res['cantidad_M3'].'</td>
				<td>'.$res['cantidad_M3'].'</td>
			</tr>';

		}

$codigoHTML.='
		</table>
		</body>
		</html>';


//$codigoHTML='Hola';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->set_paper('letter', 'landscape');
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Control de Muestra de Concreto.pdf");
?>
