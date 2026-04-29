<?php
include 'db/conexion.php';

// Iniciamos sesión para verificar permisos si es necesario
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_nombre'])) {
    header("Location: login.php");
    exit();
}

$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $pass_plana = $_POST['contrasena'];
    
    // Capturamos el rol del select. Si no viene, por defecto es 2 (Alumno)
    $id_rol = isset($_POST['id_rol']) ? $_POST['id_rol'] : 2;

    $password_con_hash = password_hash($pass_plana, PASSWORD_DEFAULT);

    try {
        // La consulta tiene 5 columnas y 5 valores (?) - Perfectamente emparejados ahora
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
        *, *::before, *::after { box-sizing: border-box; }
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
            font-family: 'Inter', sans-serif;
        }

        .formulario {
            background-color: var(--azul-marino-medio);
            width: 500px; 
            max-width: 90%;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px var(--sombra);
            text-align: center;
            animation: entradaContenedor 0.6s ease-out both;
        }

        .form-encabezado h2 {
            color: var(--azul-marino-oscuro);
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .entrada { margin-bottom: 15px; text-align: left; }
        .entrada label {
            display: block;
            color: var(--azul-marino-oscuro);
            margin-bottom: 5px;
            font-weight: bold;
        }

        .entrada input, .entrada select {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border: 2px solid transparent;
            border-radius: 8px;
            outline: none;
            background-color: var(--blanco);
        }

        .entrada input:focus, .entrada select:focus {
            border-color: var(--azul-marino-oscuro);
        }

        .boton {
            width: 100%;
            padding: 15px;
            background-color: var(--azul-marino-oscuro);
            color: var(--azul-claro);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: bold;
            margin-top: 10px;
            transition: 0.3s;
        }

        .boton:hover { background-color: #1a2036; transform: translateY(-2px); }

        .alerta { padding: 10px; border-radius: 8px; margin-bottom: 15px; }
        .exito { background-color: #d4edda; color: #155724; }
        .error { background-color: #f8d7da; color: #721c24; }

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
                <input type="text" name="nombre" placeholder="Tu nombre" required>
            </div>
            <div class="entrada">
                <label>Apellido</label>
                <input type="text" name="apellido" placeholder="Tu apellido" required>
            </div>
            <div class="entrada">
                <label>Correo Electrónico</label>
                <input type="email" name="email" placeholder="correo@ejemplo.com" required>
            </div>
            
            <div class="entrada">
                <label>Tipo de Usuario</label>
                <select name="id_rol" required>
                    <option value="" disabled selected>Selecciona un rol</option>
                    <option value="1">Administrador</option>
                    <option value="2">Alumno</option>
                    <option value="3">Docente</option>
                </select>
            </div>

            <div class="entrada">
                <label>Contraseña</label>
                <input type="password" name="contrasena" placeholder="Mínimo 8 caracteres" required>
            </div>
            
            <button type="submit" class="boton">Crear cuenta</button>
        </form>

        <a href="index.php" style="display:block; margin-top:15px; color:var(--azul-marino-oscuro); text-decoration:none; font-size:0.9rem;">← Volver al Inicio</a>
    </div>

</body>
</html>