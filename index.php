<?php include 'template/cabeza.php' ?>

<main class="main-content">

    <div class="hero-container">
        
        <main class="welcome-text">
            <h1>¡BIENVENIDOS A OICEN!</h1>
            <p style="font-size: 1.2rem; line-height: 1.6;">
                La plataforma líder en entrenamiento para las Olimpíadas Informáticas. 
                Aquí potenciarás tu lógica, dominarás algoritmos y te prepararás para 
                los desafíos de programación más exigentes a nivel nacional.
            </p>
        </main>

        <div class="right-side">
            <?php 
                // Simulación de datos (Esto vendría de tu base de datos)
                $nombreEstudiante = "Elias"; 
                $progreso = 10; // Porcentaje de 0 a 100
                
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
                    <span class="prompt">Alms_Elias_Tiago_y_Exequiel@cen:</span><span class="path">~</span>$
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

<?php include 'template/pie.php' ?>