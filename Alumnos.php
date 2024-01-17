<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <link rel="stylesheet" href="Web.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        #alumnos {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* Añadido para centrar las cajas */
        }

        .usuario-box {
            border: 1px solid #ccc;
            padding: 10px;
            width: 200px;
            height: 350px;
            text-align: center;
            margin: 10px; /* Añadido para dar espacio entre las cajas */
        }

        .img {
            max-width: 100%;
            height: auto;
            margin-top: 10px; /* Añadido para separar la imagen del contenido */
        }
    </style>
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
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Acerca de</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="alumnos">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "admin");
            $sql = "SELECT * FROM persona";
            $resultat = mysqli_query($conn, $sql);

            while ($fila = mysqli_fetch_assoc($resultat)) {
                echo '<div class="usuario-box">';
                echo '<p>Nombre: ' . $fila['Nombre'] . '</p>';
                echo '<p>Apellido: ' . $fila['Apellido'] . '</p>';
                echo '<p>Correo: ' . $fila['correo'] . '</p>';
                echo "<br>";

                if (isset($fila['ruta'])) {
                    echo '<img class="img" src="' . $fila['ruta'] . '" alt="Foto de perfil"><br>';
                }

                echo "</div>";
            }
            
            mysqli_close($conn);
        ?>
    </section>
</body>
</html>
