<?php
 
// Creación de conexión
require('../Conexion.php');

if ($_POST['tipoCli'] == 'Persona') {

	$array = explode(",", $_POST['personasRegistradas']);

	// Asignación de query
	$query = "UPDATE TRANSACCION SET tipo='$_POST[tipo]', montoEntrada='$_POST[montoEntrada]', montoSalida='$_POST[montoSalida]', fecha='$_POST[fecha]', hora='$_POST[hora]', tasaCambio='$_POST[tasaCambio]', montoInicial='$_POST[montoInicial]', divisaPesos='$_POST[divisaPesos]', idDivisa='$_POST[idDivisa]', idSucursal='$_POST[idSucursal]', idCajero='$_POST[idCajero]', tipoDocCliente='$array[0]', numeroIdCliente='$array[1]', nitEmpresa=NULL WHERE codigo='$_POST[codigo]'";
}
else {
	// Asignación de query
	$query = "UPDATE TRANSACCION SET tipo='$_POST[tipo]', montoEntrada='$_POST[montoEntrada]', montoSalida='$_POST[montoSalida]', fecha='$_POST[fecha]', hora='$_POST[hora]', tasaCambio='$_POST[tasaCambio]', montoInicial='$_POST[montoInicial]', divisaPesos='$_POST[divisaPesos]', idDivisa='$_POST[idDivisa]', idSucursal='$_POST[idSucursal]', idCajero='$_POST[idCajero]', tipoDocCliente=NULL, numeroIdCliente=NULL, nitEmpresa='$_POST[nitEmpresa]' WHERE codigo='$_POST[codigo]'";
}

// Realizando la actualización
$result = mysqli_query($conn, $query);

// Condicional según el resultado obtenido
if ($result) {
	header("Location: Transacciones.php?msgs=" . "La transacción identificada con el código " . $_POST["codigo"] . " fue editada correctamente.");
}
else {
	header("Location: Transacciones.php?msge=" . mysqli_error($conn));
}

mysqli_close($conn);
?>