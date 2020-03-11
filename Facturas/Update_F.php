<?php
 
// Creación de conexión
require('../Conexion.php');

// Asignación de query según el tipo de titular
if (isset($_POST["idcliente"])) {

	// Caso A: Clientes
	$numcliente = explode("(", $_POST["idcliente"]);
	$idcliente = str_replace(")", " ", $numcliente['1']);
	$numcliente = $numcliente['0'];

	$query = "UPDATE factura SET montocompra = '$_POST[montocompra]', montoventa = '$_POST[montoventa]', tipofac = '$_POST[tipofac]', 
	fecha = '$_POST[fecha]', hora = '$_POST[hora]', tipodoccliente = '$idcliente', numerodeidcliente = '$numcliente', nit_empresa = NULL 
	WHERE codigo = '$_POST[codigo]'";
	$mensaje = "Location: FacturasCliente.php?msgs=";
}
elseif (isset($_POST["nit"])) {

	// Caso B: Empresas
	$query = "UPDATE factura SET montocompra = '$_POST[montocompra]', montoventa = '$_POST[montoventa]', tipofac = '$_POST[tipofac]', 
	fecha = '$_POST[fecha]', hora = '$_POST[hora]', tipodoccliente = NULL, numerodeidcliente = NULL, nit_empresa = '$_POST[nit]' 
	WHERE codigo = '$_POST[codigo]'";
	$mensaje = "Location: FacturasEmpresa.php?msgs=";
}
else{
	// Caso C: Sin titular
	$query = "UPDATE factura SET montocompra = '$_POST[montocompra]', montoventa = '$_POST[montoventa]', tipofac = '$_POST[tipofac]', 
	fecha = '$_POST[fecha]', hora = '$_POST[hora]', tipodoccliente = NULL, numerodeidcliente = NULL, nit_empresa = NULL 
	WHERE codigo = '$_POST[codigo]'";
	$mensaje = "Location: FacturasNinguno.php?msgs=";
}

$result = mysqli_query($conn, $query);

// Condicional según resultado obtenido
if($result){
	header($mensaje . "La factura con código " . $_POST["codigo"] . ", fue editada correctamente.");
}
else{
	header($mensaje . mysqli_error($conn));
}
?>