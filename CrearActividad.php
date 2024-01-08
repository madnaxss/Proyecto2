<!DOCTYPE html>
<html>
<head>
    <title>Web</title>
    <link rel="stylesheet" type="text/css" href="Web.css">
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

    <section id='crearActividad'>
        <div class='formCrear'>
            <form>
                <input type="text" id='NombreActividad' placeholder='Nombre Actividad'>
                <input type="text" id='crearItem' placeholder='Item'>
                <input type="text" id='crearPorcentaje' placeholder='%'>
                <button class='btGuardar'><a href="AsignaturasProfessor.php">GUARDAR</a></button>
            </form>
        </div>
    </section>
</body>