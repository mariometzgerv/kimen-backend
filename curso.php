<?php

include('db.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Allow: GET, POST, OPTIONS, PUT, DELETE');

if (isset($_GET['info']))
{
	$query = 'CALL `Obtener_Cursos`();';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['estudiantes']))
{
	$query = 'CALL `Obtener_Estudiantes`();';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['estudiante']))
{
	$query = 'CALL `Obtener_Estudiante_Curso`(' . $_GET['estudiante'] . ');';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['profesores']))
{
	$query = 'CALL `Obtener_Profesores`();';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['profesor']))
{
	$query = '';
	
	if (isset($_GET['curso']) AND isset($_GET['vigente']))
		$query = 'CALL `Actualizar_Cursos_Profesor`(' . $_GET['profesor'] . ', ' . $_GET['curso'] . ', ' . $_GET['vigente'] . ');';
	else
		$query = 'CALL `Obtener_Cursos_Profesor`(' . $_GET['profesor'] . ');';
	
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['deshabilitar_asignatura_profesor']))
{
	$query = 'CALL `Deshabilitar_Cursos_Asignatura_Profesor`(' . $_GET['deshabilitar_asignatura_profesor'] . ');';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

?>