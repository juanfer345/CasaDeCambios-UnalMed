<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "UPDATE PERSONA SET nombreCompleto = '$_POST[nombreCompleto]', fechaNac = '$_POST[fechaNac]', ciudadNac = '$_POST[ciudadNac]', 
                             direcRes = '$_POST[direcRes]', ciudadRes = '$_POST[ciudadRes]', nacionalidad = '$_POST[nacionalidad]', 
                             telefono = '$_POST[telefono]' WHERE (tipoDoc = '$_POST[tipoDoc]' AND numeroId = '$_POST[numeroId]')";

// Realizando la actualización
$result = mysqli_query($conn, $query);

// Condicional según el resultado obtenido
if ($result) {
	header("Location: Personas.php?msgs=" . "La persona con identificación " . $_POST["numeroId"] .  " (" . $_POST["tipoDoc"] . ")" . ", fue editada correctamente.");
}
else {
	header("Location: Personas.php?msge=" . (string) mysqli_error($conn) );
}

mysqli_close($conn);
?>