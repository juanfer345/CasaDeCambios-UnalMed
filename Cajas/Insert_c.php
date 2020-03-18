<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "INSERT INTO SUCURSAL VALUES ('$_POST[numeroRegistro]', '$_POST[nombre]', '$_POST[ciudad]', '$_POST[direccion]', '$_POST[horario]')";

$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
	if ($result) {
     header("Location: Sucursales.php?msgs=" . "La sucursal identificada con el numero de registro " . $_POST["numeroRegistro"] . " fue agregada correctamente.");
	}
	else {
		header("Location: Sucursales.php?msge=" . mysqli_error($conn));
		echo(mysqli_error($conn));
	}
mysqli_close($conn);
?>