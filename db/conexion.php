<?php
// db/conexion.php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "oicen-db"; // Asegúrate de que este sea el nombre de tu base de datos

$conexion = new mysqli($host, $user, $pass, $db);

// Verificar si hay error
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Establecer caracteres a utf8 para evitar errores de acentos
$conexion->set_charset("utf8");
?>