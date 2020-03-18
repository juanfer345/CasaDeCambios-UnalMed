<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "INSERT INTO EMPRESA VALUES ('$_POST[nit]', '$_POST[nombre]', '$_POST[direccion]', '$_POST[telefono]')";

$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
	if ($result) {
     header("Location: Empresas.php?msgs=" . "La empresa identificada con el NIT " . $_POST["nit"] . " fue agregada correctamente.");
	}
	else {
		header("Location: Empresas.php?msge=" . mysqli_error($conn));
		echo(mysqli_error($conn));
	}
mysqli_close($conn);
?>