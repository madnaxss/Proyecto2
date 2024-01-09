<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web</title>
    <link rel="stylesheet" href="Web.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="usuario">
                <div id="fotoperfil"></div>
                <p id="NombreUsuario">Nombre usuario</p>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Proyectos</a></li>
                    <li><a href="#">Trabajos pendientes</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Sección de Proyectos -->
    <section id="proyectos">
        <?php
        include 'connexio.php';

        // Verificar si la conexión a la base de datos se estableció correctamente
        if (!$connexio) {
            die("Error en la conexión a la base de datos: " . mysqli_connect_error());
        }

        // Consulta para obtener información de proyectos y actividades
        $sqlProyectos = "SELECT p.id_proyecto, p.Nombre AS NombreProyecto, a.id_actividad, a.Nom AS NombreActividad
                         FROM Proyecto p
                         LEFT JOIN Actividad a ON p.id_proyecto = a.id_proyecto";
        $resultProyectos = mysqli_query($connexio, $sqlProyectos);

        if (!$resultProyectos) {
            die("Error en la consulta de proyectos: " . mysqli_error($connexio));
        }

        // Inicializar variables para el control de proyectos
        $proyectoActual = null;
        $actividadesProyecto = array();

        // Mostrar información de proyectos y actividades
        while ($rowProyecto = mysqli_fetch_assoc($resultProyectos)) {
            if ($rowProyecto['id_proyecto'] != $proyectoActual) {
                // Nuevo proyecto, mostrar información del proyecto
                if ($proyectoActual !== null) {
                    // Mostrar las actividades del proyecto anterior
                    echo '<div class="actividades">';
                    foreach ($actividadesProyecto as $actividad) {
                        echo '<p>' . $actividad['NombreActividad'] . '</p>';
                        // Puedes seguir añadiendo más detalles de la actividad según tus necesidades
                    }
                    echo '</div>';
                }

                // Iniciar nuevo proyecto
                $proyectoActual = $rowProyecto['id_proyecto'];
                $actividadesProyecto = array();
                echo '<div class="proyecto">';
                // Agregar un enlace con el ID del proyecto como parámetro en la URL
                echo '<a href="Asignaturas.php?id_proyecto=' . $proyectoActual . '">';
                echo '<div class="NombreProyecto">';
                echo '<p>' . $rowProyecto['NombreProyecto'] . '</p>';
                echo '</div>';
                echo '</a>';
            }

            // Agregar actividad al array
            $actividadesProyecto[] = array('NombreActividad' => $rowProyecto['NombreActividad']);
        }

        // Mostrar las actividades del último proyecto fuera del bucle
        if ($proyectoActual !== null) {
            echo '<div class="actividades">';
            foreach ($actividadesProyecto as $actividad) {
                echo '<p>' . $actividad['NombreActividad'] . '</p>';
                // Puedes seguir añadiendo más detalles de la actividad según tus necesidades
            }
            echo '</div>';
        }

        echo '</div>'; // Cerrar el último div de proyecto

        // Liberar el resultado
        mysqli_free_result($resultProyectos);

        // Cerrar la conexión
        mysqli_close($connexio);
        ?>
    </section>
</body>
</html>

