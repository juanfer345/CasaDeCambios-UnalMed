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
$query = "UPDATE EMPLEADO SET nombreCompleto='$_POST[nombreCompleto]', numeroSistema='$_POST[numeroSistema]', direccion='$_POST[direccion]', telefono='$_POST[telefono]', idSucursal=$sucursal, tipoEmp='$_POST[tipoEmp]', codigoTrans=$codigo WHERE cedula='$_POST[cedula]'";
// $query = "UPDATE CAJA     SET montoTotal    ='$_POST[montoTotal]',       idSucursal='$_POST[idSucursal]'                                                                                                                                         WHERE codigo='$_POST[codigo]'";

// header("Location: Empleados.php?msgs=" . $query);

// Realizando la actualización
$result = mysqli_query($conn, $query);

// Condicional según el resultado obtenido
if ($result) {
	header("Location: Empleados.php?msgs=" . "El empleado identificado con la cédula " . $_POST["cedula"] . " fue editado correctamente.");
}
else {
	header("Location: Empleados.php?msge=" . mysqli_error($conn));
}

mysqli_close($conn);
?>