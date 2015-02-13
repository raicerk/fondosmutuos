<?php

include 'sistema/class.controlador.php';
$funciones = new Funciones();

$resultado = $funciones->query("SELECT * FROM mutuos WHERE fondo IN ('BTG PACTUAL ACCIONES ASIA EMERGENTE B','PRINCIPAL USA G')",'',false);

print_r($resultado);

?>