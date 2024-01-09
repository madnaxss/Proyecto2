<!DOCTYPE html>
<html>
<head>
    <title>Web</title>
    <link rel="stylesheet" type="text/css" href="Web.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                    <li><a href="#">Proyectos</a></li>
                    <li><a href="#">Actividades</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="Asignaturas">
        <div class="NombreAsignatura">
            <p class="Asignatura">NOMBRE ASIGNATURA</p>
        </div>
        <div id="actividades">
            <div class="actividad">
                <p class="TituloTrabajo">NOMBRE TRABAJO</p>
                <div class="item">
                    <div class="IconItem">

                    </div>
                    <p class="itemName">item 2</p>
                    <div class="porcentatje">20%</div>
                    <div class="nota">8</div>
                    <i class='bx bx-edit'></i>
                    <i class='bx bx-trash' ></i>
                </div>
                <div class="item">
                    <div class="IconItem">

                    </div>
                    <p class="itemName">item 2</p>
                    <div class="porcentatje">20%</div>
                    <div class="nota">8</div>
                    <i class='bx bx-edit'></i>
                    <i class='bx bx-trash' ></i>
                </div>
                <div class="item">
                    <div class="IconItem">

                    </div>
                    <p class="itemName">item 2</p>
                    <div class="porcentatje">20%</div>
                    <div class="nota">8</div>
                    <i class='bx bx-edit'></i>
                    <i class='bx bx-trash' ></i>
                </div>
                <i class='bx bx-add-to-queue suma-bx' onclick='canviarItem()'></i>
                <button class='btGuardar'>GUARDAR</button>
            </div>
            <div class="actividadAfegir">
            <a ><i class='bx bx-add-to-queue añadir-bx' onclick='canviarActividad()'></i></a>
            </div>
        </div>
        </div>
    </section>
    <script src="Proyecto2.js"></script>
</body>
</html>