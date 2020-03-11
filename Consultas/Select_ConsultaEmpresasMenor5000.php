<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "SELECT f.nit_empresa as nit, e.nombre as nombre FROM `factura` as f
JOIN empresa as e ON e.nit= f.nit_empresa
GROUP BY f.nit_empresa
HAVING SUM(f.montocompra) <= 5000";

// Mostrado de todos los clientes
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

?>