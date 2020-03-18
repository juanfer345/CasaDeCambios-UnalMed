<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "DELETE FROM EMPRESA WHERE nit = '$_POST[nit]'";

// Realización del borrado
$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if($result){
	header("Location: Empresas.php?msgs=" . "La empresa identificada con el NIT " . $_POST["nit"] . " fue eliminada correctamente.");
}
else{
	header("Location: Empresas.php?msge=" . mysqli_error($conn) );
}

mysqli_close($conn);
?>