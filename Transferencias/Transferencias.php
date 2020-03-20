<!DOCTYPE html>
<html lang="es">
<head>
    <!--Configuraciones básicas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie = edge">

    <!-- Creando un link con las hojas de estilos -->
    <link rel="stylesheet" type="text/css" href="../Estilos.css">
    <link rel="stylesheet" type="text/css" href="./Estilos_em.css">

    <!--Título de la pestaña-->
    <title> Casa de Cambios UnalMed - Empleados </title>
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
                <button class="elementoSeleccionado" type="button" onclick="window.location.href = 'Empleados.php';">Empleados</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Transacciones/Transacciones.php';">Transacciones</button>
            </td>
            <td class="celdaNavegacion" >
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Sucursales/Sucursales.php';">Sucursales</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Transferencias/Transferencias.php';">Transferencias</button>
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

        if (!isset($_GET["cedula"])) {
            ?>
            <!-- Formulario para insertar un empleado - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Insertar Empleado </div>
                <div id="contenidoFormulario">
                    <form action="Insert_em.php" method="post">
                        <table>
                            <tr>
                            <td><label for="cedula"> Cédula: </label></td>
                            <td class="contenedorCampo"><input type="number" class="campo" min="0" name="cedula" id="cedula"></input></td>
                            </tr>

                            <tr>
                            <td><label for="nombreCompleto"> Nombre completo: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="nombreCompleto" id="nombreCompleto"></td>
                            </tr>

                            <tr>
                            <td><label for="numeroSistema"> Número en sistema: </label></td>
                            <td class="contenedorCampo"><input type="number" class="campo" min="0" name="numeroSistema" id="numeroSistema"></input></td>
                            </tr>

                            <tr>
                            <td><label for="direccion"> Dirección: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="direccion" id="direccion"></td>
                            </tr>

                            <tr>
                            <td><label for="telefono"> Teléfono: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" name="telefono" id="telefono"></td>
                            </tr>

                            <tr>
                            <td><label for="idSucursal"> Sucursales registradas: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idSucursal" id="idSucursal">
                                <option value="NULL"> Sin asignar </option>
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
                                <td><label for="tipoEmp"> Tipo de empleado: </label></td>
                                <td class="contenedorCampo"><select class="campo" name="tipoEmp" id="tipoEmp" onchange="opcionOficial(this);">
                                    <option value="Cajero"> Cajero </option>
                                    <option value="Oficial"> Oficial </option>
                                </select></td>
                            </tr>

                            <tr id="codigoTransT" style="display: none;">
                            <td><label for="codigoTrans"> Código de transacción: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" name="codigoTrans" id="codigoTrans"></td>
                            </tr>

                        </table>
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Insertar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Empleados.php';">Reiniciar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para insertar un empleado - [Fin] -->
            <?php
        }
        else{
            ?>
            <!-- Formulario para editar un empleado - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Editar Empleado </div>
                <div id="contenidoFormulario">
                    <form action="Update_em.php" method="post">

                        <table>
                            <tr>
                            <td><label for="cedula"> Cédula: </label></td>
                            <td class="contenedorCampo"><input type="number" readonly class="campo" min="0" name="cedula" id="cedula" value='<?=$_GET["cedula"];?>'></input></td>
                            </tr>

                            <tr>
                            <td><label for="nombreCompleto"> Nombre completo: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="nombreCompleto" id="nombreCompleto" value='<?=$_GET["nombreCompleto"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="numeroSistema"> Número en sistema: </label></td>
                            <td class="contenedorCampo"><input type="number" class="campo" min="0" name="numeroSistema" id="numeroSistema" value='<?=$_GET["numeroSistema"];?>'></input></td>
                            </tr>

                            <tr>
                            <td><label for="direccion"> Dirección: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="direccion" id="direccion" value='<?=$_GET["direccion"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="telefono"> Teléfono: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" name="telefono" id="telefono" value='<?=$_GET["telefono"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="idSucursal"> Sucursal: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idSucursal" id="idSucursal" >
                                <option value="NULL"> Sin asignar </option>
                                <?php
                                require('../Sucursales/Select_s.php');
                                if ($result){
                                    foreach ($result as $fila){ 
                                        if ($fila['numeroRegistro'] != $_GET['idSucursal']) { ?>
                                            <option value="<?=$fila['numeroRegistro'];?>"> <?=$fila['nombre'];?> (<?=$fila['numeroRegistro'];?>) </option>
                                <?php   } else {?>
                                            <option value="<?=$fila['numeroRegistro'];?>" selected> <?=$fila['nombre'];?> (<?=$fila['numeroRegistro'];?>) </option>
                                <?php   }
                                    }
                                } ?>
                            </select></td>
                            </tr>

                            <tr>
                                <td><label for="tipoEmp"> Tipo de empleado: </label></td>
                                <td class="contenedorCampo"><select class="campo" name="tipoEmp" id="tipoEmp" onchange="opcionOficial(this);">
                                    <?php
                                    if ($_GET['tipoEmp'] == 'Cajero') {?>
                                        <option value="Cajero" selected> Cajero </option>
                                        <option value="Oficial"> Oficial </option>
                                <?php   } else {?>
                                        <option value="Cajero"> Cajero </option>
                                        <option value="Oficial" selected> Oficial </option>
                                <?php   }?>
                                </select></td>
                            </tr>
                            
                            <?php
                            if ($_GET['tipoEmp'] == 'Cajero') {?>
                                <tr id="codigoTransT" style="display: none;">
                            <?php   } else {?>
                                <tr id="codigoTransT">
                            <?php   }?>
                            <td><label for="codigoTrans"> Código de transacción: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" name="codigoTrans" id="codigoTrans" value='<?=$_GET["codigoTrans"];?>'></td>
                            </tr>
                        </table>
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Guardar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Empleados.php';">Descartar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para editar un empleado - [Fin] -->
            <?php
        }
        ?>
        <!-- Tabla de empleados - [Inicio] -->
        <div id="divTabla">
            <div id="tituloTabla"> Empleados Registrados </div>
            <table id="tabla">
                <thead id="encabezadoTabla">
                    <tr>
                        <th> Cedula </th>
                        <th> Nombre </th>
                        <th> Numero en Sistema </th>
                        <th> Direccion </th>
                        <th> Telefono </th>
                        <th> Sucursal </th>
                        <th> Tipo </th>
                        <th> Codigo de Transacción </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require('Select_em.php');
                        if ($result){
                            foreach ($result as $fila){
                    ?>
                    <tr>
                        <td><?=$fila['cedula'];?></td>
                        <td><?=$fila['nombreCompleto'];?></td>
                        <td><?=$fila['numeroSistema'];?></td>
                        <td><?=$fila['direccion'];?></td>
                        <td><?=$fila['telefono'];?></td>
                        <td><?=$fila['idSucursal'];?></td>
                        <td><?=$fila['tipoEmp'];?></td>
                        <td><?=$fila['codigoTrans'];?></td>
                        <td>
                            <div><form id="formEditar" action="Empleados.php" method="GET">
                                <input type="text" name="cedula" value='<?=$fila['cedula'];?>' hidden>
                                <input type="text" name="nombreCompleto" value='<?=$fila['nombreCompleto'];?>' hidden>
                                <input type="text" name="numeroSistema" value='<?=$fila['numeroSistema'];?>' hidden>
                                <input type="text" name="direccion" value='<?=$fila['direccion'];?>' hidden>
                                <input type="text" name="telefono" value='<?=$fila['telefono'];?>' hidden>
                                <input type="text" name="idSucursal" value='<?=$fila['idSucursal'];?>' hidden>
                                <input type="text" name="tipoEmp" value='<?=$fila['tipoEmp'];?>' hidden>
                                <input type="text" name="codigoTrans" value='<?=$fila['codigoTrans'];?>' hidden>
                                <button class="boton" id="botonAceptarTabla" title="Editar" type="submit"> Editar </button>
                            </form>
                            <form id="formEliminar" action="Delete_em.php" method="POST">
                                <input type="text" name="cedula" value='<?=$fila['cedula'];?>' hidden>
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
        <!-- Tabla de empleados - [Fin] -->
    </div>
</body>
</html>