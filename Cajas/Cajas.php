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
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '.Sucursales.php';">Sucursales</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Transferencias/Transferencias.php';">Transferencias</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoNavegacion" type="button" onclick="window.location.href = '../Divisas/Divisas.php';">Divisas</button>
            </td>
            <td class="celdaNavegacion">
                <button class="elementoSeleccionado" type="button" onclick="window.location.href = '../Cajas/Cajas.php';">Cajas</button>
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

        if (!isset($_GET["numeroRegistro"])) {

            ?>
            <!-- Formulario para insertar una sucursal - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Insertar Sucursal </div>
                <div id="contenidoFormulario">
                    <form action="Insert_s.php" method="post">
                        <table>
                            <!-- Número de identificación -->
                            <tr>
                            <td><label for="numeroRegistro"> Numero de Registro: </label></td>
                            <td class="contenedorCampo"><input type="number" class="campo" min="0" name="numeroRegistro" id="numeroRegistro"></input></td>
                            </tr>

                            <!-- Nombre -->
                            <tr>
                            <td><label for="nombre"> Nombre: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="nombre" id="nombre"></td>
                            </tr>

                            <!-- Ciudad -->
                            <tr>
                            <td><label for="ciudad"> Ciudad: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="ciudad" id="ciudad"></td>
                            </tr>

                            <!-- Dirección -->
                            <tr>
                            <td><label for="direccion"> Dirección: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="direccion" id="direccion"></td>
                            </tr>

                            <!-- horario -->
                            <tr>
                            <td><label for="horario"> horario: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="horario" id="horario"></td>
                            </tr>
                        </table>

                        <!-- Botones -->
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Insertar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Sucursales.php';">Reiniciar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para insertar una sucursal - [Fin] -->
            <?php
        }
        else{
            ?>
            <!-- Formulario para editar una sucursal - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Editar Sucursal </div>
                <div id="contenidoFormulario">
                    <form action="Update_s.php" method="post">

                        <table>
                            <!-- Número de identificación -->
                            <tr>
                            <td><label for="numeroRegistro"> Numero de Registro: </label></td>
                            <td class="contenedorCampo"><input type="number" readonly class="campo" name="numeroRegistro" id="numeroRegistro" value='<?=$_GET["numeroRegistro"];?>'></input></td>
                            </tr>

                            <!-- Nombre -->
                            <tr>
                            <td><label for="nombre"> Nombre: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="nombre" id="nombre" value='<?=$_GET["nombre"];?>'></td>
                            </tr>

                            <!-- Ciudad -->
                            <tr>
                            <td><label for="ciudad"> Ciudad: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="ciudad" id="ciudad" value='<?=$_GET["ciudad"];?>'></td>
                            </tr>

                            <!-- Dirección -->
                            <tr>
                            <td><label for="direccion"> Dirección: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="direccion" id="direccion" value='<?=$_GET["direccion"];?>'></td>
                            </tr>

                            <!-- horario -->
                            <tr>
                            <td><label for="horario"> horario: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="horario" id="horario" value='<?=$_GET["horario"];?>'></td>
                            </tr>
                        </table>

                        <!-- Botones -->
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Guardar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Sucursales.php';">Descartar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para editar una sucursal - [Fin] -->
            <?php
        }
        ?>
        <!-- Tabla de sucursales - [Inicio] -->
        <div id="divTabla">
            <div id="tituloTabla"> Sucursales Registradas </div>
            <table id="tabla">
                <thead id="encabezadoTabla">
                    <tr>
                        <th> Numero de Registro </th>
                        <th> Nombre </th>
                        <th> Ciudad </th>
                        <th> Dirección </th>
                        <th> Horario </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require('Select_s.php');
                        if ($result){
                            foreach ($result as $fila){
                    ?>
                    <tr>
                        <td><?=$fila['numeroRegistro'];?></td>
                        <td><?=$fila['nombre'];?></td>
                        <td><?=$fila['ciudad'];?></td>
                        <td><?=$fila['direccion'];?></td>
                        <td><?=$fila['horario'];?></td>
                        <td>
                            <div><form id="formEditar" action="Sucursales.php" method="GET">
                                <input type="text" name="numeroRegistro" value='<?=$fila['numeroRegistro'];?>' hidden>
                                <input type="text" name="nombre" value='<?=$fila['nombre'];?>' hidden>
                                <input type="text" name="ciudad" value='<?=$fila['ciudad'];?>' hidden>
                                <input type="text" name="direccion" value='<?=$fila['direccion'];?>' hidden>
                                <input type="text" name="horario" value='<?=$fila['horario'];?>' hidden>
                                <button class="boton" id="botonAceptarTabla" title="Editar" type="submit"> Editar </button>
                            </form>
                            <form id="formEliminar" action="Delete_s.php" method="POST">
                                <input type="text" name="numeroRegistro" value='<?=$fila['numeroRegistro'];?>' hidden>
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
        <!-- Tabla de sucursales - [Fin] -->
    </div>
</div>
</body>
</html>