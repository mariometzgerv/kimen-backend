<?php

include('db.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Allow: GET, POST, OPTIONS, PUT, DELETE');

if (isset($_GET['rut']) AND isset($_GET['psw']))
{
	$query = 'CALL `Actualizar_Usuario_Psw`(' . $_GET['rut'] . ', "' . $_GET['psw'] . '");';
	mysqli_query($conn, $query);
}

?>