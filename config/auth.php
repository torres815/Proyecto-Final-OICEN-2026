<?php
session_start();

// Si la variable de sesión no existe, redirigir al login inmediatamente
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>