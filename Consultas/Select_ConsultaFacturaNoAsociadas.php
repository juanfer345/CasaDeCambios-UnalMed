<?php

// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "SELECT * FROM factura WHERE tipodoccliente IS NULL AND numerodeidcliente  IS NULL AND nit_empresa  IS NULL";

// Mostrado de todos los clientes
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

?>
