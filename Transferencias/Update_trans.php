<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "UPDATE TRANSFERENCIA SET tipo='$_POST[tipo]', monto='$_POST[monto]', fecha='$_POST[fecha]', tasaCambio='$_POST[tasaCambio]', idDivisa='$_POST[idDivisa]', idOficial='$_POST[idOficial]', sucursalOrig='$_POST[sucursalOrig]', sucursalDest='$_POST[sucursalDest]' WHERE numeroTrans='$_POST[numeroTrans]'";

// Realizando la actualización
$result = mysqli_query($conn, $query);

// Condicional según el resultado obtenido
if ($result) {
	header("Location: Transferencias.php?msgs=" . "La transferencia número " . $_POST["numeroTrans"] . " fue editada correctamente.");
}
else {
	header("Location: Transferencias.php?msge=" . mysqli_error($conn));
}

mysqli_close($conn);
?>