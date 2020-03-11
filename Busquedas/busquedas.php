<!DOCTYPE html>
<html lang="en">

<head>
    <!--Configuraciones básicas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie = edge">

    <!--Librerías de boostraps-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!--Título de la pestaña-->
    <title> Búsquedas </title>

    <!--Título de la página-->
    <header class="alert alert-info"> <h1> Casa de Cambios UnalMed </h1></header>
</head>

<body>
    <!--Barra de navegación-->
    <ul class="nav">
        <li class="nav-item" >
            <a class="nav-link border rounded bg-info text-white" href="../Index.html"> Inicio </a>
        </li>
        <li class="nav-item">
            <a class="nav-link border rounded bg-info text-white" href="../Clientes/Clientes.php"> Clientes </a>
        </li>
        <li class="nav-item">
            <a class="nav-link border rounded bg-info text-white" href="../Empresas/Empresas.php"> Empresas </a>
        </li>
        <li class="nav-item">
            <a class="nav-link border rounded bg-info text-white" href="../Facturas/FacturasMain.php"> Facturas </a>
        </li>
        <li class="nav-item">
            <a class="nav-link border rounded bg-info text-white" href="../Consultas/Consultas.php"> Consultas </a>
        </li>
        <li class="nav-pills">
            <a class="nav-link border rounded bg-dark active" href="Busquedas.php"> Busquedas </a>
        </li>
    </ul>

    <br>
    <div class="card">
        <div class="card-header bg-dark text-white">
            Consultas
        </div>
        <div class="card-body">
        <form action="BusquedaCliente.php" method="GET" class="form-group">
            <button class="btn btn-success" title="ConsultaFacturaNoAsociadas" type="submit">
                Buscar facturas de cliente por nombre
            </button>
        </form>

        <form action="BusquedaEmpresa.php" method="GET" class="form-group">
            <button class="btn btn-success" title="ConsultaClentesMasFacturas" type="submit">
                Buscar facturas de empersa por código y fecha
            </button>
        </form>
        </div>
    </div>

    <!--primer nombre empleado y datos de todas sus facturas y los que coincidan || NIT empresa y una fecha, mostrar facturas cuya fecha sea mayor o igual a la ingresada-->

</body>
</html>
