<?php

// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "select f.*
from factura as f,cliente as c
where ( c.nombrecompleto like '%'nombre'%'  and nit_empresa is null)";   //ESTE QUERY DEBE MODIFICARSE PARA QUE MUESTRE LA CONSULTA CORRECTA

// Mostrado de todos los clientes
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

?>
