<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query
$query = "UPDATE cliente SET nombrecompleto = '$_POST[nombrecompleto]', fechanaci = '$_POST[fechanaci]', ciudadnaci = '$_POST[ciudadnaci]', 
                             direcresid = '$_POST[direcresid]', ciudadresid = '$_POST[ciudadresid]', nacionalidad = '$_POST[nacionalidad]', 
                             telefono = '$_POST[telefono]' WHERE (tipodoc = '$_POST[tipodoc]' AND numerodeid = '$_POST[numerodeid]')";

// Realizando la actualización
$result = mysqli_query($conn, $query);

// Condicional según el resultado obtenido
if($result){
	header("Location: Clientes.php?msgs=" . "El cliente con identificación " . $_POST["numerodeid"] .  " (" . $_POST["tipodoc"] . ")" . ", fue editado correctamente.");
}
else{
	header("Location: Clientes.php?msge=" . (string) mysqli_error($conn) );
}

mysqli_close($conn);
?>