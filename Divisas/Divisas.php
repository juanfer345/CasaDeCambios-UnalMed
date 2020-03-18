<!DOCTYPE html>
<html lang="es">
<head>
    <!--Configuraciones básicas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie = edge">

    <!-- Creando un link con las hojas de estilos -->
    <link rel="stylesheet" type="text/css" href="../Estilos.css">
    <link rel="stylesheet" type="text/css" href="./Estilos_d.css">

    <!--Título de la pestaña-->
    <title> Casa de Cambios UnalMed - Divisas </title>
</head>
<body>
    <!-- Título de la página -->
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
                <button class="elementoSeleccionado" type="button" onclick="window.location.href = 'Divisas.php';">Divisas</button>
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

        if (!isset($_GET["tipoDivisa"])) {
        ?>
            <!-- Formulario para insertar una divisa - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Insertar Divisa </div>
                <div id="contenidoFormulario">
                    <form action="Insert_d.php" method="post">

                        <table>
                            <!-- Tipo de divisa -->
                            <tr>
                            <td><label for="tipoDivisa"> Tipo de divisa: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="tipoDivisa" id="tipoDivisa"></td>
                            </tr>

                            <!-- Tasa de compra -->
                            <tr>
                            <td><label for="tasaCompra"> Tasa de compra: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" name="tasaCompra" id="tasaCompra"></td>
                            </tr>

                            <!-- Tasa de venta -->
                            <tr>
                            <td><label for="tasaVenta"> Tasa de venta: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" name="tasaVenta" id="tasaVenta"></td>
                            </tr>
                        </table>

                        <!-- Botones -->
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Insertar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Divisas.php';">Reiniciar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para insertar una divisa - [Fin] -->
        <?php
        }
        else{
        ?>
            <!-- Formulario para editar una divisa - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Editar Divisa </div>
                <div id="contenidoFormulario">
                    <form action="Update_d.php" method="post">

                        <table>
                            <!-- Tipo de identificación -->
                            <tr>
                            <td><label for="tipoDivisa"> Tipo de divisa: </label></td>
                            <td class="contenedorCampo"> <input class="campo" readonly type="text" id="tipoDivisa" name="tipoDivisa" value='<?=$_GET["tipoDivisa"];?>'> </td>
                            </tr>

                            <!-- Tasa de compra -->
                            <tr>
                            <td><label for="tasaCompra"> Tasa de compra: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" id="tasaCompra" name="tasaCompra" value='<?=$_GET["tasaCompra"];?>'></td>
                            </tr>

                            <!-- Tasa de venta -->
                            <tr>
                            <td><label for="tasaVenta"> Tasa de venta: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" id="tasaVenta" name="tasaVenta" value='<?=$_GET["tasaVenta"];?>'></td>
                            </tr>
                        </table>

                        <!-- Botones -->
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Guardar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Divisas.php';">Descartar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para editar una divisa - [Fin] -->
        <?php
            }
        ?>
        <!-- Tabla de divissas - [Inicio] -->
        <div id="divTabla">
            <div id="tituloTabla"> Divisas Registradas </div>
            <table id="tabla">
                <thead id="encabezadoTabla">
                    <tr>
                        <th> Tipo de divisa </th>
                        <th> Tasa de compra </th>
                        <th> Tasa de venta </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require('Select_d.php');
                        if ($result){
                            foreach ($result as $fila){
                    ?>
                    <tr>
                        <td><?=$fila['tipoDivisa'];?></td>
                        <td><?=$fila['tasaCompra'];?></td>
                        <td><?=$fila['tasaVenta'];?></td>
                        <td>
                            <div><form id="formEditar" action="Divisas.php" method="GET">
                                <input type="text" name="tipoDivisa" value='<?=$fila['tipoDivisa'];?>' hidden>
                                <input type="text" name="tasaCompra" value='<?=$fila['tasaCompra'];?>' hidden>
                                <input type="text" name="tasaVenta" value='<?=$fila['tasaVenta'];?>' hidden>
                                <button class="boton" id="botonAceptarTabla" title="Editar" type="submit"> Editar </button>
                            </form>
                            <form id="formEliminar" action="Delete_d.php" method="POST">
                                <input type="text" name="tipoDivisa" value='<?=$fila['tipoDivisa'];?>' hidden>
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
        <!-- Tabla de divissas - [Fin] -->
    </div>
</body>
</html>