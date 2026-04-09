<script>
    // CONFIGURACIÓN DE APIS (Ejemplo con Judge0)
    async function runCode() {
        const outputElement = document.getElementById('output-text');
        const code = document.getElementById('code-editor').value;

        outputElement.innerText = "Compilando...";
        outputElement.className = "blink";

        const options = {
            method: 'POST',
            url: 'https://judge0-ce.p.rapidapi.com/submissions',
            params: {
                base64_encoded: 'false',
                fields: '*'
            },
            headers: {
                'content-type': 'application/json',
                'X-RapidAPI-Key': 'TU_API_KEY_AQUI',
                'X-RapidAPI-Host': 'judge0-ce.p.rapidapi.com'
            },
            data: {
                language_id: 54, // C++ (GCC 9.2.0)
                source_code: code
            }
        };

        try {
            // Aquí harías el fetch a la API
            // Simulación de respuesta exitosa:
            setTimeout(() => {
                outputElement.className = "";
                outputElement.innerHTML = `<br><span style="color: #4ade80;">[Hecho]</span> Ejecución finalizada con éxito.<br>Hola desde OICEN!`;
            }, 1500);
        } catch (error) {
            outputElement.innerText = "Error de conexión.";
        }
    }

    function sendMessage() {
        const input = document.getElementById('user-input');
        const container = document.getElementById('chat-messages');

        if (input.value.trim() === "") return;

        // Agregar mensaje usuario
        container.innerHTML += `<div class="message user">${input.value}</div>`;

        const userPrompt = input.value;
        input.value = "";

        // Simulación respuesta IA
        setTimeout(() => {
            container.innerHTML += `<div class="message bot">Analizando tu duda sobre "${userPrompt}"... Recuerda que en C++ la gestión de memoria es clave.</div>`;
            container.scrollTop = container.scrollHeight;
        }, 1000);
    }
</script>

</body>

</html>