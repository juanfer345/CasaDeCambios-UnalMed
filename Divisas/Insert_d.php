<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "INSERT INTO DIVISA VALUES ('$_POST[tipoDivisa]', '$_POST[tasaCompra]', '$_POST[tasaCompra]')";

$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
	if ($result) {
     header("Location: Divisas.php?msgs=" . "La divisa '" . $_POST["tipoDivisa"] . "' fue agregada correctamente.");
	}
	else {
		header("Location: Divisas.php?msge=" . mysqli_error($conn));
		echo(mysqli_error($conn));
	}
mysqli_close($conn);
?>