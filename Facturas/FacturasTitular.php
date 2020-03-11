<?php

$titular = $_POST["tipotit"];

switch ($titular) {
	case 'cliente':
 		header("Location: FacturasCliente.php");
		break;

	case 'empresa':
 		header("Location: FacturasEmpresa.php");
		break;
		
	case 'ninguno':
 		header("Location: FacturasNinguno.php");
		break;

	case 'todas':
 		header("Location: MostrarFacturas.php");
		break;
}
?>