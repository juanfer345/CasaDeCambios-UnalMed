<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "select *
from factura
where nit_empresa='nit' and fecha >= 'fecha'";   //ESTE QUERY DEBE MODIFICARSE PARA QUE MUESTRE LA CONSULTA CORRECTA

// Mostrado de todos los clientes
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

?>
