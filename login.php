<?php
// Configuración de conexión
$host = "localhost";
$db   = "oicen-db"; 
$user = "root";               
$pass = "";                   
$charset = "utf8mb4";

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

session_start();

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contrasena_plana = $_POST['contrasena']; // La que viene del formulario

    // Sentencia Preparada
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        // --- CAMBIO CLAVE AQUÍ ---
        // Verificamos si la contraseña plana coincide con el HASH de la base de datos
        if (password_verify($contrasena_plana, $usuario['contrasena'])) {
            $_SESSION['usuario_nombre'] = $usuario['nombre']; 
            header("Location: index.php");
            exit(); 
        } else {
            $mensaje = "La contraseña es incorrecta.";
        }
    } else {
        $mensaje = "Las credenciales son incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login.css">
    <title>Login - Oicen</title>
</head>
<body>
    <div class="contenedor_1">
        <img class="logo-oicen" src="img/logo-oicen.png" alt="Logo Oicen">
        <h3>Bienvenido</h3>
    </div>
    
    <div class="formulario">
        <div class="form-encabezado">
            <h2>Iniciar Sesión</h2>
            <?php if($mensaje): ?>
                <p style="color: #ff4d4d; font-weight: bold;"><?php echo $mensaje; ?></p>
            <?php endif; ?>
        </div>

        <form method="POST" action="">
            <div class="entrada">
                <label for="email">Usuario</label>
                <input type="email" name="email" id="email" placeholder="ejemplo@gmail.com" required>
            </div>
          
            <div class="entrada">
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" placeholder="••••••••" required>
            </div>

            <button type="submit" class="boton">Acceder</button>
        </form>
    </div>
</body>
</html>