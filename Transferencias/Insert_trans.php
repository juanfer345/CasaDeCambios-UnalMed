<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "INSERT INTO TRANSFERENCIA VALUES ('$_POST[numeroTrans]', '$_POST[tipo]', '$_POST[monto]', '$_POST[fecha]', '$_POST[tasaCambio]', '$_POST[idDivisa]', '$_POST[idOficial]', '$_POST[sucursalOrig]', '$_POST[sucursalDest]')";					  
$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if ($result) {
 header("Location: Transferencias.php?msgs=" . "La transferencia número " . $_POST["numeroTrans"] . " fue agregada correctamente.");
}
else {
	header("Location: Transferencias.php?msge=" . mysqli_error($conn));
	echo(mysqli_error($conn));
}
mysqli_close($conn);
?>