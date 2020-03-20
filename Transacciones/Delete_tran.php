<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "DELETE FROM TRANSACCION WHERE codigo = '$_POST[codigo]'";

// Realización del borrado
$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if ($result) {
	header("Location: Transacciones.php?msgs=" . "La transacción identificada con el código " . $_POST["codigo"] . " fue eliminada correctamente.");
}
else {
	header("Location: Transacciones.php?msge=" . mysqli_error($conn) );
}
mysqli_close($conn);
?>