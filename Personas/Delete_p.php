<?php

// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "DELETE FROM PERSONA WHERE (tipoDoc = '$_POST[tipoDoc]' AND numeroId = '$_POST[numeroId]')";

$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if ($result) {
	header("Location: Personas.php?msgs=" . "El cliente con identificación " . $_POST["numeroId"] .  " (" . $_POST["tipoDoc"] . ")" . ", fue eliminado correctamente.");
}
else {
	header("Location: Personas.php?msge=" . mysqli_error($conn));
}

mysqli_close($conn);
?>