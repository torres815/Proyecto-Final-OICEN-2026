<?php
include 'db/conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST ['email'];
    $contrasena = $_POST ['contrasena'];

    $consulta = "SELECT * FROM usuario WHERE email = 'email'";
    $resultado = mysqli_query ($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);

    if ($password === $fila['contrasena']) {
            $_SESSION['usuario_nombre'] = $fila['nombre']; 
            header("Location: index.php"); 
        } else {
            echo "La contraseña es incorrecta.";
        }
    } else {
        echo "El usuario no existe.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login.css">
    <title>Login-Oicen</title>
</head>
<body>
    <div class="contenedor_1">
        <img class="logo-oicen" src="img/logo-oicen.png" alt="Logo Oicen">
        <h3>Bienvenido</h3>
    </div>
    
      <div class="formulario">
                <div class="form-encabezado">
                    <h2>Iniciar Sesión</h2>
                </div>
                <form>
                    <div class="entrada">
                        <label for="username">Usuario </label>
                        <input type="text" id="username" placeholder="ejemplo@gmail.com" required>
                    </div>
                  
                    <div class="entrada">
                        <label for="password">Contraseña</label>
                        <input  type="password" id="password" placeholder="••••••••" required>
                    </div>
                    <a  href="index.php">
                    <button type="submit" class="boton">Acceder</button>
                    </a>
                </form>
        </div>
</body>
</html>