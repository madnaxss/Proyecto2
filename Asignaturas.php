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
                    <li><a href="#">Actividades</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Sección de Actividades -->
    <section id="Asignaturas">
        <?php
            include 'connexio.php';

            // Verificar si se ha proporcionado el parámetro id_proyecto en la URL
            if (isset($_GET['id_proyecto'])) {
                $idProyecto = mysqli_real_escape_string($connexio, $_GET['id_proyecto']);

                // Consulta para obtener el nombre del proyecto
                $sqlNombreProyecto = "SELECT Nombre FROM Proyecto WHERE id_proyecto = $idProyecto";
                $resultNombreProyecto = mysqli_query($connexio, $sqlNombreProyecto);

                if (!$resultNombreProyecto) {
                    die("Error en la consulta del nombre del proyecto: " . mysqli_error($connexio));
                }

                $rowNombreProyecto = mysqli_fetch_assoc($resultNombreProyecto);
                $nombreProyecto = $rowNombreProyecto['Nombre'];

                // Mostrar el nombre del proyecto
                echo '<div class="NombreAsignaturas">';
                echo '<p class="Asignatura">' . $nombreProyecto . '</p>';
                echo '</div>';

                // Consulta para obtener actividades y sus ítems
                $sqlActividades = "SELECT a.id_actividad, a.Nom as NombreActividad
                    FROM Actividad a
                    WHERE a.id_proyecto = $idProyecto";

                $resultActividades = mysqli_query($connexio, $sqlActividades);

                if (!$resultActividades) {
                    die("Error en la consulta de actividades: " . mysqli_error($connexio));
                }

                // Contenedor para las actividades
                echo '<div class="ContenedorAsignatura">';

                // Mostrar nombres de actividades
                while ($rowActividad = mysqli_fetch_assoc($resultActividades)) {
                    echo '<div class="NombreAsignatura">';
                    echo '<p class="Asignatura">' . $rowActividad['NombreActividad'] . '</p>';

                    // Consulta para obtener ítems asociados a la actividad actual
                    $idActividad = $rowActividad['id_actividad'];
                    $sqlItems = "SELECT i.Nombre as NombreItem, i.Porcentaje, i.Nota
                        FROM Item i
                        WHERE i.id_actividad = $idActividad";

                    $resultItems = mysqli_query($connexio, $sqlItems);

                    if (!$resultItems) {
                        die("Error en la consulta de ítems: " . mysqli_error($connexio));
                    }

                    // Mostrar ítems
                    while ($rowItem = mysqli_fetch_assoc($resultItems)) {
                        echo '<div class="item">';
                        echo '<p class="itemName">' . $rowItem['NombreItem'] . '</p>';
                        echo '<div class="porcentaje">' . $rowItem['Porcentaje'] . '%</div>';
                        echo '<div class="nota">' . $rowItem['Nota'] . '</div>';
                        echo '</div>';
                    }

                    echo '</div>'; // Cerrar div de actividad
                }

                echo '</div>'; // Cerrar div de ContenedorAsignatura

                // Liberar resultados
                mysqli_free_result($resultActividades);
                mysqli_free_result($resultNombreProyecto);
                mysqli_close($connexio);
            } else {
                // Si no se proporcionó el parámetro id_proyecto, puedes mostrar un mensaje o redirigir a otra página
                echo "No se ha proporcionado un proyecto válido.";
            }
        ?>
    </section>
    
</body>
</html>
