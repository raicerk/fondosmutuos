<?php

include 'sistema/class.controlador.php';
$funciones = new Funciones();

function sana($numero){
	$valor = filter_var(strip_tags($numero), FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_THOUSAND);
	return (float)str_replace(",", ".", $valor);
}

$contenido = file_get_contents("http://www.economiaynegocios.cl/mercados/rentabilidad.asp");
$pos1 = stripos($contenido, "<table>");
$pos2 = stripos($contenido, "</body>");
$resultado = $pos2 - $pos1;
$tabla = substr($contenido, $pos1, $resultado);
$nuevo = strip_tags($tabla,"<tr><td>");
$nuevo = str_replace(' align="right"', "", $nuevo);
$array = explode("<tr>", $nuevo);
$cadena = "";
$sql = "INSERT INTO mutuos (fondo,administradora,valor,porcentaje_variacion_dia,porcentaje_nominal_treita_dias,porcentaje_real_UF_treinta_dias,porcentaje_nominal_tres_meses,porcentaje_real_UF_tres_meses,porcentaje_nominal_un_ano,porcentaje_real_UF_un_ano,fecha,hora) VALUES (?,?,?,?,?,?,?,?,?,?,'".date('Y-m-d')."','".date('H:i:s')."');";
$int = 0;
foreach ($array as $value) {
	$ultimo = explode("<td>", $value);
	if ($int > 1) {
		$resultado = $funciones->query($sql, array('ssdddddddd',strip_tags($ultimo[1]),strip_tags($ultimo[2]),sana($ultimo[3]),sana($ultimo[4]),sana($ultimo[5]),sana($ultimo[6]),sana($ultimo[7]),sana($ultimo[8]),sana($ultimo[9]),sana($ultimo[10])),true);
	}
	$int++;
}

?>