<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "DELETE FROM SUCURSAL WHERE numeroRegistro = '$_POST[numeroRegistro]'";

// Realización del borrado
$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if($result){
	header("Location: Sucursales.php?msgs=" . "La sucursal identificada con el numero de registro " . $_POST["numeroRegistro"] . " fue eliminada correctamente.");
}
else{
	header("Location: Sucursales.php?msge=" . mysqli_error($conn) );
}

mysqli_close($conn);
?>