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
        <img class="logo-oicen" src="templates/logo-oicen.png" alt="Logo Oicen">
        <h3>Bienvenido!!</h3>
    </div>
    
      <div class="formulario">
                <div class="form-encabezado">
                    <h2>Iniciar Sesión</h2>
                    <p>Ingresa tus credenciales.</p>
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
                    <button type="submit" class="boton">Entrar al Sistema</button>
                    </a>
                </form>
        </div>
</body>
</html>