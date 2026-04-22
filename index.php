<?php 
include 'template/cabeza.php';

// Verificamos si la sesión está activa (opcional, pero recomendado)
if (!isset($_SESSION['usuario_nombre'])) {
    // Si no hay sesión, podrías redirigir al login
    // header("Location: login.php");
}
?>

<main class="main-content">

    <div class="hero-container">
        <main class="welcome-text">
            <h1>¡BIENVENIDOS A OICEN!</h1>
            <p style="font-size: 1.2rem; line-height: 1.6;">
                La plataforma líder en entrenamiento para las Olimpíadas Informáticas. 
                Aquí potenciarás tu lógica, dominarás algoritmos y te prepararás para 
                los desafíos de programación más exigentes a nivel nacional.
            </p>
            
            <div style="margin-top: 20px;">
                <a href="logout.php" class="boton-logout" onclick="return confirmarCierre();">
                    Cerrar Sesión
                </a>
            </div>
        </main>

        <div class="right-side">
            <?php 
                // Usamos el nombre real de la sesión si existe
                $nombreEstudiante = isset($_SESSION['usuario_nombre']) ? $_SESSION['usuario_nombre'] : "Invitado"; 
                $progreso = 10; 
                
                $nivel = "Básico";
                if($progreso > 25) $nivel = "Bajo";
                if($progreso >= 50) $nivel = "Medio";
                if($progreso >= 80) $nivel = "Alto";
            ?>
            <div class="user-stats">
                <h3>Hola, <strong><?php echo $nombreEstudiante; ?></strong></h3>
                <p>Tu progreso actual: <strong><?php echo $progreso; ?>%</strong></p>
                <div class="progress-bar-container">
                    <div class="progress-fill" style="width: <?php echo $progreso; ?>%;"></div>
                </div>
                <span>Nivel de competencia: <strong><?php echo $nivel; ?></strong></span>
            </div>

            <div class="terminal">
                <div class="term-bar">
                    <div class="dots">
                        <span class="dot r"></span>
                        <span class="dot y"></span>
                        <span class="dot g"></span>
                    </div>
                    <span class="term-name">campus_virtual.sh</span>
                </div>
                <div class="term-body">
                    <span class="prompt">Alms_<?php echo $nombreEstudiante; ?>@cen:</span><span class="path">~</span>$
                    <span id="typer"></span><span class="blink">|</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-buttons">
        <a href="niveles.php" class="nav-card">
            <h2><?php echo ($progreso > 0) ? "Continuar" : "Comenzar"; ?></h2>
            <p>Accede a tus desafíos y lecciones</p>
        </a>

        <a href="chatbot.php" class="nav-card">
            <h2>Asistente Virtual</h2>
            <p>¿Tienes dudas? Consulta con nuestra IA</p>
        </a>

        <?php $completado = ($progreso >= 100); ?>
        <div class="nav-card <?php echo !$completado ? 'locked' : ''; ?>">
            <h2>Enunciados</h2>
            <p>
                <?php echo $completado ? "Repositorio de programación competitiva" : "🔒 Completa todos los niveles para desbloquear"; ?>
            </p>
        </div>
    </div>

</main>

<script>
    // 1. Función para el botón de cerrar sesión
    function confirmarCierre() {
        return confirm("¿Estás seguro de que quieres cerrar sesión?");
    }

    // 2. Detectar cuando el usuario intenta volver atrás
    // Nota: El navegador bloquea mensajes personalizados, pero mostrará un cuadro de diálogo estándar.
    window.onload = function () {
        if (typeof history.pushState === "function") {
            history.pushState("jibberish", null, null);
            window.onpopstate = function () {
                history.pushState('jibberish', null, null);
                if(confirm("¿Quieres salir y cerrar sesión?")) {
                    window.location.href = "logout.php";
                }
            };
        }
    }
</script>

<style>
    /* Estilo rápido para el botón de logout */
    .boton-logout {
        background-color: #ff4d4d;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background 0.3s;
        display: inline-block;
    }
    .boton-logout:hover {
        background-color: #cc0000;
    }
</style>

<?php include 'template/pie.php' ?>