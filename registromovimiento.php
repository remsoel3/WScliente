<?php
/*
	Este WS nos permite registrar un movimiento
	usando SP_InsertarMovimiento.
*/
	require 'conexion.php';
	//header('Content-Type: application/json');

	$sql_SP = "{ CALL _InsertarMovimiento_G2(?, ?, ?, ?, NULL, 1) }";
/*
   200,
   'CTA1',
   600,
   'RE',
   1
*/
   	if ( !isset($_GET['idMovimiento']) || !isset($_GET['idCuenta'])
   		|| !isset($_GET['importe']) || !isset($_GET['idOperacion']) ) {
   		$data['exito'] = false;
   		$data['mensaje'] = 'Error: completar todos los parametros.';
   		die( json_encode($data) );
   	}

	$idMovimiento = $_GET['idMovimiento'];
	$idCuenta = $_GET['idCuenta'];
	$importe = $_GET['importe'];
	$idOperacion = $_GET['idOperacion'];


	$params = [
		$idMovimiento,
		$idCuenta,
		$importe,
		$idOperacion
	];

	$result_set = sqlsrv_query( $conexion, $sql_SP, $params );
	if( $result_set === false ) {
		$data['exito'] = false;
		$data['mensaje'] = sqlsrv_errors()[0]['mensaje'];
		die( json_encode($data) );
	}

	echo resultSetToJson('OperacionMovimiento', $result_set);
