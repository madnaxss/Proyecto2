<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <script src="Proyecto2.js"></script>
</head>

<body>
    <div class="log">
        <center>
            <h2>INICIAR SESIÓN</h2>
        </center>
        <form method="post" action="">
            <center><label for="usuario">Usuario:</label><br></center>
            <center><input type="text" id="usuario" name="usuario" placeholder="Usuario"><br></center>

            <center><label for="passwd">Contraseña:</label><br></center>
            <center><input type="password" id="passwd" name="contrasena" placeholder="Contraseña"><br></center>

            <center><input type="submit" name="acceder" value="Acceder" class="bt"></center>
        </form>
    </div>

    <?php
    if (isset($_POST['acceder'])) {
        $conn = mysqli_connect("localhost", "root", "", "admin");
    
        if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }
    
        $usuario = mysqli_real_escape_string($conn, $_POST["usuario"]);
        $passwd = mysqli_real_escape_string($conn, $_POST["contrasena"]);
    
        $sql = "SELECT * FROM persona WHERE usuario='$usuario' AND passwd='$passwd'";
        $resultat = mysqli_query($conn, $sql);
    
        if ($resultat === false) {
            die("Error en la consulta: " . mysqli_error($conn));
        }
        else
        {
            $fila = mysqli_fetch_assoc($resultat);
            $Profesor = $fila['profesor'];
        }
    
        if (mysqli_num_rows($resultat) > 0) {
            if($Profesor == 1)
            {
                echo "Se ha accedido correctamente como profesor";
                echo "<script>Profesor(); </script>";
            }else
            {
                echo "Se ha accedido como alumno";
                echo "<script>Alumno(); </script>";
            }
        } else {
            echo "Credenciales incorrectas";
        }
    
        mysqli_close($conn);
    }

    
?>

</body>
</html>

