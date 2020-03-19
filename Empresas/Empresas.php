<!DOCTYPE html>
<html lang="es">
<head>
    <!--Configuraciones básicas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie = edge">

    <!-- Creando un link con las hojas de estilos -->
    <link rel="stylesheet" type="text/css" href="../Estilos.css">
    <link rel="stylesheet" type="text/css" href="./Estilos_e.css">

    <!--Título de la pestaña-->
    <title> Casa de Cambios UnalMed - Empresas </title>
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
                <button class="elementoSeleccionado" type="button" onclick="window.location.href = 'Empresas.php'">Empresas</button>
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

        if (!isset($_GET["nit"])) {

            ?>
            <!-- Formulario para insertar una empresa - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Insertar Empresa </div>
                <div id="contenidoFormulario">
                    <form action="Insert_e.php" method="post">

                        <table>
                            <!-- Número de identificación -->
                            <tr>
                            <td><label for="nit"> NIT: </label></td>
                            <td class="contenedorCampo"><input type="number" class="campo" min="0" name="nit" id="nit"></input></td>
                            </tr>

                            <!-- Nombre -->
                            <tr>
                            <td><label for="nombre"> Nombre: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="nombre" id="nombre"></td>
                            </tr>

                            <!-- Dirección -->
                            <tr>
                            <td><label for="direccion"> Dirección: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="direccion" id="direccion"></td>
                            </tr>

                            <!-- Teléfono -->
                            <tr>
                            <td><label for="telefono"> Teléfono: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" name="telefono" id="telefono"></td>
                            </tr>
                        </table>

                        <!-- Botones -->
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Insertar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Empresas.php';">Reiniciar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para insertar una empresa - [Fin] -->
            <?php
        }
        else{
            ?>
            <!-- Formulario para editar una empresa - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Editar Empresa </div>
                <div id="contenidoFormulario">
                    <form action="Update_e.php" method="post">

                        <table>
                            <!-- Número de identificación -->
                            <tr>
                            <td><label for="nit"> NIT: </label></td>
                            <td class="contenedorCampo"><input type="number" readonly class="campo" name="nit" id="nit" value='<?=$_GET["nit"];?>'></input></td>
                            </tr>

                            <!-- Nombre -->
                            <tr>
                            <td><label for="nombre"> Nombre: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="nombre" id="nombre" value='<?=$_GET["nombre"];?>'></td>
                            </tr>

                            <!-- Dirección -->
                            <tr>
                            <td><label for="direccion"> Dirección: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="direccion" id="direccion" value='<?=$_GET["direccion"];?>'></td>
                            </tr>

                            <!-- Teléfono -->
                            <tr>
                            <td><label for="telefono"> Teléfono: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" name="telefono" id="telefono" value='<?=$_GET["telefono"];?>'></td>
                            </tr>
                        </table>

                        <!-- Botones -->
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Guardar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Empresas.php';">Descartar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para editar una empresa - [Fin] -->
            <?php
        }
        ?>
        <!-- Tabla de empresas - [Inicio] -->
        <div id="divTabla">
            <div id="tituloTabla"> Empresas Registradas </div>
            <table id="tabla">
                <thead id="encabezadoTabla">
                    <tr>
                        <th> NIT </th>
                        <th> Nombre </th>
                        <th> Dirección </th>
                        <th> Teléfono </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require('Select_e.php');
                        if ($result){
                            foreach ($result as $fila){
                    ?>
                    <tr>
                        <td><?=$fila['nit'];?></td>
                        <td><?=$fila['nombre'];?></td>
                        <td><?=$fila['direccion'];?></td>
                        <td><?=$fila['telefono'];?></td>
                        <td>
                            <div><form id="formEditar" action="Empresas.php" method="GET">
                                <input type="text" name="nit" value='<?=$fila['nit'];?>' hidden>
                                <input type="text" name="nombre" value='<?=$fila['nombre'];?>' hidden>
                                <input type="text" name="direccion" value='<?=$fila['direccion'];?>' hidden>
                                <input type="text" name="telefono" value='<?=$fila['telefono'];?>' hidden>
                                <button class="boton" id="botonAceptarTabla" title="Editar" type="submit"> Editar </button>
                            </form>
                            <form id="formEliminar" action="Delete_e.php" method="POST">
                                <input type="text" name="nit" value='<?=$fila['nit'];?>' hidden>
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
        <!-- Tabla de empresas - [Fin] -->
    </div>
</body>
</html>