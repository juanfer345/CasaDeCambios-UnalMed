<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "DELETE FROM TRANSFERENCIA WHERE numeroTrans = '$_POST[numeroTrans]'";

// Realización del borrado
$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if ($result) {
	header("Location: Transferencias.php?msgs=" . "La transferencia número " . $_POST["numeroTrans"] . " fue eliminada correctamente.");
}
else {
	header("Location: Transferencias.php?msge=" . mysqli_error($conn) );
}
mysqli_close($conn);
?>