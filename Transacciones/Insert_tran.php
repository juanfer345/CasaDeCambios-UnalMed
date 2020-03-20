<?php
 
// Creación de conexión
require('../Conexion.php');

if ($_POST['tipoCli'] == 'Persona') {

	$array = explode(",", $_POST['personasRegistradas']);

	// Asignación de query
	$query = "INSERT INTO TRANSACCION VALUES ('$_POST[codigo]', '$_POST[tipo]', '$_POST[montoEntrada]', '$_POST[montoSalida]', '$_POST[fecha]', '$_POST[hora]', '$_POST[tasaCambio]', '$_POST[montoInicial]', '$_POST[divisaPesos]', '$_POST[idDivisa]', '$_POST[idSucursal]', '$_POST[idCajero]', '$array[0]', '$array[1]', NULL)";
}
else {
	// Asignación de query
	$query = "INSERT INTO TRANSACCION VALUES ('$_POST[codigo]', '$_POST[tipo]', '$_POST[montoEntrada]', '$_POST[montoSalida]', '$_POST[fecha]', '$_POST[hora]', '$_POST[tasaCambio]', '$_POST[montoInicial]', '$_POST[divisaPesos]', '$_POST[idDivisa]', '$_POST[idSucursal]', '$_POST[idCajero]', NULL, NULL, $_POST[nitEmpresa])";
}

 // header("Location: Transacciones.php?msgs=" . $query);

$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if ($result) {
 header("Location: Transacciones.php?msgs=" . "La transacción identificada con el código " . $_POST["codigo"] . " fue agregada correctamente.");
}
else {
	header("Location: Transacciones.php?msge=" . mysqli_error($conn));
	echo(mysqli_error($conn));
}
mysqli_close($conn);
?>