<?php

include('db.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Allow: GET, POST, OPTIONS, PUT, DELETE');

if (isset($_GET['info']))
{
	$query = 'CALL `Obtener_Asignatura`();';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['profesor']))
{
	$query = '';
	
	if (isset($_GET['asignatura']) AND isset($_GET['vigente']))
		$query = 'CALL `Actualizar_Asignatura_Profesor`(' . $_GET['profesor'] . ', ' . $_GET['asignatura'] . ', ' . $_GET['vigente'] . ');';
	else
		$query = 'CALL `Obtener_Asignatura_Profesor`(' . $_GET['profesor'] . ');';
	
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

?>