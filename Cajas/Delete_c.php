<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "DELETE FROM CAJA WHERE codigo = '$_POST[codigo]'";

// Realización del borrado
$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if ($result) {
	header("Location: Cajas.php?msgs=" . "La caja identificada con el código " . $_POST["codigo"] . " fue eliminada correctamente.");
}
else {
	header("Location: Cajas.php?msge=" . mysqli_error($conn) );
}
mysqli_close($conn);
?>