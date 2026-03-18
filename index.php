<?php
$nombre_usuario = "Mateo"; 
$progreso_actual = 35;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OICEN - Dashboard Vertical</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Fira+Code&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php include 'navbar.php'; ?>

    <div class="main-wrapper">
        
        <section class="full-stack-card hero">
            <div class="hero-content">
                <h1>Bienvenido a OICEN, <?php echo $nombre_usuario; ?></h1>
                <p>Estás en el camino correcto. Hoy es un gran día para escribir código.</p>
                <div class="main-progress-bar">
                    <div class="progress-fill" style="width: <?php echo $progreso_actual; ?>%;"></div>
                </div>
                <span>Has completado el <?php echo $progreso_actual; ?>% de la ruta "Fullstack Junior"</span>
            </div>
        </section>

        <section class="full-stack-card current-lesson">
            <div class="card-tag">CONTINUAR APRENDIENDO</div>
            <div class="lesson-info">
                <h2>Clase 4: Bucles e Iteraciones en PHP</h2>
                <p>Aprende a repetir tareas automáticamente con <code>for</code>, <code>while</code> y <code>foreach</code>.</p>
                <a href="clase.php" class="btn-main">Ir a la clase ahora</a>
            </div>
        </section>

        <section class="full-stack-card tools-section">
            <div class="tools-grid">
                <div class="tool-text">
                    <h2>Laboratorio de Código (Sandbox)</h2>
                    <p>Usa nuestro compilador integrado para probar tus scripts en tiempo real sin instalar nada.</p>
                </div>
                <div class="tool-action">
                    <a href="chat.php" class="btn-outline">Abrir Compilador OICEN</a>
                </div>
            </div>
        </section>

        <section class="full-stack-card forum-preview">
            <h2>Últimas dudas en el Foro</h2>
            <div class="forum-list">
                <div class="forum-item"><span>❓</span> ¿Por qué mi punto y coma da error? <em>- hace 5 min</em></div>
                <div class="forum-item"><span>❓</span> Diferencia entre == y === <em>- hace 2 horas</em></div>
                <div class="forum-item"><span>❓</span> ¿Cómo centrar un div? (Clásico) <em>- hace 4 horas</em></div>
            </div>
           <a href="chat.php"><button class="btn-ghost">Ver todo el foro</button></a>
        </section>

        <footer class="simple-footer">
            <p>&copy; 2026 OICEN - Desarrollado para futuros programadores.</p>
        </footer>

    </div>

</body>
</html>