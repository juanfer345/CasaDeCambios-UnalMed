<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "DELETE FROM DIVISA WHERE tipoDivisa = '$_POST[tipoDivisa]'";

// Realización del borrado
$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if($result){
	header("Location: Divisas.php?msgs=" . "La divisa '" . $_POST["tipoDivisa"] . "' fue eliminada correctamente.");
}
else{
	header("Location: Divisas.php?msge=" . mysqli_error($conn) );
}

mysqli_close($conn);
?>