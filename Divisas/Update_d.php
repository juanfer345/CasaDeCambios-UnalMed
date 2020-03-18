<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "UPDATE DIVISA SET tasaCompra='$_POST[tasaCompra]', tasaVenta='$_POST[tasaVenta]' WHERE tipoDivisa='$_POST[tipoDivisa]'";

// Realizando la actualización
$result = mysqli_query($conn, $query);

// Condicional según el resultado obtenido
if ($result) {
	header("Location: Divisas.php?msgs=" . "La divisa '" . $_POST["tipoDivisa"] . "' fue editada correctamente.");
}
else {
	header("Location: Divisas.php?msge=" . mysqli_error($conn) );
}

mysqli_close($conn);
?>