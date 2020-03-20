<!DOCTYPE html>
<html lang="es">
<head>
    <!--Configuraciones básicas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie = edge">

    <!-- Creando un link con las hojas de estilos -->
    <link rel="stylesheet" type="text/css" href="../Estilos.css">
    <link rel="stylesheet" type="text/css" href="./Estilos_trans.css">

    <!--Título de la pestaña-->
    <title> Casa de Cambios UnalMed - Transferencias </title>
</head>
<body>
    <!--Título de la página-->
    <header> <h1> Casa de Cambios UnalMed </h1></header>

    <!-- Barra de navegación -->
    <div>
        <table id="barraNavegacion">
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Index.html';">Inicio</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Personas/Personas.php';">Personas</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Empresas/Empresas.php'">Empresas</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Empleados/Empleados.php';">Empleados</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Transacciones/Transacciones.php';">Transacciones</button>
            </td>
            <td class="celdaNavegacion" >
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Sucursales/Sucursales.php';">Sucursales</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoSeleccionado" type="button" onclick="window.location.href = 'Transferencias.php';">Transferencias</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Divisas/Divisas.php';">Divisas</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Cajas/Cajas.php';">Cajas</button>
            </td>
        </table>
    </div>
    <div>
        <!-- Condicionales para mostrar mensajes de confirmación y de error -->
        <?php if(isset($_GET['msge'])){ ?>
            <div id="error">
                <?=$_GET['msge'];?>
            </div>

        <?php } elseif(isset($_GET['msgs'])){?> 
            <div id="correcto">
                <?=$_GET['msgs'];?>
            </div>
        <?php }

        if (!isset($_GET["numeroTrans"])) {
            ?>
            <!-- Formulario para insertar una transferencia - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Insertar Transferencia </div>
                <div id="contenidoFormulario">
                    <form action="Insert_trans.php" method="post">
                        <table>
                            <tr>
                            <td><label for="numeroTrans"> Número de transferencia: </label></td>
                            <td class="contenedorCampo"><input type="number" class="campo" min="0" name="numeroTrans" id="numeroTrans"></input></td>
                            </tr>

                            <tr>
                            <td><label for="tipo"> Tipo: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="tipo" id="tipo">
                                <option value="Ingreso" selected> Ingreso </option>
                                <option value="Egreso"> Egreso </option>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="monto"> Monto: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="monto" id="monto"></td>
                            </tr>

                            <tr>
                            <td><label for="fecha"> Fecha: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="date" name="fecha" id="fecha"></td>
                            </tr>

                            <tr>
                            <td><label for="tasaCambio"> Tasa de cambio: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="tasaCambio" id="tasaCambio"></td>
                            </tr>

                            <tr>
                            <td><label for="idDivisa"> Tipo de divisa: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idDivisa" id="idDivisa">
                                <?php
                                require('../Divisas/Select_d.php');
                                if ($result){
                                    foreach ($result as $fila){ ?>
                                        <option value="<?=$fila['tipoDivisa'];?>"> <?=$fila['tipoDivisa'];?> </option>
                                <?php }
                                } ?>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="idOficial"> Oficiales registrados: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idOficial" id="idOficial">
                                <?php
                                require('../Empleados/Select_oficiales.php');
                                if ($result){
                                    foreach ($result as $fila){ ?>
                                        <option value="<?=$fila['cedula'];?>"> <?=$fila['nombreCompleto'];?> (<?=$fila['cedula'];?>) </option>
                                <?php }
                                } ?>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="sucursalOrig"> Sucursal origen: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="sucursalOrig" id="sucursalOrig">
                                <?php
                                require('../Sucursales/Select_s.php');
                                if ($result){
                                    foreach ($result as $fila){ ?>
                                        <option value="<?=$fila['numeroRegistro'];?>"> <?=$fila['nombre'];?> (<?=$fila['numeroRegistro'];?>) </option>
                                <?php }
                                } ?>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="sucursalDest"> Sucursal origen: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="sucursalDest" id="sucursalDest">
                                <?php
                                require('../Sucursales/Select_s.php');
                                if ($result){
                                    foreach ($result as $fila){ ?>
                                        <option value="<?=$fila['numeroRegistro'];?>"> <?=$fila['nombre'];?> (<?=$fila['numeroRegistro'];?>) </option>
                                <?php }
                                } ?>
                            </select></td>
                            </tr>

                        </table>
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Insertar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Empleados.php';">Reiniciar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para insertar una transferencia - [Fin] -->
            <?php
        }
        else{
            ?>
            <!-- Formulario para editar una transferencia - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Editar Transferencia </div>
                <div id="contenidoFormulario">
                    <form action="Update_trans.php" method="post">

                        <table>
                            <tr>
                            <td><label for="numeroTrans"> Número de transferencia: </label></td>
                            <td class="contenedorCampo"><input type="number" class="campo" min="0" name="numeroTrans" id="numeroTrans" value='<?=$_GET["numeroTrans"];?>'></input></td>
                            </tr>

                            <tr>
                            <td><label for="tipo"> Tipo: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="tipo" id="tipo">
                                <?php
                                    if ($_GET['tipo'] == 'Ingreso') {?>
                                        <option value="Ingreso" selected> Ingreso </option>
                                        <option value="Egreso"> Egreso </option>
                                <?php   } else {?>
                                        <option value="Ingreso"> Ingreso </option>
                                        <option value="Egreso" selected> Egreso </option>
                                <?php   }?>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="monto"> Monto: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="monto" id="monto" value='<?=$_GET["monto"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="fecha"> Fecha: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="date" name="fecha" id="fecha" value='<?=$_GET["fecha"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="tasaCambio"> Tasa de cambio: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="tasaCambio" id="tasaCambio" value='<?=$_GET["tasaCambio"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="idDivisa"> Tipo de divisa: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idDivisa" id="idDivisa">
                                <?php
                                require('../Divisas/Select_d.php');
                                if ($result){
                                    foreach ($result as $fila){
                                        if ($fila['tipoDivisa'] != $_GET['idDivisa']) { ?>
                                            <option value="<?=$fila['tipoDivisa'];?>"> <?=$fila['tipoDivisa'];?> </option>
                                <?php   } else {?>
                                            <option value="<?=$fila['tipoDivisa'];?>"> <?=$fila['tipoDivisa'];?> </option>
                                <?php   }
                                    }
                                } ?>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="idOficial"> Oficiales registrados: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idOficial" id="idOficial">
                                <?php
                                require('../Empleados/Select_oficiales.php');
                                if ($result){
                                    foreach ($result as $fila){
                                        if ($fila['cedula'] != $_GET['idOficial']) { ?>
                                            <option value="<?=$fila['cedula'];?>"> <?=$fila['nombreCompleto'];?> (<?=$fila['cedula'];?>) </option>
                                <?php   } else {?>
                                            <option value="<?=$fila['cedula'];?>" selected> <?=$fila['nombreCompleto'];?> (<?=$fila['cedula'];?>) </option>
                                <?php   }
                                    }
                                } ?>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="sucursalOrig"> Sucursal origen: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="sucursalOrig" id="sucursalOrig">
                                <?php
                                require('../Sucursales/Select_s.php');
                                if ($result){
                                    foreach ($result as $fila){
                                        if ($fila['numeroRegistro'] != $_GET['sucursalOrig']) { ?>
                                            <option value="<?=$fila['numeroRegistro'];?>"> <?=$fila['nombre'];?> (<?=$fila['numeroRegistro'];?>) </option>
                                <?php   } else {?>
                                            <option value="<?=$fila['numeroRegistro'];?>" selected> <?=$fila['nombre'];?> (<?=$fila['numeroRegistro'];?>) </option>
                                <?php   }
                                    }
                                } ?>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="sucursalDest"> Sucursal origen: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="sucursalDest" id="sucursalDest">
                                <?php
                                require('../Sucursales/Select_s.php');
                                if ($result){
                                    foreach ($result as $fila){
                                        if ($fila['numeroRegistro'] != $_GET['sucursalDest']) { ?>
                                            <option value="<?=$fila['numeroRegistro'];?>"> <?=$fila['nombre'];?> (<?=$fila['numeroRegistro'];?>) </option>
                                <?php   } else {?>
                                            <option value="<?=$fila['numeroRegistro'];?>" selected> <?=$fila['nombre'];?> (<?=$fila['numeroRegistro'];?>) </option>
                                <?php   }
                                    }
                                } ?>
                            </select></td>
                            </tr>
                        </table>

                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Guardar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Transferencias.php';">Descartar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para editar una transferencia - [Fin] -->
            <?php
        }
        ?>
        <!-- Tabla de transferencias - [Inicio] -->
        <div id="divTabla">
            <div id="tituloTabla"> Transferencias Registradas </div>
            <table id="tabla">
                <thead id="encabezadoTabla">
                    <tr>
                        <th> Número </th>
                        <th> Tipo </th>
                        <th> Monto </th>
                        <th> Fecha </th>
                        <th> Tasa de Cambio </th>
                        <th> Divisa </th>
                        <th> Oficial </th>
                        <th> Sucursal Origen </th>
                        <th> Sucursal Desino </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require('Select_trans.php');
                        if ($result){
                            foreach ($result as $fila){
                    ?>
                    <tr>
                        <td><?=$fila['numeroTrans'];?></td>
                        <td><?=$fila['tipo'];?></td>
                        <td><?=$fila['monto'];?></td>
                        <td><?=$fila['fecha'];?></td>
                        <td><?=$fila['tasaCambio'];?></td>
                        <td><?=$fila['idDivisa'];?></td>
                        <td><?=$fila['idOficial'];?></td>
                        <td><?=$fila['sucursalOrig'];?></td>
                        <td><?=$fila['sucursalDest'];?></td>
                        <td>
                            <div><form id="formEditar" action="Transferencias.php" method="GET">
                                <input type="text" name="numeroTrans" value='<?=$fila['numeroTrans'];?>' hidden>
                                <input type="text" name="tipo" value='<?=$fila['tipo'];?>' hidden>
                                <input type="text" name="monto" value='<?=$fila['monto'];?>' hidden>
                                <input type="text" name="fecha" value='<?=$fila['fecha'];?>' hidden>
                                <input type="text" name="tasaCambio" value='<?=$fila['tasaCambio'];?>' hidden>
                                <input type="text" name="idDivisa" value='<?=$fila['idDivisa'];?>' hidden>
                                <input type="text" name="idOficial" value='<?=$fila['idOficial'];?>' hidden>
                                <input type="text" name="sucursalOrig" value='<?=$fila['sucursalOrig'];?>' hidden>
                                <input type="text" name="sucursalDest" value='<?=$fila['sucursalDest'];?>' hidden>
                                <button class="boton" id="botonAceptarTabla" title="Editar" type="submit"> Editar </button>
                            </form>
                            <form id="formEliminar" action="Delete_trans.php" method="POST">
                                <input type="text" name="numeroTrans" value='<?=$fila['numeroTrans'];?>' hidden>
                                <button class="boton" id="botonCancelarTabla" title="Eliminar" type="submit"> Eliminar </button>
                            </form></div>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Tabla de transferencias - [Fin] -->
    </div>
</body>
</html>