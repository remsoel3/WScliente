<?php

// require("class-Clockwork.php");
require("conexion.php");
$apikey = "81527975d971c80cacc9e5970249e7c17d4c0804";
// $clockwork = new Clockwork($apikey);

$query = 'select * from USUARIO where IDUsuario=1';
$registros = sqlsrv_query($conexion, $query);/*
while ($row = sqlsrv_fetch_object($registros))
{
	$message = array('to'=> $row[4], 'message' => '¡ALERTA! intruso en casa, revisa la aplicacion');
	echo $message;
}*/

// $done = $clockwork->send($message);

?>