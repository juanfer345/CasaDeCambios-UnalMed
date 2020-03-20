<!DOCTYPE html>
<html lang="es">
<head>
    <!--Configuraciones básicas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie = edge">

    <!-- Creando un link con las hojas de estilos -->
    <link rel="stylesheet" type="text/css" href="../Estilos.css">
    <link rel="stylesheet" type="text/css" href="./Estilos_tran.css">

    <!--Título de la pestaña-->
    <title> Casa de Cambios UnalMed - Transacciones </title>

    <script>
        function opcionCliente(that) {
            if (that.value == "Persona") {
                document.getElementById("personaTr").style.display = "";
                document.getElementById("empresaTr").style.display = "none";
            } else {
                document.getElementById("personaTr").style.display = "none";
                document.getElementById("empresaTr").style.display = "";
            }
        }
    </script>
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
                <button class="elementoSeleccionado" type="button" onclick="window.location.href = 'Transacciones.php';">Transacciones</button>
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
    <div id="divGrande">
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

        if (!isset($_GET["codigo"])) {
            ?>
            <!-- Formulario para insertar una transaccion - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Insertar Transacción </div>
                <div id="contenidoFormulario">
                    <form action="Insert_Tran.php" method="post">
                        <table>
                            <tr>
                            <td><label for="codigo"> Código: </label></td>
                            <td class="contenedorCampo"><input type="number" class="campo" min="0" name="codigo" id="codigo"></input></td>
                            </tr>

                            <tr>
                            <td><label for="tipo"> Tipo: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="tipo" id="tipo">
                                <option value="Compra"> Compra </option>
                                <option value="Venta"> Venta </option>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="montoEntrada"> Monto entrada: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="montoEntrada" id="montoEntrada"></td>
                            </tr>

                            <tr>
                            <td><label for="montoSalida"> Monto salida: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="montoSalida" id="montoSalida"></td>
                            </tr>

                            <tr>
                            <td><label for="fecha"> Fecha: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="date" name="fecha" id="fecha"></td>
                            </tr>

                            <tr>
                            <td><label for="hora"> Hora: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="time" name="hora" id="hora"></td>
                            </tr>

                            <tr>
                            <td><label for="tasaCambio"> Tasa de cambio: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="tasaCambio" id="tasaCambio"></td>
                            </tr>

                            <tr>
                            <td><label for="montoInicial"> Monto caja inicial: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="montoInicial" id="montoInicial"></td>
                            </tr>

                            <tr>
                            <td><label for="divisaPesos"> Divisa en pesos: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="divisaPesos" id="divisaPesos">
                                <option value="Entrada"> Monto de entrada </option>
                                <option value="Salida"> Monto de salida </option>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="idDivisa"> Tipo de divisa del otro monto: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idDivisa" id="idDivisa">
                                <?php
                                require('../Divisas/Select_d_noCOP.php');
                                if ($result){
                                    foreach ($result as $fila){ ?>
                                        <option value="<?=$fila['tipoDivisa'];?>"> <?=$fila['tipoDivisa'];?> </option>
                                <?php }
                                } ?>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="idSucursal"> Sucursales registradas: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idSucursal" id="idSucursal">
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
                            <td><label for="idCajero"> Cajeros registrados: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idCajero" id="idCajero">
                                <?php
                                require('../Empleados/Select_cajeros.php');
                                if ($result){
                                    foreach ($result as $fila){ ?>
                                        <option value="<?=$fila['cedula'];?>"> <?=$fila['nombreCompleto'];?> (<?=$fila['cedula'];?>) </option>
                                <?php }
                                } ?>
                            </select></td>

                            <tr>
                                <td><label for="tipoCli"> Tipo de cliente: </label></td>
                                <td class="contenedorCampo"><select class="campo" name="tipoCli" id="tipoCli" onchange="opcionCliente(this);">
                                    <option value="Persona"> Persona </option>
                                    <option value="Empresa"> Empresa </option>
                                </select></td>
                            </tr>

                            <tr id="personaTr">
                            <td><label for="personasRegistradas"> Personas registradas: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="personasRegistradas" id="personasRegistradas">
                                <?php
                                require('../Personas/Select_p.php');
                                if ($result){
                                    foreach ($result as $fila){ ?>
                                        <option value="<?=$fila['tipoDoc'],',',$fila['numeroId'];?>"> <?=$fila['nombreCompleto'];?> <?=$fila['numeroId'];?> (<?=$fila['tipoDoc'];?>) </option>
                                <?php }
                                } ?>
                            </select></td>
                            </tr>
                            </tr>

                            <tr id="empresaTr" style="display: none;">
                            <td><label for="nitEmpresa"> Empresas registradas: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="nitEmpresa" id="nitEmpresa">
                                <?php
                                require('../Empresas/Select_e.php');
                                if ($result){
                                    foreach ($result as $fila){ ?>
                                        <option value="<?=$fila['nit'];?>"> <?=$fila['nombre'];?> (<?=$fila['nit'];?>) </option>
                                <?php }
                                } ?>
                            </select></td>
                            </tr>
                            </tr>

                        </table>
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Insertar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Transacciones.php';">Reiniciar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para insertar una transaccion - [Fin] -->
            <?php
        }
        else{
            ?>
            <!-- Formulario para editar una transaccion - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Editar Transacción </div>
                <div id="contenidoFormulario">
                    <form action="Update_tran.php" method="post">

                        <table>
                            <tr>
                            <td><label for="codigo"> Código: </label></td>
                            <td class="contenedorCampo"><input type="number" readonly class="campo" min="0" name="codigo" id="codigo" value='<?=$_GET["codigo"];?>'></input></td>
                            </tr>

                            <tr>
                            <td><label for="tipo"> Tipo: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="tipo" id="tipo">
                                <?php
                                    if ($_GET['tipo'] == 'Compra') {?>
                                        <option value="Compra" selected> Compra </option>
                                        <option value="Venta"> Venta </option>
                                <?php   } else {?>
                                        <option value="Compra"> Compra </option>
                                        <option value="Venta" selected> Venta </option>
                                <?php   }?>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="montoEntrada"> Monto entrada: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="montoEntrada" id="montoEntrada" value='<?=$_GET["montoEntrada"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="montoSalida"> Monto salida: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="montoSalida" id="montoSalida" value='<?=$_GET["montoSalida"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="fecha"> Fecha: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="date" name="fecha" id="fecha" value='<?=$_GET["fecha"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="hora"> Hora: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="time" name="hora" id="hora" value='<?=$_GET["hora"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="tasaCambio"> Tasa de cambio: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="tasaCambio" id="tasaCambio" value='<?=$_GET["tasaCambio"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="montoInicial"> Monto caja inicial: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="montoInicial" id="montoInicial" value='<?=$_GET["montoInicial"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="divisaPesos"> Divisa en pesos: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="divisaPesos" id="divisaPesos">
                                <?php
                                    if ($_GET['tipo'] == 'Entrada') {?>
                                        <option value="Entrada" selected> Monto de entrada </option>
                                        <option value="Salida"> Monto de salida </option>
                                <?php   } else {?>
                                        <option value="Entrada"> Monto de entrada </option>
                                        <option value="Salida" selected> Monto de salida </option>
                                <?php   }?>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="idDivisa"> Tipo de divisa del otro monto: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idDivisa" id="idDivisa">
                                <?php
                                require('../Divisas/Select_d_noCOP.php');
                                if ($result){
                                    foreach ($result as $fila){
                                        if ($fila['tipoDivisa'] != $_GET['idDivisa']) { ?>
                                            <option value="<?=$fila['tipoDivisa'];?>"> <?=$fila['tipoDivisa'];?> </option>
                                <?php   } else {?>
                                            <option value="<?=$fila['tipoDivisa'];?>" selected> <?=$fila['tipoDivisa'];?> </option>
                                <?php   }
                                    }
                                } ?>
                            </select></td>
                            </tr>

                            <tr>
                            <td><label for="idSucursal"> Sucursales registradas: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idSucursal" id="idSucursal">
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
                            <td><label for="idCajero"> Cajeros registrados: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idCajero" id="idCajero">
                                <?php
                                require('../Empleados/Select_cajeros.php');
                                if ($result){
                                    foreach ($result as $fila){
                                        if ($fila['cedula'] != $_GET['idCajero']) { ?>
                                            <option value="<?=$fila['cedula'];?>"> <?=$fila['nombreCompleto'];?> (<?=$fila['cedula'];?>) </option>
                                <?php   } else {?>
                                            <option value="<?=$fila['cedula'];?>" selected> <?=$fila['nombreCompleto'];?> (<?=$fila['cedula'];?>) </option>
                                <?php   }
                                    }
                                } ?>
                            </select></td>

                            <tr>
                                <td><label for="tipoCli"> Tipo de cliente: </label></td>
                                <td class="contenedorCampo"><select class="campo" name="tipoCli" onchange="opcionCliente(this);">
                                <?php
                                    if ($_GET['tipoDocCliente'] != '') {?>
                                    <option value="Persona" selected> Persona </option>
                                    <option value="Empresa"> Empresa </option>
                                <?php   } else {?>
                                    <option value="Persona"> Persona </option>
                                    <option value="Empresa" selected> Empresa </option>
                                <?php   }?>
                                </select></td>
                            </tr>

                            <?php
                            if ($_GET['tipoDocCliente'] != '') {?>
                                <tr id="personaTr">
                            <?php   } else {?>
                                <tr id="personaTr" style="display: none;" >
                            <?php   }?>
                            <td><label for="personasRegistradas"> Personas registradas: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="personasRegistradas" id="personasRegistradas">
                                <?php
                                require('../Personas/Select_p.php');
                                if ($result){
                                    foreach ($result as $fila){
                                        if ($fila['tipoDoc'] != $_GET['tipoDocCliente'] and $fila['numeroId'] != $_GET['numeroIdCliente']) { ?>
                                            <option value="<?=$fila['tipoDoc'],',',$fila['numeroId'];?>"> <?=$fila['nombreCompleto'];?> <?=$fila['numeroId'];?> (<?=$fila['tipoDoc'];?>) </option>
                                <?php   } else {?>
                                            <option value="<?=$fila['tipoDoc'],',',$fila['numeroId'];?>" selected> <?=$fila['nombreCompleto'];?> <?=$fila['numeroId'];?> (<?=$fila['tipoDoc'];?>) </option>
                                <?php   }
                                    }
                                } ?>
                            </select></td>
                            </tr>

                            <?php
                            if ($_GET['tipoDocCliente'] != '') {?>
                                <tr id="empresaTr" style="display: none;">
                            <?php   } else {?>
                                <tr id="empresaTr">
                            <?php   }?>
                            <td><label for="nitEmpresa"> Empresas registradas: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="nitEmpresa" id="nitEmpresa">
                                <?php
                                require('../Empresas/Select_e.php');
                                if ($result){
                                    foreach ($result as $fila){
                                        if ($fila['nit'] != $_GET['nitEmpresa']) { ?>
                                            <option value="<?=$fila['nit'];?>"> <?=$fila['nombre'];?> (<?=$fila['nit'];?>) </option>
                                <?php   } else {?>
                                            <option value="<?=$fila['nit'];?>" selected> <?=$fila['nombre'];?> (<?=$fila['nit'];?>) </option>
                                <?php   }
                                    }
                                } ?>
                            </select></td>
                            </tr>

                        </table>
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Guardar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Transacciones.php';">Descartar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para editar una transaccion - [Fin] -->
            <?php
        }
        ?>
        <!-- Tabla de transacciones - [Inicio] -->
        <div id="divTabla">
            <div id="tituloTabla"> Transacciones Registradas </div>
            <table id="tabla">
                <thead id="encabezadoTabla">
                    <tr>
                        <th> Código </th>
                        <th> Tipo </th>
                        <th> Monto de Entrada </th>
                        <th> Monto de Salida </th>
                        <th> Fecha </th>
                        <th> Hora </th>
                        <th> Tasa de Cambio </th>
                        <th> Monto Inicial Caja </th>
                        <th> Divisa en Pesos </th>
                        <th> Divisa Otro Monto </th>
                        <th> Sucursal </th>
                        <th> Cajero </th>
                        <th> Tipo Documento Cliente </th>
                        <th> Número Documento Cliente </th>
                        <th> Nit Empresa </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require('Select_tran.php');
                        if ($result){
                            foreach ($result as $fila){
                    ?>
                    <tr>
                        <td><?=$fila['codigo'];?></td>
                        <td><?=$fila['tipo'];?></td>
                        <td><?=$fila['montoEntrada'];?></td>
                        <td><?=$fila['montoSalida'];?></td>
                        <td><?=$fila['fecha'];?></td>
                        <td><?=$fila['hora'];?></td>
                        <td><?=$fila['tasaCambio'];?></td>
                        <td><?=$fila['montoInicial'];?></td>
                        <td><?=$fila['divisaPesos'];?></td>
                        <td><?=$fila['idDivisa'];?></td>
                        <td><?=$fila['idSucursal'];?></td>
                        <td><?=$fila['idCajero'];?></td>
                        <td><?=$fila['tipoDocCliente'];?></td>
                        <td><?=$fila['numeroIdCliente'];?></td>
                        <td><?=$fila['nitEmpresa'];?></td>
                        <td>
                            <div><form id="formEditar" action="Transacciones.php" method="GET">
                                <input type="text" name="codigo" value='<?=$fila['codigo'];?>' hidden>
                                <input type="text" name="tipo" value='<?=$fila['tipo'];?>' hidden>
                                <input type="text" name="montoEntrada" value='<?=$fila['montoEntrada'];?>' hidden>
                                <input type="text" name="montoSalida" value='<?=$fila['montoSalida'];?>' hidden>
                                <input type="text" name="fecha" value='<?=$fila['fecha'];?>' hidden>
                                <input type="text" name="hora" value='<?=$fila['hora'];?>' hidden>
                                <input type="text" name="tasaCambio" value='<?=$fila['tasaCambio'];?>' hidden>
                                <input type="text" name="montoInicial" value='<?=$fila['montoInicial'];?>' hidden>
                                <input type="text" name="divisaPesos" value='<?=$fila['divisaPesos'];?>' hidden>
                                <input type="text" name="idDivisa" value='<?=$fila['idDivisa'];?>' hidden>
                                <input type="text" name="idSucursal" value='<?=$fila['idSucursal'];?>' hidden>
                                <input type="text" name="idCajero" value='<?=$fila['idCajero'];?>' hidden>
                                <input type="text" name="tipoDocCliente" value='<?=$fila['tipoDocCliente'];?>' hidden>
                                <input type="text" name="numeroIdCliente" value='<?=$fila['numeroIdCliente'];?>' hidden>
                                <input type="text" name="nitEmpresa" value='<?=$fila['nitEmpresa'];?>' hidden>
                                <button class="boton" id="botonAceptarTabla" title="Editar" type="submit"> Editar </button>
                            </form>
                            <form id="formEliminar" action="Delete_tran.php" method="POST">
                                <input type="text" name="codigo" value='<?=$fila['codigo'];?>' hidden>
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
        <!-- Tabla de transacciones - [Fin] -->
    </div>
</body>
</html>