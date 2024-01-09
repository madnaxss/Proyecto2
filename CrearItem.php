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

    <section id="PerfilUsuario">
        <div class="contenedor">
            <div id="DatosUsuario">
                <h2>CREAR ITEM</h2>
                <input type="text" class="dades" name="item" placeholder="Nombre Item" required>
                <input type="text" class="dades" name="nota" placeholder="% de la nota" required>
                <input type="file" name="fichero" required>
                <button id="GuardarDades">GUARDAR</button>
            </div>
        </div>
    </section>
</body>