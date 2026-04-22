<?php
include 'db/conexion.php';

$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $pass_plana = $_POST['contrasena'];
    $id_rol = $_POST['id_rol']; 

    $password_con_hash = password_hash($pass_plana, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuario (nombre, apellido, email, contrasena, id_rol) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([$nombre, $apellido, $email, $password_con_hash, $id_rol])) {
            $mensaje = "<div class='alerta exito'>Usuario registrado exitosamente.</div>";
        }
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { 
            $mensaje = "<div class='alerta error'>El correo ya está registrado.</div>";
        } else {
            $mensaje = "<div class='alerta error'>Error: " . $e->getMessage() . "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Oicen</title>
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        :root {
            --azul-marino-oscuro: #232b48;
            --azul-marino-medio: #c2cdd5;
            --azul-claro: #f6f3ea;
            --azul-marino: #3f496a;
            --blanco: #ffffff;
            --sombra: rgba(0, 0, 0, 0.2);
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-image: url('img/logo3.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: var(--azul-marino);
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .formulario {
            background-color: var(--azul-marino-medio);
            /* Tamaño expandido */
            width: 500px; 
            max-width: 90%;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px var(--sombra);
            text-align: center;
            animation: entradaContenedor 0.6s ease-out both;
        }

        .form-encabezado h2 {
            color: var(--azul-marino-oscuro);
            font-size: 2rem;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .entrada {
            margin-bottom: 20px;
            text-align: left;
        }

        .entrada label {
            display: block;
            color: var(--azul-marino-oscuro);
            margin-bottom: 8px;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .entrada input {
            width: 100%;
            padding: 15px; /* Más espacio interno */
            font-size: 1rem;
            border: 2px solid transparent;
            border-radius: 8px;
            outline: none;
            transition: all 0.3s ease;
            background-color: var(--blanco);
        }

        .entrada input:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .entrada input:focus {
            border-color: var(--azul-marino-oscuro);
            box-shadow: 0 0 15px rgba(35, 43, 72, 0.2);
        }

        .boton {
            width: 100%;
            padding: 18px;
            background-color: var(--azul-marino-oscuro);
            color: var(--azul-claro);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 20px;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .boton:hover {
            background-color: #1a2036;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .link-login {
            display: inline-block;
            margin-top: 25px;
            color: var(--azul-marino-oscuro);
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
        }

        .link-login:hover {
            text-decoration: underline;
            color: var(--azul-marino);
        }

        /* Mensajes de alerta */
        .alerta {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }
        .exito { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

        @keyframes entradaContenedor {
            0% { opacity: 0; transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body>

    <div class="formulario">
        <div class="form-encabezado">
            <h2>Registro Oicen</h2>
            <?php echo $mensaje; ?>
        </div>

        <form method="POST" action="">
            <div class="entrada">
                <label>Nombre</label>
                <input type="text" name="nombre" placeholder="Escribe tu nombre" required>
            </div>
            <div class="entrada">
                <label>Apellido</label>
                <input type="text" name="apellido" placeholder="Escribe tu apellido" required>
            </div>
            <div class="entrada">
                <label>Correo Electrónico</label>
                <input type="email" name="email" placeholder="correo@ejemplo.com" required>
            </div>
            <div class="entrada">
                <label>Contraseña</label>
                <input type="password" name="contrasena" placeholder="Mínimo 8 caracteres" required>
            </div>
            
            <input type="hidden" name="id_rol" value="3">

            <button type="submit" class="boton">Crear mi cuenta</button>
        </form>

        <a href="login.php" class="link-login">¿Ya tienes una cuenta? Inicia sesión aquí</a>
    </div>

</body>
</html>