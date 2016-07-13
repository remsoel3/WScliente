<?php
/*
	Este WS nos permite apagar el sensor usando SP_ActualizarN.
*/
	require 'conexion.php';
	header('Content-Type: application/json');

	$sql_SP = "{ CALL select_incidencia() }";

	$params = [
	];

	$result_set = sqlsrv_query( $conexion, $sql_SP, $params );
	if( $result_set === false ) {
		$data['exito'] = false;
		$data['mensaje'] = sqlsrv_errors()[0]['mensaje'];
		die( json_encode($data) );
	}
	
	echo resultSetToJson('incidencias', $result_set);
