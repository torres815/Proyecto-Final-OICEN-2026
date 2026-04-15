<?php include 'template_niveles/cabezanivel.php' ?>
<div class="level-map-container">

    <div class="curriculum-container">

        <div class="lesson-wrapper">
            <div class="lesson-header-badge" onclick="toggleLesson('levels-l1')">
                <span class="lesson-title-tiny">Lección 01</span>
                <h2 class="lesson-title-main">Logica Basica ¡A Trabajar!</h2>
                <span class="unlock-info">Progreso: <span id="prog-l1">0</span>/10</span>
            </div>
            <div id="levels-l1" class="levels-container accordion-content">
                <div class="path-container" id="path-l1">
                    <div class="dotted-path"></div>
                </div>
            </div>
        </div>

        <div class="lesson-wrapper">
            <div class="lesson-header-badge" onclick="toggleLesson('levels-l2')">
                <span class="lesson-title-tiny">Lección 02</span>
                <h2 class="lesson-title-main">Primeros Pasos en C++</h2>
                <span class="unlock-info">Progreso: <span id="prog-l2">0</span>/10</span>
            </div>
            <div id="levels-l2" class="levels-container accordion-content">
                <div class="path-container" id="path-l2">
                    <div class="dotted-path"></div>
                </div>
            </div>
        </div>

        <div class="lesson-wrapper">
            <div class="lesson-header-badge" onclick="toggleLesson('levels-l3')">
                <span class="lesson-title-tiny">Lección 03</span>
                <h2 class="lesson-title-main">Avanzado C++</h2>
                <span class="unlock-info">Progreso: <span id="prog-l3">0</span>/10</span>
            </div>
            <div id="levels-l3" class="levels-container accordion-content">
                <div class="path-container" id="path-l3">
                    <div class="dotted-path"></div>
                </div>
            </div>
        </div>

    </div>

</div>
<?php include 'template_niveles/pienivel.php' ?>