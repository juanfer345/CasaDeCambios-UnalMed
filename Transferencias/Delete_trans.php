<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "DELETE FROM EMPLEADO WHERE cedula = '$_POST[cedula]'";

// Realización del borrado
$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if ($result) {
	header("Location: Empleados.php?msgs=" . "El empleado identificado con la cédula " . $_POST["cedula"] . " fue eliminado correctamente.");
}
else {
	header("Location: Empleados.php?msge=" . mysqli_error($conn) );
}
mysqli_close($conn);
?>