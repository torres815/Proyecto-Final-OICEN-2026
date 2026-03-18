<?php
// Datos de prueba (Simulando una consulta a Base de Datos)
$estudiante = [
    "nombre" => "Mateo",
    "apellido" => "Villanueva",
    "edad" => 17,
    "curso" => "6to Año - Computación",
    "nivel" => "Secundaria Técnica",
    "avatar" => "https://ui-avatars.com/api/?name=Mateo+Villanueva&size=128&background=0D8ABC&color=fff",
    "historial" => ["2026-03-17 08:30", "2026-03-16 09:15", "2026-03-15 14:02", "2026-03-14 07:45"],
    "ejercicios" => [
        ["materia" => "Matemáticas", "tema" => "Cálculo Integral", "estado" => "Completado", "progreso" => 100],
        ["materia" => "Física", "tema" => "Termodinámica", "estado" => "En proceso", "progreso" => 45],
        ["materia" => "PHP Advanced", "tema" => "PDO & MySQL", "estado" => "Completado", "progreso" => 100],
        ["materia" => "Inglés", "tema" => "Present Perfect", "estado" => "Pendiente", "progreso" => 0]
    ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Estudiantil</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        
        body {
            background-color: #f0f2f5;
            height: 100vh; /* Ocupa el 100% de la altura de la ventana */
            display: flex;
            overflow: hidden; /* Evita scroll global si no es necesario */
        }

        /* Sidebar Lateral */
        .sidebar {
            width: 280px;
            background: #1e293b;
            color: white;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #38bdf8;
            margin-bottom: 1rem;
        }

        /* Contenedor Principal */
        .main-content {
            flex-grow: 1;
            padding: 2rem;
            overflow-y: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 1.5rem;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }

        .full-width { grid-column: span 2; }

        h3 { color: #1e293b; margin-bottom: 1rem; border-left: 4px solid #38bdf8; padding-left: 10px; }

        /* Tabla de ejercicios */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { text-align: left; background: #f8fafc; padding: 12px; color: #64748b; }
        td { padding: 12px; border-bottom: 1px solid #e2e8f0; }

        .status {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        .completado { background: #dcfce7; color: #166534; }
        .proceso { background: #fef9c3; color: #854d0e; }
        .pendiente { background: #fee2e2; color: #991b1b; }

        .log-item {
            background: #f8fafc;
            margin-bottom: 8px;
            padding: 10px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <img src="<?php echo $estudiante['avatar']; ?>" alt="Avatar" class="avatar">
        <h2><?php echo $estudiante['nombre']; ?></h2>
        <p style="color: #94a3b8; margin-bottom: 2rem;"><?php echo $estudiante['apellido']; ?></p>
        
        <div style="width: 100%; text-align: left; font-size: 0.9rem; line-height: 2;">
            <p><strong>Edad:</strong> <?php echo $estudiante['edad']; ?> años</p>
            <p><strong>Nivel:</strong> <?php echo $estudiante['nivel']; ?></p>
            <p><strong>Curso:</strong> <?php echo $estudiante['curso']; ?></p>
        </div>
    </aside>

    <main class="main-content">
        
        <section class="card">
            <h3>Historial de Accesos</h3>
            <?php foreach($estudiante['historial'] as $fecha): ?>
                <div class="log-item">
                    <span>Acceso al sistema</span>
                    <span style="color: #64748b;"><?php echo $fecha; ?></span>
                </div>
            <?php endforeach; ?>
        </section>

        <section class="card">
            <h3>Rendimiento General</h3>
            <div style="text-align: center; padding: 20px;">
                <h1 style="font-size: 3rem; color: #38bdf8;">85%</h1>
                <p>Progreso total del curso actual</p>
            </div>
        </section>

        <section class="card full-width">
            <h3>Ejercicios Resueltos Hoy - <?php echo date('d M, Y'); ?></h3>
            <table>
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Tema</th>
                        <th>Progreso</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($estudiante['ejercicios'] as $ej): 
                        $clase = ($ej['estado'] == 'Completado') ? 'completado' : (($ej['estado'] == 'En proceso') ? 'proceso' : 'pendiente');
                    ?>
                    <tr>
                        <td><strong><?php echo $ej['materia']; ?></strong></td>
                        <td><?php echo $ej['tema']; ?></td>
                        <td><?php echo $ej['progreso']; ?>%</td>
                        <td><span class="status <?php echo $clase; ?>"><?php echo $ej['estado']; ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

    </main>

</body>
</html>