<?php
 
// Creación de conexión
require('../Conexion.php');

$identificacion = $_POST["numerodeid"];
$tipoDocumento = $_POST["tipodoc"];

// Asignación de query
if($identificacion < 0){
 	header("Location: Clientes.php?msgc=" . "El número de identificación debe ser un número entero positivo.");
}
else{
	$query = "INSERT INTO `cliente`(`tipodoc`, `numerodeid`, `nombrecompleto`, `fechanaci`, `ciudadnaci`, `direcresid`, `ciudadresid`, `nacionalidad`, `telefono`)
	                        VALUES('$tipoDocumento', '$identificacion', '$_POST[nombrecompleto]', '$_POST[fechanaci]', '$_POST[ciudadnaci]', 
	                               '$_POST[direcresid]', '$_POST[ciudadresid]', '$_POST[nacionalidad]', '$_POST[telefono]')";
   
	$result = mysqli_query($conn, $query);

	// Condicional según resultado obtenido
 	if($result){
 		header("Location: Clientes.php?msgs=" . "El cliente con identificación " . $identificacion .  " (" . $tipoDocumento . ")" . ", fue insertado correctamente.");
 	}
 	else{
 		header("Location: Clientes.php?msge=" . mysqli_error($conn) );
 	}
	mysqli_close($conn);
}
?>