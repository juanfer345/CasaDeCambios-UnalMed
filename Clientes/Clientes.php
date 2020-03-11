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
    <title> Clientes </title>

    <!--Título de la página-->
    <header class="alert alert-info"> <h1> Casa de Cambios UnalMed </h1></header>
</head>

<body>
    <!--Barra de navegación-->
    <ul class="nav">
        <li class="nav-item" >
            <a class="nav-link border rounded bg-info text-white" href="../Index.html"> Inicio </a>
        </li>
        <li class="nav-pills">
            <a class="nav-link border rounded bg-dark active" href="Clientes.php"> Clientes </a>
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
            <!--Formularios relacionados a clientes - [Inicio]-->
            <?php
            if (isset($_GET["numerodeid"])) {
            ?>
                <!--Formulario para editar un cliente - [Inicio]-->
                <div class="col-3 px-2">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Editar Cliente
                        </div>
                        <div class="card-body">
                            <form action="Update_c.php" class="form-group" method="post">

                                <!--Tipo de identificación-->
                                <div class="form-group">
                                    <label> Tipo de documento: </label>
                                    <input type="text" readonly name="tipodoc" value='<?=$_GET["tipodoc"];?>' class="form-control">
                                </div>

                                <!--Número de identificación-->
                                <div class="form-group">
                                    <label> Número de identificación: </label>
                                    <input type="text" readonly name="numerodeid" value='<?=$_GET["numerodeid"];?>' class="form-control">
                                </div>

                                <!--Nombre-->
                                <div class="form-group">
                                    <label> Nombre completo: </label>
                                    <input type="text" name="nombrecompleto" value='<?=$_GET["nombrecompleto"];?>' class="form-control">
                                </div>

                                <!--Fecha de nacimiento-->
                                <div class="form-group">
                                    <label> Fecha de nacimiento: </label>
                                    <input type="date" name="fechanaci" value='<?=$_GET["fechanaci"];?>' class="form-control">
                                </div>

                                <!--Ciudad de nacimiento-->
                                <div class="form-group">
                                    <label> Ciudad de nacimiento: </label>
                                    <input type="text" name="ciudadnaci" value='<?=$_GET["ciudadnaci"];?>' class="form-control">
                                </div>

                                <!--Dirección de residencia-->
                                <div class="form-group">
                                    <label> Dirección de residencia: </label>
                                    <input type="text" name="direcresid" value='<?=$_GET["direcresid"];?>' class="form-control">
                                </div>
                                
                                <!--Ciudad de residencia-->
                                <div class="form-group">
                                    <label> Ciudad de residencia: </label>
                                    <input type="text" name="ciudadresid" value='<?=$_GET["ciudadresid"];?>' class="form-control">
                                </div>

                                <!--Nacionalidad-->
                                <div class="form-group">
                                    <label> Nacionalidad: </label>
                                    <input type="text" name="nacionalidad" value='<?=$_GET["nacionalidad"];?>' class="form-control">
                                </div>

                                <!--Teléfono-->
                                <div class="form-group">
                                    <label> Teléfono: </label>
                                    <input type="text" name="telefono" value='<?=$_GET["telefono"];?>' class="form-control">
                                </div>

                                <!--Botones-->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-dark" value="Guardar">
                                    <a href="clientes.php" class="btn btn-danger"> Descartar </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Formulario para editar un cliente - [Fin]-->
            <?php
            }
            else{
            ?>
                <!--Formulario para insertar un cliente - [Inicio]-->
                <div class="col-3 px-2">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Insertar Cliente
                        </div>
                        <div class="card-body">
                            <form action="Insert_c.php" class="form-group" method="post">

                                <!--Tipo de identificación-->
                                <div class="form-group">
                                    <label> Tipo de documento: </label><br>

                                    <select style="width: 250px;" name="tipodoc" id="tipodoc">
                                        <option value="CC"> Cédula de ciudadanía (CC) </option>
                                        <option value="CE"> Cédula de extrangería (CE) </option>
                                        <option value="TI"> Tarjeta de identidad (TI) </option>
                                        <option value="PB"> Pasaporte (PB) </option>
                                        <option value="NIT"> Número de identificación tributaria (NIT) </option>
                                        <option value="DNI/Otros"> Documento nacional de identidad (DNI/Otros) </option>
                                    </select>
                                </div>

                                <!--Número de identificación-->
                                <div class="form-group">
                                    <label> Número de identificación: </label>
                                    <input style="width: 250px;" type="text" name="numerodeid" id="numerodeid" class="form-control">
                                </div>

                                <!--Nombre-->
                                <div class="form-group">
                                    <label> Nombre completo: </label>
                                    <input style="width: 250px;" type="text" name="nombrecompleto" id="nombrecompleto" class="form-control">
                                </div>

                                <!--Fecha de nacimiento-->
                                <div class="form-group">
                                    <label> Fecha de nacimiento: </label>
                                    <input style="width: 250px;" type="date" name="fechanaci" id="fechanaci" class="form-control">
                                </div>

                                <!--Ciudad de nacimiento-->
                                <div class="form-group">
                                    <label> Ciudad de nacimiento: </label>
                                    <input style="width: 250px;" type="text" name="ciudadnaci" id="ciudadnaci" class="form-control">
                                </div>

                                <!--Dirección de residencia-->
                                <div class="form-group">
                                    <label> Dirección de residencia: </label>
                                    <input style="width: 250px;" type="text" name="direcresid" id="direcresid" class="form-control">
                                </div>

                                <!--Ciudad de residencia-->
                                <div class="form-group">
                                    <label> Ciudad de residencia: </label>
                                    <input style="width: 250px;" type="text" name="ciudadresid" id="ciudadresid" class="form-control">
                                </div>

                                <!--Nacionalidad-->
                                <div class="form-group">
                                    <label> Nacionalidad: </label>
                                    <input style="width: 250px;" type="text" name="nacionalidad" id="nacionalidad" class="form-control">
                                </div>

                                <!--Teléfono-->
                                <div class="form-group">
                                    <label> Teléfono: </label>
                                    <input style="width: 250px;" type="text" name="telefono" id="telefono" class="form-control">
                                </div>

                                <!--Botones-->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Insertar">
                                    <a href="Clientes.php" class="btn btn-danger"> Reiniciar </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Formulario para insertar un cliente - [Fin]-->
            <?php
                }
            ?>
            <!--Formularios relacionados a clientes - [Fin]-->

            <!--Tabla de clientes - [Inicio]-->
            <div class="col-9 px-1">
                <div class="col py-1 bg-dark text-white text-center">
                    <h3> Clientes Registrados </h3>
                </div>
                <table class="table-sm table-bordered border-rounded table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center"> Tipo de documento </th>
                            <th scope="col" class="text-center"> Número de documento </th>
                            <th scope="col" class="text-center"> Nombre </th>
                            <th scope="col" class="text-center"> Fecha de nacimiento </th>
                            <th scope="col" class="text-center"> Ciudad de nacimiento </th>
                            <th scope="col" class="text-center"> Dirección de residencia </th>
                            <th scope="col" class="text-center"> Ciudad de residencia </th>
                            <th scope="col" class="text-center"> Nacionalidad </th>
                            <th scope="col" class="text-center"> Teléfono </th>
                            <th scope="col" class="text-center"> Editar </th>
                            <th scope="col" class="text-center"> Borrar </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require('Select_c.php');
                            if ($result){
                                foreach ($result as $fila){
                        ?>
                        <tr>
                            <td class="text-center" style="width: 10px;"><?=$fila['tipodoc'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['numerodeid'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['nombrecompleto'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['fechanaci'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['ciudadnaci'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['direcresid'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['ciudadresid'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['nacionalidad'];?></td>
                            <td class="text-center" style="width: 250px;"><?=$fila['telefono'];?></td>
                            <td class="text-center" style="width: 250px;">
                                <form action="Clientes.php" method="GET">
                                    <input type="text" name="tipodoc" value='<?=$fila['tipodoc'];?>' hidden>
                                    <input type="text" name="numerodeid" value='<?=$fila['numerodeid'];?>' hidden>
                                    <input type="text" name="nombrecompleto" value='<?=$fila['nombrecompleto'];?>' hidden>
                                    <input type="text" name="fechanaci" value='<?=$fila['fechanaci'];?>' hidden>
                                    <input type="text" name="ciudadnaci" value='<?=$fila['ciudadnaci'];?>' hidden>
                                    <input type="text" name="direcresid" value='<?=$fila['direcresid'];?>' hidden>
                                    <input type="text" name="ciudadresid" value='<?=$fila['ciudadresid'];?>' hidden>
                                    <input type="text" name="nacionalidad" value='<?=$fila['nacionalidad'];?>' hidden>
                                    <input type="text" name="telefono" value='<?=$fila['telefono'];?>' hidden>
                                    <button class="btn btn-success" title="Editar" type="submit">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="text-center" style="width: 250px;">
                                <form action="Delete_c.php" method="POST">
                                    <input type="text" name="tipoIdBorrado" value='<?=$fila['tipodoc'];?>' hidden>
                                    <input type="text" name="idBorrado" value='<?=$fila['numerodeid'];?>' hidden>
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
            <!--Tabla de clientes - [Fin]-->
        </div>
    </div>
</body>
</html>