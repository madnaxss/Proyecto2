<!DOCTYPE html>
<html>
<head>
    <title>Web</title>
    <link rel="stylesheet" type="text/css" href="Web.css">
    <script src="Proyecto2.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <div id="usuario">
                <div id="fotoperfil">

                </div>
                <p id="NombreUsuario">
                    Nombre usuario
                </p>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Acerca de</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id='crearProyecto'>
        <div class='formCrear'>
            <form method="post">
                <input type="text" name="NombreProyecto" placeholder='Nombre del Proyecto'>
                <button type="submit" name="submit" class='btGuardar'>GUARDAR</button>
            </form>
        </div>
    </section>

</body>
<?php
include 'connexio.php';

// Verificar si se recibió el formulario y el botón de envío fue presionado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Obtener el nombre del proyecto desde el formulario
    $nombreProyecto = mysqli_real_escape_string($connexio, $_POST['NombreProyecto']);

    $sqlInsertProyecto = "INSERT INTO proyecto (Nombre) VALUES ('$nombreProyecto')";

    if (mysqli_query($connexio, $sqlInsertProyecto)) {
        echo '<p class="exito">Nuevo proyecto insertado correctamente.</p>';
        echo '<button onclick="Proyectos()">Volver</button>';
    } else {
        echo "Error al insertar el nuevo proyecto: " . mysqli_error($connexio);
    }
    //Commit
}

// Cerrar la conexión
mysqli_close($connexio);
?>
