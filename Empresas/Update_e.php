<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "UPDATE empresa SET nombre='$_POST[nombre]', direccion='$_POST[direccion]', telefono='$_POST[telefono]' WHERE nit='$_POST[nit]'";

// Realizando la actualización
$result = mysqli_query($conn, $query);

// Condicional según el resultado obtenido
if($result){
	header("Location: Empresas.php?msgs=" . "La empresa identificada con el NIT " . $_POST["nit"] . " fue editada correctamente.");
}
else{
	header("Location: Empresas.php?msge=" . mysqli_error($conn) );
}

mysqli_close($conn);
?>