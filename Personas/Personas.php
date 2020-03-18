<!DOCTYPE html>
<html lang="es">
<head>
    <!--Configuraciones básicas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie = edge">

    <!-- Creando un link con las hojas de estilos -->
    <link rel="stylesheet" type="text/css" href="../Estilos.css">
    <link rel="stylesheet" type="text/css" href="./Estilos_p.css">

    <!--Título de la pestaña-->
    <title> Casa de Cambios UnalMed - Personas </title>
</head>
<body>
    <!-- Título de la página -->
    <header> <h1> Casa de Cambios UnalMed </h1></header>

    <!-- Barra de navegación -->
    <div>
        <table id="barraNavegacion">
            <td class="elementoNavegacion">
                <a href="../Index.html"> Inicio </a>
            </td>
            <td class="elementoNavegacion">
                <a href="../Empresas/Empresas.php"> Empresas </a>
            </td>
            <td class="elementoNavegacion">
                <a href="../Empleados/Empleados.php"> Empleados </a>
            </td>
            <td class="elementoNavegacion">
                <a href="../Transacciones/TransaccionesMain.php"> Transacciones </a>
            </td>
            <td class="elementoNavegacion" >
                <a href="../Sucursales/Sucursales.php"> Sucursales </a>
            </td>
            <td class="elementoNavegacion">
                <a href="../Transferencias/Transferencias.php"> Transferencias </a>
            </td>
            <td class="elementoNavegacion">
                <a href="../Divisas/Divisas.php"> Divisas </a>
            </td>
            <td class="elementoNavegacion">
                <a href="../Cajas/Cajas.php"> Cajas </a>
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

        if (!isset($_GET["numeroId"])) {
        ?>
            <!-- Formulario para insertar una persona - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Insertar Persona </div>
                <div id="contenidoFormulario">
                    <form action="Insert_p.php" method="post">

                        <table>
                            <!-- Tipo de identificación -->
                            <tr>
                            <td><label for="tipoDoc"> Tipo de documento: </label></td>
                            <td class="contenedorCampo"><select class="campo" name="tipoDoc" id="tipoDoc">
                                <option value="CC"> Cédula de ciudadanía (CC) </option>
                                <option value="CE"> Cédula de extrangería (CE) </option>
                                <option value="TI"> Tarjeta de identidad (TI) </option>
                                <option value="PB"> Pasaporte (PB) </option>
                                <option value="NIT"> Número de identificación tributaria (NIT) </option>
                                <option value="DNI/Otros"> Documento nacional de identidad (DNI/Otros) </option>
                            </select></td>
                            </tr>

                            <!-- Número de identificación -->
                            <tr>
                            <td><label for="numeroId"> Número de identificación: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" name="numeroId" id="numeroId"></td>
                            </tr>

                            <!-- Nombre -->
                            <tr>
                            <td><label for="nombreCompleto"> Nombre completo: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="nombreCompleto" id="nombreCompleto"></td>
                            </tr>

                            <!-- Fecha de nacimiento -->
                            <tr>
                            <td><label for="fechaNac"> Fecha de nacimiento: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="date" name="fechaNac" id="fechaNac"></td>
                            </tr>

                            <!-- Ciudad de nacimiento -->
                            <tr>
                            <td><label for="ciudadNac"> Ciudad de nacimiento: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="ciudadNac" id="ciudadNac"></td>
                            </tr>

                            <!-- Dirección de residencia -->
                            <tr>
                            <td><label for="direcRes"> Dirección de residencia: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="direcRes" id="direcRes"></td>
                            </tr>

                            <!-- Ciudad de residencia -->
                            <tr>
                            <td><label for="ciudadRes"> Ciudad de residencia: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="ciudadRes" id="ciudadRes"></td>
                            </tr>

                            <!-- Nacionalidad -->
                            <tr>
                            <td><label for="nacionalidad"> Nacionalidad: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" name="nacionalidad" id="nacionalidad"></td>
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
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Personas.php';">Reiniciar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para insertar una persona - [Fin] -->
        <?php
        }
        else{
        ?>
            <!-- Formulario para editar una persona - [Inicio] -->
            <div id="formulario">
                <div id="tituloFormulario"> Editar Persona </div>
                <div id="contenidoFormulario">
                    <form action="Update_p.php" method="post">

                        <table>
                            <!-- Tipo de identificación -->
                            <tr>
                            <td><label for="tipoDocE"> Tipo de documento: </label></td>
                            <td class="contenedorCampo"> <input class="campo" type="text" readonly id="tipoDocE" name="tipoDoc" value='<?=$_GET["tipoDoc"];?>'> </td>
                            </tr>

                            <!-- Número de identificación -->
                            <tr>
                            <td><label for="numeroId"> Número de identificación: </label></td>
                            <td class="contenedorCampo"> <input class="campo" type="text" readonly id="numeroIdE" name="numeroId" value='<?=$_GET["numeroId"];?>'></td>
                            </tr>

                            <!-- Nombre -->
                            <tr>
                            <td><label for="nombreCompletoE"> Nombre completo: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" id="nombreCompletoE" name="nombreCompleto" value='<?=$_GET["nombreCompleto"];?>'></td>
                            </tr>

                            <!-- Fecha de nacimiento -->
                            <tr>
                            <td><label for="fechaNacE"> Fecha de nacimiento: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="date" id="fechaNacE" name="fechaNac" value='<?=$_GET["fechaNac"];?>'></td>
                            </tr>

                            <!-- Ciudad de nacimiento -->
                            <tr>
                            <td><label for="ciudadNacE"> Ciudad de nacimiento: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" id="ciudadNacE" name="ciudadNac" value='<?=$_GET["ciudadNac"];?>'></td>
                            </tr>

                            <!-- Dirección de residencia -->
                            <tr>
                            <td><label for="direcResE"> Dirección de residencia: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" id="direcResE" name="direcRes" value='<?=$_GET["direcRes"];?>'></td>
                            </tr>

                            <!-- Ciudad de residencia -->
                            <tr>
                            <td><label for="ciudadResE"> Ciudad de residencia: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" id="ciudadResE" name="ciudadRes" value='<?=$_GET["ciudadRes"];?>'></td>
                            </tr>

                            <!-- Nacionalidad -->
                            <tr>
                            <td><label for="nacionalidadE"> Nacionalidad: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="text" id="nacionalidadE" name="nacionalidad" value='<?=$_GET["nacionalidad"];?>'></td>
                            </tr>

                            <!-- Teléfono -->
                            <tr>
                            <td><label for="telefonoE"> Teléfono: </label></td>
                            <td class="contenedorCampo"><input class="campo" type="number" min="0" id="telefonoE" name="telefono" value='<?=$_GET["telefono"];?>'></td>
                            </tr>
                        </table>

                        <!-- Botones -->
                        <div class="botones">
                            <input class="boton" type="submit" id="botonAceptar" value="Guardar">
                            <button class="boton" type="button" id="botonCancelar" onclick="window.location.href = 'Personas.php';">Descartar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulario para editar una persona - [Fin] -->
        <?php
            }
        ?>
        <!-- Tabla de personas - [Inicio] -->
        <div id="divTabla">
            <div id="tituloTabla"> Personas Registradas </div>
            <table id="tabla">
                <thead id="encabezadoTabla">
                    <tr>
                        <th> Tipo de documento </th>
                        <th> Número de documento </th>
                        <th> Nombre </th>
                        <th> Fecha de nacimiento </th>
                        <th> Ciudad de nacimiento </th>
                        <th> Dirección de residencia </th>
                        <th> Ciudad de residencia </th>
                        <th> Nacionalidad </th>
                        <th> Teléfono </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require('Select_p.php');
                        if ($result){
                            foreach ($result as $fila){
                    ?>
                    <tr>
                        <td><?=$fila['tipoDoc'];?></td>
                        <td><?=$fila['numeroId'];?></td>
                        <td><?=$fila['nombreCompleto'];?></td>
                        <td><?=$fila['fechaNac'];?></td>
                        <td><?=$fila['ciudadNac'];?></td>
                        <td><?=$fila['direcRes'];?></td>
                        <td><?=$fila['ciudadRes'];?></td>
                        <td><?=$fila['nacionalidad'];?></td>
                        <td><?=$fila['telefono'];?></td>
                        <td>
                            <div><form id="formEditar" action="Personas.php" method="GET">
                                <input type="text" name="tipoDoc" value='<?=$fila['tipoDoc'];?>' hidden>
                                <input type="text" name="numeroId" value='<?=$fila['numeroId'];?>' hidden>
                                <input type="text" name="nombreCompleto" value='<?=$fila['nombreCompleto'];?>' hidden>
                                <input type="text" name="fechaNac" value='<?=$fila['fechaNac'];?>' hidden>
                                <input type="text" name="ciudadNac" value='<?=$fila['ciudadNac'];?>' hidden>
                                <input type="text" name="direcRes" value='<?=$fila['direcRes'];?>' hidden>
                                <input type="text" name="ciudadRes" value='<?=$fila['ciudadRes'];?>' hidden>
                                <input type="text" name="nacionalidad" value='<?=$fila['nacionalidad'];?>' hidden>
                                <input type="text" name="telefono" value='<?=$fila['telefono'];?>' hidden>
                                <button class="boton" id="botonAceptarTabla" title="Editar" type="submit"> Editar </button>
                            </form>
                            <form id="formEliminar" action="Delete_p.php" method="POST">
                                <input type="text" name="tipoDoc" value='<?=$fila['tipoDoc'];?>' hidden>
                                <input type="text" name="numeroId" value='<?=$fila['numeroId'];?>' hidden>
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
        <!-- Tabla de personas - [Fin] -->
    </div>
</body>
</html>