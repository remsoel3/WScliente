<?php
/*
	Este WS nos permite apagar el sensor usando SP_ActualizarI.
*/
	require 'conexion.php';
	//header('Content-Type: application/json');

	$sql_SP = "{ CALL SP_ActualizarI() }";

	$params = [
	];

	$result_set = sqlsrv_query( $conexion, $sql_SP, $params );
	if( $result_set === false ) {
		$data['exito'] = false;
		$data['mensaje'] = sqlsrv_errors()[0]['mensaje'];
	} else $data['exito'] = true;

	echo json_encode($data);
	// echo resultSetToJson('encender', $result_set);
