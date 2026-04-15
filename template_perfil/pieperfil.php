<script>
    function generateCalendar() {
        const grid = document.getElementById('calendarGrid');
        const monthText = document.getElementById('monthName');
        const yearText = document.getElementById('yearLabel');

        const now = new Date();
        const currentMonth = now.getMonth();
        const currentYear = now.getFullYear();
        const today = now.getDate();

        // Nombres de meses en español
        const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
            "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
        ];

        monthText.innerText = months[currentMonth];
        yearText.innerText = currentYear;

        // Primer día del mes (0 es domingo, ajustamos para que 0 sea lunes)
        let firstDay = new Date(currentYear, currentMonth, 1).getDay();
        let adjustedFirstDay = firstDay === 0 ? 6 : firstDay - 1;

        // Total de días en el mes
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        grid.innerHTML = '';

        // 1. Crear espacios vacíos para los días del mes anterior
        for (let i = 0; i < adjustedFirstDay; i++) {
            const emptyDiv = document.createElement('div');
            emptyDiv.className = 'cal-day empty-day';
            grid.appendChild(emptyDiv);
        }

        // 2. Crear los días del mes
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'cal-day';
            dayElement.innerText = day;

            // Resaltar hoy
            if (day === today) dayElement.classList.add('today');

            // SIMULACIÓN: Aquí podrías conectar tu lógica de "tiempo activo"
            // Por ahora, asignamos niveles aleatorios para ver el efecto visual
            const activityLevel = Math.floor(Math.random() * 4); // 0 a 3
            if (activityLevel > 0) {
                dayElement.classList.add(`lvl-${activityLevel}`);
            }

            // Tooltip simple al pasar el mouse
            dayElement.title = `Actividad del ${day} de ${months[currentMonth]}`;

            grid.appendChild(dayElement);
        }
    }

    // Ejecutar al cargar la página
    document.addEventListener('DOMContentLoaded', generateCalendar);
</script>

</body>

</html>