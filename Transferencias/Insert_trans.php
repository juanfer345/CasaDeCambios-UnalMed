<?php
 
// Creación de conexión
require('../Conexion.php');

if ($_POST['idSucursal'] != 'NULL') {
	$sucursal = $_POST['idSucursal'];
}
else {
	$sucursal = "NULL";
}

if ($_POST['tipoEmp'] == 'Oficial') {
	$codigo = $_POST['codigoTrans'];
}
else {
	$codigo = "NULL";
}

// Asignación de query
$query = "INSERT INTO EMPLEADO VALUES ('$_POST[cedula]', '$_POST[nombreCompleto]', '$_POST[numeroSistema]', '$_POST[direccion]', '$_POST[telefono]', $sucursal, '$_POST[tipoEmp]', $codigo)";					  
$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if ($result) {
 header("Location: Empleados.php?msgs=" . "El empleado identificado con la cédula " . $_POST["cedula"] . " fue agregado correctamente.");
}
else {
	header("Location: Empleados.php?msge=" . mysqli_error($conn));
	echo(mysqli_error($conn));
}
mysqli_close($conn);
?>