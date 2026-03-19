<?php
// Datos simulados (En el futuro vendrán de tu Base de Datos)
$usuario = "Mateo";
$nivel = "Principiante";
$puntos = 1250;
$clase_actual = 3;
$total_clases = 10;
$progreso = ($clase_actual / $total_clases) * 100;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OICEN | Panel de Control</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Fira+Code&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="app-container">
        <aside class="sidebar">
            <div class="logo-icon">O</div>
            <nav class="menu">
                <a href="#" class="active" title="Inicio">🏠</a>
                <a href="clase.php" title="Clases">📚</a>
                <a href="compilador.php" title="Compilador">💻</a>
                <a href="#" title="Comunidad">👥</a>
                <a href="#" title="Ajustes">⚙️</a>
            </nav>
            <div class="logout">🚪</div>
        </aside>

        <main class="main-content">
            
            <header class="top-bar">
                <div class="welcome">
                    <h1>¡Qué bueno verte, <?php echo $usuario; ?>!</h1>
                    <p>Nivel: <strong><?php echo $nivel; ?></strong> • <?php echo $puntos; ?> XP</p>
                </div>
                <div class="user-badge">
                    <img src="https://ui-avatars.com/api/?name=<?php echo $usuario; ?>&background=00d2ff&color=fff" alt="Avatar">
                </div>
            </header>

            <section class="progress-section">
                <div class="progress-card">
                    <div class="card-info">
                        <h2>Tu ruta de aprendizaje</h2>
                        <p>Fundamentos de Programación Web</p>
                        <div class="bar-container">
                            <div class="bar-fill" style="width: <?php echo $progreso; ?>%;"></div>
                        </div>
                        <span class="percentage"><?php echo round($progreso); ?>% Completado</span>
                    </div>
                    <a href="clase.php?id=<?php echo $clase_actual; ?>" class="btn-continue">Continuar Clase <?php echo $clase_actual; ?> →</a>
                </div>
            </section>

            <section class="modules-grid">
                
                <div class="module-card">
                    <div class="module-icon">💡</div>
                    <h3>Conceptos Básicos</h3>
                    <p>Variables, tipos de datos y constantes.</p>
                    <span class="status-done">Completado ✓</span>
                </div>

                <div class="module-card active-module">
                    <div class="module-icon">🔄</div>
                    <h3>Lógica de Bucles</h3>
                    <p>Dominando for, while y do-while.</p>
                    <button onclick="location.href='clase.php?id=3'">Entrar ahora</button>
                </div>

                <div class="module-card locked">
                    <div class="module-icon">🔒</div>
                    <h3>Funciones Pro</h3>
                    <p>Parámetros, retorno y scope.</p>
                    <span>Bloqueado</span>
                </div>

                <div class="module-card compiler-shortcut" onclick="location.href='compilador.php'">
                    <div class="module-icon">⚡</div>
                    <h3>Laboratorio</h3>
                    <p>Prueba código en vivo.</p>
                </div>

            </section>

        </main>
    </div>

</body>
</html>