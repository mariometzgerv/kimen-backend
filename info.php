<?php

include('db.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Allow: GET, POST, OPTIONS, PUT, DELETE');

if (isset($_GET['diagnostico']))
{
	$query = 'CALL `Obtener_Diagnosticos`();';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['sanguineo']))
{
	$query = 'CALL `Obtener_Grupo_Sanguineo`();';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['medica']))
{
	$query = 'CALL `Obtener_Info_Medica`();';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

if (isset($_GET['talla']))
{
	$query = 'CALL `Obtener_Tallas`();';
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($data);
}

?>