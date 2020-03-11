<?php

// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = " SELECT tipodoc,numerodeid,nombrecompleto
           FROM cliente
           WHERE(numerodeid in (SELECT numerodeidcliente
                                FROM `factura`
                                GROUP BY tipodoccliente,numerodeidcliente
                                HAVING COUNT(*) = ( SELECT MAX(c) AS fc FROM ( SELECT COUNT(*) AS c FROM `factura`
							                                      WHERE nit_empresa IS NULL
                                                    GROUP BY tipodoccliente,numerodeidcliente
                                                    ) AS att)
                                )
         )";

// Mostrado de todos los clientes
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

?>
