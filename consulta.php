<?php

include 'sistema/class.controlador.php';
$funciones = new Funciones();

$resultado = $funciones->query("SELECT * FROM mutuos WHERE fondo IN ('BTG PACTUAL ACCIONES ASIA EMERGENTE B','PRINCIPAL USA G')",'',false);

echo "<table border='1'>";
echo "<tr>";
	echo "<td>fondo</td>";
	echo "<td>administradora</td>";
	echo "<td>valor</td>";
	echo "<td>porcentaje_variacion_dia</td>";
	echo "<td>porcentaje_nominal_treita_dias</td>";
	echo "<td>porcentaje_real_UF_treinta_dias</td>";
	echo "<td>porcentaje_nominal_tres_meses</td>";
	echo "<td>porcentaje_real_UF_tres_meses</td>";
	echo "<td>porcentaje_nominal_un_ano</td>";
	echo "<td>porcentaje_real_UF_un_ano</td>";
	echo "<td>fecha</td>";
	echo "<td>hora</td>";
	echo "</tr>";
foreach ($resultado as $result) {
	echo "<tr>";
	echo "<td>".$result['fondo']."</td>";
	echo "<td>".$result['administradora']."</td>";
	echo "<td>".str_replace(".", ",", $result['valor'])."</td>";
	echo "<td>".str_replace(".", ",", $result['porcentaje_variacion_dia'])."</td>";
	echo "<td>".str_replace(".", ",", $result['porcentaje_nominal_treita_dias'])."</td>";
	echo "<td>".str_replace(".", ",", $result['porcentaje_real_UF_treinta_dias'])."</td>";
	echo "<td>".str_replace(".", ",", $result['porcentaje_nominal_tres_meses'])."</td>";
	echo "<td>".str_replace(".", ",", $result['porcentaje_real_UF_tres_meses'])."</td>";
	echo "<td>".str_replace(".", ",", $result['porcentaje_nominal_un_ano'])."</td>";
	echo "<td>".str_replace(".", ",", $result['porcentaje_real_UF_un_ano'])."</td>";
	echo "<td>".$result['fecha']."</td>";
	echo "<td>".$result['hora']."</td>";
	echo "</tr>";

}
echo "</table>";
?>