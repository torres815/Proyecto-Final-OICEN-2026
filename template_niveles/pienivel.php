<script>
    // Estado global: Qué nivel ha alcanzado el usuario
    let userProgress = {
        l1: 1, // El usuario empieza en nivel 1 de lección 1
        l2: 0,
        l3: 0
    };

    function toggleLesson(id) {
        const content = document.getElementById(id);
        content.classList.toggle('active');
    }

    function renderLevels(lessonId, containerId, currentProg) {
        const container = document.getElementById(containerId);
        // Limpiamos niveles antiguos pero mantenemos la línea punteada
        container.innerHTML = '<div class="dotted-path"></div>';

        for (let i = 1; i <= 10; i++) {
            const node = document.createElement('div');
            node.className = 'level-node';
            node.setAttribute('data-level', i);
            node.innerText = i;

            // Determinar alineación
            if (i % 2 === 0 || i === 10) node.classList.add('align-center-path');
            else if (i === 1 || i === 5 || i === 9) node.classList.add('align-side-left');
            else node.classList.add('align-side-right');

            // Lógica de estado
            if (i < currentProg) {
                node.classList.add('completed');
                node.onclick = () => alert(`Repitiendo nivel ${i}`);
            } else if (i === currentProg) {
                node.classList.add('current');
                node.onclick = () => completeLevel(lessonId); // Simulación
            } else {
                node.classList.add('locked');
            }

            container.appendChild(node);
        }
        document.getElementById(`prog-${lessonId}`).innerText = currentProg - 1;
    }

    function completeLevel(lesson) {
        if (userProgress[lesson] < 10) {
            userProgress[lesson]++;
            alert("¡Nivel completado! El siguiente nivel se ha desbloqueado.");
            initApp(); // Refrescar vista
        } else {
            alert("¡Lección completada!");
        }
    }

    // Iniciar
    function initApp() {
        renderLevels('l1', 'path-l1', userProgress.l1);
        renderLevels('l2', 'path-l2', userProgress.l2);
        renderLevels('l3', 'path-l3', userProgress.l3);
    }

    window.onload = initApp;
</script>

</body>

</html>