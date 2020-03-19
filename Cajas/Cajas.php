<!DOCTYPE html>
<html lang="es">
<head>
    <!--Configuraciones básicas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie = edge">

    <!-- Creando un link con las hojas de estilos -->
    <link rel="stylesheet" type="text/css" href="../Estilos.css">
    <link rel="stylesheet" type="text/css" href="./Estilos_c.css">

    <!--Título de la pestaña-->
    <title> Casa de Cambios UnalMed - Cajas </title>
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
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Transferencias/Transferencias.php';">Transferencias</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Divisas/Divisas.php';">Divisas</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoSeleccionado" type="button" onclick="window.location.href = 'Cajas.php';">Cajas</button>
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

        if (!isset($_GET["codigo"])) {

            ?>
            <!-- Formulario para insertar una caja - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Insertar Caja </div>
                <div id="contenidoFormulario">
                    <form action="Insert_c.php" method="post">
                        <table>
                            <tr>
                            <td><label for="codigo"> Código: </label></td>
                            <td class="contenedorCampo"><input type="number" class="campo" min="0" name="codigo" id="codigo"></input></td>
                            </tr>

                            <tr>
                            <td><label for="montoTotal"> Monto total: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="montoTotal" id="montoTotal"></td>
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
                        </table>
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Insertar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Cajas.php';">Reiniciar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para insertar una caja - [Fin] -->
            <?php
        }
        else{
            ?>
            <!-- Formulario para editar una caja - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Editar Caja </div>
                <div id="contenidoFormulario">
                    <form action="Update_c.php" method="post">

                        <table>
                            <tr>
                            <td><label for="codigo"> Código: </label></td>
                            <td class="contenedorCampo"><input type="number" readonly class="campo" name="codigo" id="codigo" value='<?=$_GET["codigo"];?>'></input></td>
                            </tr>

                            <tr>
                            <td><label for="montoTotal"> Monto total: </label></td>
                            <td class="contenedorCampo"><input type="number" step="0.01" class="campo" min="0" name="montoTotal" id="montoTotal" value='<?=$_GET["montoTotal"];?>'></td>
                            </tr>

                            <tr>
                            <td><label for="idSucursal"> Sucursal: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="idSucursal" id="idSucursal" >
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
                        </table>
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Guardar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Cajas.php';">Descartar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para editar una caja - [Fin] -->
            <?php
        }
        ?>
        <!-- Tabla de cajas - [Inicio] -->
        <div id="divTabla">
            <div id="tituloTabla"> Cajas Registradas </div>
            <table id="tabla">
                <thead id="encabezadoTabla">
                    <tr>
                        <th> Código </th>
                        <th> Monto total </th>
                        <th> Sucursal </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require('Select_c.php');
                        if ($result){
                            foreach ($result as $fila){
                    ?>
                    <tr>
                        <td><?=$fila['codigo'];?></td>
                        <td><?=$fila['montoTotal'];?></td>
                        <td><?=$fila['idSucursal'];?></td>
                        <td>
                            <div><form id="formEditar" action="Cajas.php" method="GET">
                                <input type="text" name="codigo" value='<?=$fila['codigo'];?>' hidden>
                                <input type="text" name="montoTotal" value='<?=$fila['montoTotal'];?>' hidden>
                                <input type="text" name="idSucursal" value='<?=$fila['idSucursal'];?>' hidden>
                                <button class="boton" id="botonAceptarTabla" title="Editar" type="submit"> Editar </button>
                            </form>
                            <form id="formEliminar" action="Delete_c.php" method="POST">
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
        <!-- Tabla de cajas - [Fin] -->
    </div>
</body>
</html>