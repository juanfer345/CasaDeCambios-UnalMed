<?php
 
// Creación de conexión
require('../Conexion.php');

// Realización del borrado
$result = mysqli_query($conn, $query);

// Asignación de query según el tipo de titular
if (isset($_POST["idcliente"])){

	// Caso A: Clientes
	$query = "DELETE FROM factura WHERE codigo = '$_POST[idcliente]'";
	$mensaje = "Location: FacturasCliente.php?msgs=";
	$codigo = $_POST["idcliente"];
}
elseif (isset($_POST["nit"])) {

	// Caso B: Empresas
	$query = "DELETE FROM factura WHERE codigo = '$_POST[nit]'";
	$mensaje = "Location: FacturasEmpresa.php?msgs=";
	$codigo = $_POST["nit"];
}
else{
	// Caso C: Sin titular
	$query = "DELETE FROM factura WHERE codigo = '$_POST[codigo]'";
	$mensaje = "Location: FacturasNinguno.php?msgs=";
	$codigo = $_POST["codigo"];
}

$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if($result){
	header($mensaje . "La factura con código " . $codigo . ", fue eliminada correctamente.");
}
else{
	header($mensaje . mysqli_error($conn));
}

mysqli_close($conn);
?>