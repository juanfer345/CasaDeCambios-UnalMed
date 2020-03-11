<?php
 
// Creación de conexión
require('../Conexion.php');

$identificacion = $_POST["nit"];

// Asignación de query
if($identificacion < 0){
 	header("Location: Empresas.php?msgc=" . "El nit de la empresa debe ser un número entero positivo.");
}
else{
	$query = "INSERT INTO `empresa`(`nit`, `nombre`, `direccion`, `telefono`) VALUES ('$identificacion', '$_POST[nombre]', '$_POST[direccion]', '$_POST[telefono]')";
   
	$result = mysqli_query($conn, $query);

	// Condicional según resultado obtenido
 	if($result){
         header("Location: Empresas.php?msgs=" . "La empresa identificada con el NIT " . $_POST["nit"] . " fue agregada correctamente.");
 	}
 	else{
 		header("Location: Empresas.php?msge=" . mysqli_error($conn));
 		echo(mysqli_error($conn));
 	}
	mysqli_close($conn);
}
?>
