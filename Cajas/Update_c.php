<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "UPDATE CAJA SET montoTotal='$_POST[montoTotal]', idSucursal='$_POST[idSucursal]' WHERE codigo='$_POST[codigo]'";

// Realizando la actualización
$result = mysqli_query($conn, $query);

// Condicional según el resultado obtenido
if ($result) {
	header("Location: Cajas.php?msgs=" . "La caja identificada con el código " . $_POST["codigo"] . " fue editada correctamente.");
}
else {
	header("Location: Cajas.php?msge=" . mysqli_error($conn) );
}

mysqli_close($conn);
?>