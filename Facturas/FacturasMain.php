<!DOCTYPE html>
<html lang="en">

<head>
    <!--Configuraciones básicas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Librerías de boostraps-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!--Título de la pestaña-->
    <title> Facturas </title>

    <!--Título de la página-->
    <header class="alert alert-info"> <h1> Casa de Cambios UnalMed </h1></header>
</head>

<body>
    <!--Barra de navegacion-->
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
        <li class="nav-pills">
            <a class="nav-link border rounded bg-dark active" href="FacturasMain.php"> Facturas </a>
        </li>
        <li class="nav-item">
            <a class="nav-link border rounded bg-info text-white" href="../Consultas/Consultas.php"> Consultas </a>
        </li>
        <li class="nav-item">
            <a class="nav-link border rounded bg-info text-white" href="../Busquedas/Busquedas.php"> Busquedas </a>
        </li>
    </ul>

    <br>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-4 px-1">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Principal Facturas
                    </div>
                    <div class="card-body">
                        <form action="FacturasTitular.php" class="form-group" method="post">
                            <div class="row">
                                <!--Tipo de titular de la factura-->
                                <div class="col">
                                    <label> Seleccionar opción: </label><br>
                                    <select style="width: 250px;" name="tipotit" id="tipotit">
                                        <option value="cliente"> Insertar factura para cliente </option>
                                        <option value="empresa"> Insertar factura para empresa </option>
                                        <option value="ninguno"> Insertar factura sin titular </option>
                                        <option value="todas"> Ver todas las facturas </option>
                                    </select>
                                </div>

                                <!--Botón-->
                                <div class="col">
                                    <br>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Seleccionar">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>