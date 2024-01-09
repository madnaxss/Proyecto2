<?php
    $servidor = 'localhost';
    $usuari = 'root';
    $clau = '';
    $bbdd = 'Proyecto2';
    $connexio = mysqli_connect($servidor, $usuari, $clau, $bbdd);
    if ($connexio->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    } else {
        // Mostrar mensaje de conexión exitosa en la consola del navegador
        echo '<script>console.log("Conexión exitosa a la base de datos");</script>';
    }
?>