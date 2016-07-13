<?php

require("class-Clockwork.php");
require("conexion.php");
$apikey = "81527975d971c80cacc9e5970249e7c17d4c0804";
$clockwork = new Clockwork($apikey);

$query = 'select * from USUARIO where IDUsuario=1';
$registros = sqlsrv_query($conexion, $query);
echo 'Se enviarán mensajes a: ';
while ($row = sqlsrv_fetch_array($registros))
{
	$message = array('to'=> $row['Celular'], 'message' => '¡ALERTA! intruso en casa, revisa la aplicacion');
	echo $row['Celular'];
}

// $done = $clockwork->send($message);

?>