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
    <title> Empresas </title>

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
        <li class="nav-pills">
                <a class="nav-link border rounded bg-dark active" href="Empresas.php"> Empresas </a>
        </li>
        <li class="nav-item">
            <a class="nav-link border rounded bg-info text-white" href="../Facturas/FacturasMain.php"> Facturas </a>
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
            <!--Formularios relacionados a empresas - [Inicio]-->
            <?php
            if (isset($_GET["nit"])) {

            ?>
                <!--Formulario para editar un empresa - [Inicio]-->
                <div class="col-4 px-2">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Editar Empresa
                        </div>
                        <div class="card-body">

                            <form action="Update_e.php" class="form-group" method="post">

                                <!--Número de identificación-->
                                <div class="form-group">
                                    <label> NIT: </label>
                                    <input type="text" readonly name="nit" value='<?=$_GET["nit"];?>' class="form-control">
                                </div>

                                <!--Nombre-->
                                <div class="form-group">
                                    <label> Nombre: </label>
                                    <input type="text" name="nombre" value='<?=$_GET["nombre"];?>' class="form-control">
                                </div>

                                <!--Dirección-->
                                <div class="form-group">
                                    <label> Dirección: </label>
                                    <input type="text" name="direccion" value='<?=$_GET["direccion"];?>' class="form-control">
                                </div>

                                <!--Teléfono-->
                                <div class="form-group">
                                    <label> Teléfono: </label>
                                    <input type="text" name="telefono" value='<?=$_GET["telefono"];?>' class="form-control">
                                </div>

                                <!--Botones-->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-dark" value="Guardar">
                                    <a href="Empresas.php" class="btn btn-danger"> Descartar </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Formulario para editar un empresa - [Fin]-->
            <?php
            }
            else{
            ?>
                <!--Formulario para insertar un empresa - [Inicio]-->
                <div class="col-4 px-2">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Insertar Empresa
                        </div>
                        <div class="card-body">
                            <form action="Insert_e.php" class="form-group" method="post">

                                <!--Número de identificación-->
                                <div class="form-group">
                                    <label> NIT: </label>
                                    <input type="text" name="nit" id="nit" class="form-control">
                                </div>

                                <!--Nombre-->
                                <div class="form-group">
                                    <label> Nombre: </label>
                                    <input type="text" name="nombre" id="nombre" class="form-control">
                                </div>

                                <!--Dirección-->
                                <div class="form-group">
                                    <label> Dirección: </label>
                                    <input type="text" name="direccion" id="direccion" class="form-control">
                                </div>

                                <!--Teléfono-->
                                <div class="form-group">
                                    <label> Teléfono: </label>
                                    <input type="text" name="telefono" id="telefono" class="form-control">
                                </div>
                                
                                <!--Botones-->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Insertar">
                                    <a href="Empresas.php" class="btn btn-danger"> Reiniciar </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Formulario para insertar un empresa - [Fin]-->
            <?php
                }
            ?>
            <!--Formularios relacionados a empresas - [Fin]-->

            <!--Tabla de empresas - [Inicio]-->
            <div class="col-8 px-3">
                <div class="col py-1 bg-dark text-white text-center">
                    <h3> Empresas Registradas </h3>
                </div>
                <table class="table-sm table-bordered border-rounded table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center"> NIT </th>
                            <th scope="col" class="text-center"> Nombre </th>
                            <th scope="col" class="text-center"> Dirección </th>
                            <th scope="col" class="text-center"> Teléfono </th>
                            <th scope="col" class="text-center"> Editar </th>
                            <th scope="col" class="text-center"> Borrar </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require('Select_e.php');
                            if ($result){
                                foreach ($result as $fila){
                        ?>
                        <tr>
                            <td class="text-center" style="width: 250px;"><?=$fila['nit'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['nombre'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['direccion'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['telefono'];?></td>

                            <td class="text-center" style="width: 150px;">
                                <form action="Empresas.php" method="GET" class="col">
                                    <input type="text" name="nit" value='<?=$fila['nit'];?>' hidden>
                                    <input type="text" name="nombre" value='<?=$fila['nombre'];?>' hidden>
                                    <input type="text" name="direccion" value='<?=$fila['direccion'];?>' hidden>
                                    <input type="text" name="telefono" value='<?=$fila['telefono'];?>' hidden>
                                    <button class="btn btn-success" title="Editar" type="submit">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </form>
                            </td>

                            <td class="text-center" style="width: 150px;">
                                <form action="Delete_e.php" method="POST" class="col">
                                    <input type="text" name="idBorrado" value='<?=$fila['nit'];?>' hidden>
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
            <!--Tabla de empresas - [Fin]-->
        </div>
    </div>
</body>
</html>