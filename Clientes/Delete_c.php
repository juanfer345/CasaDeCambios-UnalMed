<?php

// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "DELETE FROM cliente WHERE (tipodoc = '$_POST[tipoIdBorrado]' AND numerodeid = '$_POST[idBorrado]')";

// Realización del borrado

$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if($result){
	header("Location: Clientes.php?msgs=" . "El cliente con identificación " . $_POST["idBorrado"] .  " (" . $_POST["tipoIdBorrado"] . ")" . ", fue eliminado correctamente.");
}
else{
	header("Location: Clientes.php?msge=" . mysqli_error($conn) );
}

mysqli_close($conn);
?>