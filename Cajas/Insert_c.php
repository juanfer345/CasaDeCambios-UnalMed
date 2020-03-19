<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "INSERT INTO CAJA VALUES ('$_POST[codigo]', '$_POST[montoTotal]', '$_POST[idSucursal]')";

$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if ($result) {
 header("Location: Cajas.php?msgs=" . "La caja identificada con el código " . $_POST["codigo"] . " fue agregada correctamente.");
}
else {
	header("Location: Cajas.php?msge=" . mysqli_error($conn));
	echo(mysqli_error($conn));
}
mysqli_close($conn);
?>