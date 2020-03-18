<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "UPDATE SUCURSAL SET nombre='$_POST[nombre]', ciudad='$_POST[ciudad]', direccion='$_POST[direccion]', horario='$_POST[horario]' WHERE numeroRegistro='$_POST[numeroRegistro]'";

// Realizando la actualización
$result = mysqli_query($conn, $query);

// Condicional según el resultado obtenido
if ($result) {
	header("Location: Sucursales.php?msgs=" . "La sucursal identificada con el numero de registro " . $_POST["numeroRegistro"] . " fue editada correctamente.");
}
else {
	header("Location: Sucursales.php?msge=" . mysqli_error($conn) );
}

mysqli_close($conn);
?>