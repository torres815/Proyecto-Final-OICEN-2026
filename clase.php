<?php
// 1. Simulación de Base de Datos de Clases
$clases = [
    1 => ["titulo" => "Introducción a las Variables", "contenido" => "Las variables son contenedores para almacenar datos...", "video" => "https://www.youtube.com/embed/dQw4w9WgXcQ"],
    2 => ["titulo" => "Estructuras Condicionales (IF)", "contenido" => "Los condicionales permiten tomar decisiones en el código...", "video" => "https://www.youtube.com/embed/xyz123"],
    3 => ["titulo" => "Bucles e Iteraciones", "contenido" => "Un bucle permite repetir una instrucción varias veces...", "video" => "https://www.youtube.com/embed/abc456"],
    4 => ["titulo" => "Funciones y Retorno", "contenido" => "Las funciones encapsulan lógica reutilizable...", "video" => "https://www.youtube.com/embed/789ghi"]
];

// 2. Control de Progreso (Simulado)
// En un sistema real, esto vendría de $_SESSION['progreso_usuario']
$clase_maxima_alcanzada = 2; 

// 3. Obtener la clase actual de la URL
$id_actual = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// 4. Lógica de Seguridad: ¿Puede ver esta clase?
if ($id_actual > $clase_maxima_alcanzada) {
    // Si intenta saltar a una clase bloqueada, lo devolvemos a su progreso actual
    header("Location: clase.php?id=" . $clase_maxima_alcanzada . "&error=bloqueado");
    exit();
}

$datos_clase = $clases[$id_actual];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>OICEN - Clase <?php echo $id_actual; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Fira+Code&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        :root {
            --bg: #0f172a;
            --card: #1e293b;
            --accent: #38bdf8;
            --text: #f1f5f9;
            --disabled: #475569;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .class-viewer {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            max-width: 1000px;
            margin: 0 auto;
            width: 100%;
            padding: 40px 20px;
        }

        .video-container {
            width: 100%;
            aspect-ratio: 16 / 9;
            background: #000;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            margin-bottom: 30px;
        }

        .content-area {
            background: var(--card);
            padding: 30px;
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.05);
        }

        .navigation-footer {
            background: #161e2d;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #334155;
            position: sticky;
            bottom: 0;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-prev { background: #334155; color: white; }
        .btn-next { background: var(--accent); color: #0f172a; }
        
        .btn-disabled {
            background: var(--disabled);
            color: #94a3b8;
            cursor: not-allowed;
            pointer-events: none;
        }

        .status-badge {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--accent);
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <main class="class-viewer">
        <div class="status-badge">Módulo 1 • Clase <?php echo $id_actual; ?> de <?php echo count($clases); ?></div>
        <h1><?php echo $datos_clase['titulo']; ?></h1>

        <div class="video-container">
            <iframe width="100%" height="100%" src="<?php echo $datos_clase['video']; ?>" frameborder="0" allowfullscreen></iframe>
        </div>

        <article class="content-area">
            <h3>Explicación</h3>
            <p><?php echo $datos_clase['contenido']; ?></p>
        </article>
    </main>

    <footer class="navigation-footer">
        
        <?php if ($id_actual > 1): ?>
            <a href="clase.php?id=<?php echo $id_actual - 1; ?>" class="btn btn-prev">← Clase Anterior</a>
        <?php else: ?>
            <div class="btn btn-disabled">← Clase Anterior</div>
        <?php endif; ?>

        <div class="progreso-texto">
            Clase <strong><?php echo $id_actual; ?></strong>
        </div>

        <?php 
        $siguiente_id = $id_actual + 1;
        $esta_bloqueada = ($siguiente_id > $clase_maxima_alcanzada);
        $es_la_ultima = ($id_actual >= count($clases));
        ?>

        <?php if ($es_la_ultima): ?>
            <div class="btn btn-disabled">¡Curso Completado! 🎉</div>
        <?php elseif ($esta_bloqueada): ?>
            <div class="btn btn-disabled">Siguiente (Bloqueada 🔒)</div>
        <?php else: ?>
            <a href="clase.php?id=<?php echo $siguiente_id; ?>" class="btn btn-next">Siguiente Clase →</a>
        <?php endif; ?>

    </footer>

</body>
</html>