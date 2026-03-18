<?php
// config.php

// 1. Establecer la zona horaria de PHP a UTC-3 (Argentina/Chilecito)
// Usamos una zona horaria que respeta UTC-3 para PHP
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Datos de conexión (AJUSTAR SEGÚN TU ENTORNO)
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Usar un usuario seguro en producción
define('DB_PASSWORD', '');     // Usar una contraseña segura en producción
define('DB_NAME', 'spartan_race_db');

// Intentar conexión a la base de datos MySQL
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar la conexión
if ($conn->connect_error) {
    die("❌ Error de conexión a la base de datos: " . $conn->connect_error);
}

// 2. Establecer el juego de caracteres a utf8mb4
$conn->set_charset("utf8mb4");

// 3. Establecer la zona horaria de la conexión MySQL a UTC-3
if (!$conn->query("SET time_zone = '-03:00'")) {
    // Esto mostrará un error en el log si no se pudo establecer la zona horaria (útil para debugging)
    error_log("Error al establecer la zona horaria a -03:00: " . $conn->error);
}

// Opcional: Función para cerrar la conexión (llamar al final del script principal)
// function close_db_connection($conn) {
//     $conn->close();
// }
?>