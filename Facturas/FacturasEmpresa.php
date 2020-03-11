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

        <!--Condicionales para mostrar mensajes de confirmación y de error-->
        <?php if(isset($_GET['msge'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?=$_GET['msge'];?>
            </div>

        <?php } elseif(isset($_GET['msgs'])){?> 
            <div class="alert alert-success" role="alert">
                <?=$_GET['msgs'];?>
            </div>

        <?php } elseif(isset($_GET['msgc'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?=$_GET['msgc'];?>
            </div>
        <?php } ?>

        <div class="row">
        <!--Formularios relacionados a facturas - [Inicio]-->
            <?php if (isset($_GET["codigo"])) {?>
                <!--Formulario para editar una factura - [Inicio]-->
                <div class="col-3 px-2">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Editar Factura de la Empresa
                        </div>
                        <div class="card-body">
                            <form action="Update_f.php" class="form-group" method="post">

                                <!--Código-->
                                <div class="form-group">
                                    <label> Código: </label>
                                    <input style="width: 250px;" type="text" readonly name="codigo" value='<?=$_GET["codigo"];?>' class="form-control">
                                </div>

                                <!--Monto de compra-->
                                <div class="form-group">
                                    <label> Monto de compra: </label>
                                    <input style="width: 250px;" type="text" name="montocompra" value='<?=$_GET["montocompra"];?>' class="form-control">
                                </div>

                                <!--Monto de venta-->
                                <div class="form-group">
                                    <label> Monto de venta: </label>
                                    <input style="width: 250px;" type="text" name="montoventa" value='<?=$_GET["montoventa"];?>' class="form-control">
                                </div>

                                <!--Tipo de factura-->
                                <div class="form-group">
                                    <label> Tipo de factura: </label>
                                    <!--La razón de que sea mas compleja a comparación del caso de la inserción es porque se debe conservar el valor 
                                        anterior que tenía la factura-->
                                    <?php
                                        $tipofac = $_GET["tipofac"];
                                        if ($tipofac == "compra") {
                                            $mostracion = "Compra";
                                        }
                                        else {
                                            $mostracion = "Venta";
                                        }
                                    ?>
                                    <select style="width: 250px;" name="tipofac">
                                        <option value='<?=$tipofac;?>' selected hidden> <?=$mostracion;?> </option> 
                                        <option value="compra"> Compra </option>
                                        <option value="venta"> Venta </option>
                                    </select>
                                </div>

                                <!--Fecha-->
                                <div class="form-group">
                                    <label> Fecha: </label>
                                    <input style="width: 250px;" type="date" name="fecha" value='<?=$_GET["fecha"];?>' class="form-control">
                                </div>

                                <!--Hora-->
                                <div class="form-group">
                                    <label> Hora: </label>
                                    <input style="width: 250px;" type="time" name="hora" value='<?=$_GET["hora"];?>' class="form-control">
                                </div>

                                <!--Número de identificación de empresa-->
                                <div class="form-group">
                                    <!--La razón de que sea mas compleja a comparación del caso de la inserción 
                                        es porque se debe conservar el valor anterior que tenía la factura-->

                                    <label> Número de nit: </label><br>
                                    <select style="width: 250px;" name="nit">
                                        <option value='<?=$_GET["nit_empresa"];?>' selected hidden> <?=$_GET["nit_empresa"];?> </option>

                                        <?php
                                        require('../Conexion.php');

                                        $query = "SELECT nit FROM empresa";
                                        $result = mysqli_query($conn, $query);

                                        if ($result){
                                            foreach ($result as $fila) {
                                                ?>
                                                <option value=<?=$fila['nit'];?>> <?=$fila['nit'];?> </option>
                                            <?php } 
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!--Botones-->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-dark" value="Guardar">
                                    <a href="FacturasEmpresa.php" class="btn btn-danger"> Descartar </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Formulario para editar una factura - [Fin]-->

            <?php } else{ ?>
                <!--Formulario para insertar una factura - [Inicio]-->
                <div class="col-3 px-2">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Insertar Factura para Empresa
                        </div>
                        <div class="card-body">

                            <!--Tipo de titular de la factura-->
                            <form action="FacturasTitular.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label> Seleccionar opción: </label><br>
                                    <select style="width: 250px;" name="tipotit" id="tipotit">
                                        <option value="cliente"> Insertar factura para cliente </option>
                                        <option value="empresa" selected> Insertar factura para empresa </option>
                                        <option value="ninguno"> Insertar factura sin titular </option>
                                        <option value="todas"> Ver todas las facturas </option>
                                    </select>
                                </div>
                                <!--Botón-->
                                <input type="submit" class="btn btn-success" value="Seleccionar">
                            </form>

                            <form action="Insert_f.php" class="form-group" method="post">

                                <!--Código de factura-->
                                <div class="form-group">
                                    <label> Código: </label>
                                    <input style="width: 250px;" type="text" name="codigo" id="codigo" class="form-control">
                                </div>

                                <!--Monto de compra-->
                                <div class="form-group">
                                    <label> Monto de compra: </label>
                                    <input style="width: 250px;" type="text" name="montocompra" id="montocompra" class="form-control">
                                </div>

                                <!--Monto de venta-->
                                <div class="form-group">
                                    <label> Monto de venta: </label>
                                    <input style="width: 250px;" type="text" name="montoventa" id="montoventa" class="form-control">
                                </div>

                                <!--Tipo de factura-->
                                <div class="form-group">
                                    <label> Tipo de factura: </label>
                                    <select style="width: 250px;" name="tipofac" id="tipofac">
                                        <option value="compra"> Compra </option>
                                        <option value="venta"> Venta </option>
                                    </select>
                                </div>

                                <!--Fecha-->
                                <div class="form-group">
                                    <label> Fecha: </label>
                                    <input style="width: 250px;" type="date" name="fecha" id="fecha" class="form-control">
                                </div>

                                <!--Hora-->
                                <div class="form-group">
                                    <label> Hora: </label>
                                    <input style="width: 250px;" type="time" name="hora" id="hora" class="form-control">
                                </div>

                                <!--Número de identificación de empresa-->
                                <div class="form-group">
                                    <label> Número de nit: </label><br>
                                    <select style="width: 250px;" name="nit">
                                        <?php
                                        require('../Conexion.php');

                                        $query = "SELECT nit FROM empresa";
                                        $result = mysqli_query($conn, $query);

                                        if ($result){
                                            foreach ($result as $fila) {
                                                ?>
                                                <option value=<?=$fila['nit'];?>> <?=$fila['nit'];?> </option>
                                            <?php } 
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!--Botones-->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Insertar">
                                    <a href="FacturasEmpresa.php" class="btn btn-danger"> Reiniciar </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Formulario para insertar una factura - [Fin]-->
            <?php } ?>
            <!--Formularios relacionados a facturas - [Fin]-->

            <!--Tabla de facturas - [Inicio]-->
            <div class="col-9 px-1">
                <div class="col py-1 bg-dark text-white text-center">
                    <h3> Empresas con Facturas </h3>
                </div>
                <table class="table-sm table-bordered border-rounded table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center"> Código </th>
                            <th scope="col" class="text-center"> Monto de compra </th>
                            <th scope="col" class="text-center"> Monto de venta </th>
                            <th scope="col" class="text-center"> Tipo de factura </th>
                            <th scope="col" class="text-center"> Fecha </th>
                            <th scope="col" class="text-center"> Hora </th>
                            <th scope="col" class="text-center"> NIT </th>
                            <th scope="col" class="text-center"> Editar </th>
                            <th scope="col" class="text-center"> Borrar </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require('Select_fe.php');
                            if ($result){
                                foreach ($result as $fila){
                        ?>
                        <tr>
                            <td class="text-center" style="width: 10px;"><?=$fila['codigo'];?></td>
                            <td class="text-center" style="width: 300px;"><?=$fila['montocompra'];?></td>
                            <td class="text-center" style="width: 300px;"><?=$fila['montoventa'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['tipofac'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['fecha'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['hora'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['nit_empresa'];?></td>
                            <td class="text-center" style="width: 250px;">
                                <form action="FacturasEmpresa.php" method="GET">
                                    <input type="text" name="codigo" value='<?=$fila['codigo'];?>' hidden>
                                    <input type="text" name="montocompra" value='<?=$fila['montocompra'];?>' hidden>
                                    <input type="text" name="montoventa" value='<?=$fila['montoventa'];?>' hidden>
                                    <input type="text" name="tipofac" value='<?=$fila['tipofac'];?>' hidden>
                                    <input type="text" name="fecha" value='<?=$fila['fecha'];?>' hidden>
                                    <input type="text" name="hora" value='<?=$fila['hora'];?>' hidden>
                                    <input type="text" name="nit_empresa" value='<?=$fila['nit_empresa'];?>' hidden>
                                    <button class="btn btn-success" title="Editar" type="submit">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="text-center" style="width: 250px;">
                                <form action="Delete_f.php" method="POST">
                                    <input type="text" name="nit" value='<?=$fila['codigo'];?>' hidden>
                                    <button class="btn btn-danger" title="Eliminar" type="submit"> 
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!--Tabla de facturas - [Fin]-->
        </div>
    </div>
</body>

</html>