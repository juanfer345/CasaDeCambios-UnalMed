<?php

// Creación de conexión
require('../Conexion.php');

$codigo = $_POST["codigo"];

if($codigo < 0){
	header("Location: FacturasCliente.php?msgc=" . "El código de la factura debe ser un número entero positivo.");
}
else{

	// Asignación de query según el tipo de titular
	if (isset($_POST["idcliente"])){

		// Caso A: Clientes
		$numcliente = explode("(", $_POST["idcliente"]);
		$idcliente = str_replace(")", " ", $numcliente['1']);
		$numcliente = $numcliente['0'];

		$query = "INSERT INTO `factura`(`codigo`, `montocompra`, `montoventa`, `tipofac`, `fecha`, `hora`, `tipodoccliente`, `numerodeidcliente`, `nit_empresa`)
		VALUES ('$codigo', '$_POST[montocompra]', '$_POST[montoventa]', '$_POST[tipofac]', '$_POST[fecha]', '$_POST[hora]', '$idcliente', '$numcliente', NULL)";

		$mensaje = "Location: FacturasCliente.php?msgs=";
	}
	elseif (isset($_POST["nit"])) {

		// Caso B: Empresas
		$query = "INSERT INTO `factura`(`codigo`, `montocompra`, `montoventa`, `tipofac`, `fecha`, `hora`, `tipodoccliente`, `numerodeidcliente`, `nit_empresa`)
		VALUES ('$codigo', '$_POST[montocompra]', '$_POST[montoventa]', '$_POST[tipofac]', '$_POST[fecha]', '$_POST[hora]', NULL, NULL, '$_POST[nit]')";
		
		$mensaje = "Location: FacturasEmpresa.php?msgs=";
	}
	else{
		// Caso C: Sin titular
		$query = "INSERT INTO `factura`(`codigo`, `montocompra`, `montoventa`, `tipofac`, `fecha`, `hora`, `tipodoccliente`, `numerodeidcliente`, `nit_empresa`)
		VALUES ('$codigo', '$_POST[montocompra]', '$_POST[montoventa]', '$_POST[tipofac]', '$_POST[fecha]', '$_POST[hora]', NULL, NULL, NULL)";

		$mensaje = "Location: FacturasNinguno.php?msgs=";
	}

	$result = mysqli_query($conn, $query);

	// Condicional según resultado obtenido
	if($result){
		header($mensaje . "La factura con código " . $codigo . ", fue insertada correctamente.");
	}
	else{
		header($mensaje . mysqli_error($conn));
	}
	mysqli_close($conn);
}
?>