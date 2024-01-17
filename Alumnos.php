<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <link rel="stylesheet" href="Web.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        #alumnos {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* Añadido para centrar las cajas */
        }

        .usuario-box {
            border: 4px dashed #FFF500;
            padding: 10px;
            width: 200px;
            height: 290px;
            text-align: center;
            margin: 10px; /* Añadido para dar espacio entre las cajas */
            font-family: 'Press Start 2P';
            font-size: 0.7em;
            color: #ccc;
            background-color: #0A0A3D;
        }

        .usuario-boxx {
            border: 4px dashed #FFF500;
            padding: 10px;
            width: 200px;
            height: 290px;
            text-align: center;
            margin: 10px; /* Añadido para dar espacio entre las cajas */
            font-family: 'Press Start 2P';
            font-size: 0.7em;
            display:flex;
            align-items: center;
            justify-content: center;
            background-color: #0A0A3D;
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
        <div class="usuario-boxx">
            <a ><i class='bx bx-add-to-queue añadir-bx' onclick='anadirActividad()'></i></a>
        </div>
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
<script src="Proyecto2.js"></script>
</html>
