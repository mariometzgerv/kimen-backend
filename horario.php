<?php

include('db.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Allow: GET, POST, OPTIONS, PUT, DELETE');

if (isset($_GET['curso']))
{
	$query = 'CALL `Obtener_Horario_Curso`(' . $_GET['curso'] . ');';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['deshabilitar_curso']))
{
	$query = 'CALL `Deshabilitar_Horario_Curso`(' . $_GET['deshabilitar_curso'] . ', ' . date("Y") . ');';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['curso']) AND isset($_GET['dia']) AND isset($_GET['bloque']) AND isset($_GET['asignatura']) AND isset($_GET['vigente']))
{
	$query = 'CALL `Actualizar_Horario`(' . $_GET['curso'] . ', ' . $_GET['dia'] . ', ' . $_GET['bloque'] . ', '. $_GET['asignatura'] . ', ' . date("Y") . ', ' . $_GET['vigente'] . ');';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['profesor']))
{
	$query = 'CALL `Obtener_Horario_Profesor`(' . $_GET['profesor'] . ');';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

?>