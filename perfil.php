<?php include 'template_perfil/cabezaperfil.php' ?>

<div class="profile-container">
    <div class="profile-main">
        <div class="user-card">
            <div class="user-info">
                <div class="profile-pic">JS</div>
                <div>
                    <h2>Usuario Pro</h2>
                    <p>Nivel 14 • Desarrollador Senior</p>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-item">
                    <span>Tareas Completadas</span>
                    <strong>42</strong>
                </div>
                <div class="stat-item">
                    <span>Tiempo Total</span>
                    <strong>128h</strong>
                </div>
            </div>

            <div class="progress-section">
                <div class="progress-labels">
                    <span>Progreso del Nivel</span>
                    <span>75%</span>
                </div>
                <div class="progress-bar-container">
                    <div class="progress-fill" style="width: 75%"></div>
                </div>
            </div>
        </div>

        <div class="tasks-container">
            <h3>Actividad Reciente</h3>
            <div class="task-item">
                <div class="task-dot green"></div>
                <div class="task-info">
                    <span>Optimización de Base de Datos</span>
                    <small>Finalizado hace 2 horas</small>
                </div>
                <span class="task-time">+45min</span>
            </div>
            <div class="task-item">
                <div class="task-dot purple"></div>
                <div class="task-info">
                    <span>Refactorización CSS Global</span>
                    <small>Finalizado ayer</small>
                </div>
                <span class="task-time">+2h 15min</span>
            </div>
        </div>
    </div>

    <div class="profile-sidebar">
        <div class="calendar-card">
            <div class="calendar-header">
                <h3 id="monthName">Mes</h3>
                <span class="year-label" id="yearLabel">2024</span>
            </div>

            <div class="weekdays-grid">
                <div>Lu</div>
                <div>Ma</div>
                <div>Mi</div>
                <div>Ju</div>
                <div>Vi</div>
                <div>Sá</div>
                <div>Do</div>
            </div>

            <div class="calendar-grid" id="calendarGrid">
            </div>

            <div class="calendar-legend">
                <span>Menos</span>
                <div class="l-dot"></div>
                <div class="l-dot lvl-1"></div>
                <div class="l-dot lvl-2"></div>
                <div class="l-dot lvl-3"></div>
                <span>Más</span>
            </div>
        </div>
    </div>
</div>

<?php include 'template_perfil/pieperfil.php' ?>