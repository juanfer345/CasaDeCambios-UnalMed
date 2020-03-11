<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "DELETE FROM empresa WHERE nit = '$_POST[idBorrado]'";

// Realización del borrado
$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if($result){
	header("Location: Empresas.php?msgs=" . "La empresa identificada con el NIT " . $_POST["idBorrado"] . " fue eliminada correctamente.");
}
else{
	header("Location: Empresas.php?msge=" . mysqli_error($conn) );
}

mysqli_close($conn);
?>