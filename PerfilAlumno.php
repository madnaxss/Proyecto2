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
                    <li><a href="#">Inicioo</a></li>
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
                <form method="post" enctype="multipart/form-data">
                    <div class="bloc1">
                        <input type="text" class="dades" name="nombre" placeholder="Nombre" required>
                        <input type="text" class="dades" name="apellido" placeholder="Apellido" required>
                        <input type="number" class="dades" name="telefono" placeholder="Telefono" required>
                        <input type="text" class="dades" name="dni" placeholder="DNI" required>
                        <label for="sexo">Sexo:</label>
                        <select id="sexo" name="sexo">
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="bloc2">
                        <input type="text" class="dades" name="correo" placeholder="Correo" required>
                        <input type="date" class="dades" name="fechaNacimiento" placeholder="Fecha Nacimiento" required>
                        <input type="file" name="foto" placeholder="Foto de Perfil" required>
                        <input type="text" class="dades" name="usuario" placeholder="Usuario" required>
                        <input type="password" class="dades" name="passwd" placeholder="Contraseña" required>
                        <button name="guardar" id="GuardarDades">GUARDAR</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "admin");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["guardar"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $dni = $_POST["dni"];
    $sexo = $_POST["sexo"];
    $correo = $_POST["correo"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $usuario = $_POST["usuario"];
    $passwd = $_POST["passwd"];

    $rutaImatge = "./images/" . basename($_FILES["foto"]["name"]);
    $tipusImatge = pathinfo($rutaImatge, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaImatge);

    $sql = "INSERT INTO persona (Nombre, Apellido, Telefono, DNI, Sexo, correo, fecha_nacimiento, usuario, passwd, tipus, ruta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $nombre, $apellido, $telefono, $dni, $sexo, $correo, $fechaNacimiento, $usuario, $passwd, $tipusImatge, $rutaImatge);


    if ($stmt->execute()) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    mysqli_close($conn);
}
?>

