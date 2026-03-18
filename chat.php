<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevHub - Foro & Compilador</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Fira+Code&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0f172a;
            --panel-bg: #1e293b;
            --accent: #38bdf8;
            --text-main: #f1f5f9;
            --border: #334155;
            --user-msg: #0ea5e9;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Header */
        header {
            height: 60px;
            background: var(--panel-bg);
            display: flex;
            align-items: center;
            padding: 0 20px;
            border-bottom: 1px solid var(--border);
            justify-content: space-between;
        }

        .logo { font-weight: bold; font-size: 1.2rem; color: var(--accent); }

        /* Layout Principal */
        .container {
            display: grid;
            grid-template-columns: 250px 1fr 350px;
            flex-grow: 1;
            overflow: hidden;
        }

        /* Columna 1: Foro */
        .forum-panel {
            background: var(--bg-dark);
            border-right: 1px solid var(--border);
            padding: 15px;
            overflow-y: auto;
        }

        .forum-item {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 0.85rem;
            background: var(--panel-bg);
        }

        .forum-item:hover { background: var(--border); }

        /* Columna 2: Compilador */
        .editor-panel {
            display: flex;
            flex-direction: column;
            background: #0d1117;
        }

        .editor-header {
            padding: 10px 20px;
            background: #161b22;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #code-editor {
            flex-grow: 1;
            background: transparent;
            color: #d1d5db;
            font-family: 'Fira Code', monospace;
            padding: 20px;
            border: none;
            outline: none;
            resize: none;
            font-size: 14px;
        }

        .output-console {
            height: 150px;
            background: #000;
            padding: 15px;
            font-family: 'Fira Code', monospace;
            font-size: 0.8rem;
            border-top: 2px solid var(--accent);
            color: #10b981;
            overflow-y: auto;
        }

        /* Columna 3: Chat IA */
        .chat-panel {
            background: var(--panel-bg);
            display: flex;
            flex-direction: column;
            border-left: 1px solid var(--border);
        }

        .chat-messages {
            flex-grow: 1;
            padding: 15px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .bubble {
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 0.9rem;
            max-width: 90%;
        }

        .ai-bubble { background: var(--border); align-self: flex-start; }
        .user-bubble { background: var(--user-msg); align-self: flex-end; }

        .chat-input {
            padding: 15px;
            background: var(--bg-dark);
            display: flex;
            gap: 10px;
        }

        input {
            flex-grow: 1;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid var(--border);
            background: #0f172a;
            color: white;
        }

        button {
            background: var(--accent);
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover { opacity: 0.8; }
        
        .run-btn { background: #10b981; color: white; }
    </style>
</head>
<body>

<header>
    <div class="logo">⚡ DevHub FullStack</div>
    <div>Estudiante: <strong>Mateo Villanueva</strong></div>
</header>

<div class="container">
    <aside class="forum-panel">
        <h4 style="margin-bottom: 15px;">Discusiones</h4>
        <div class="forum-item">📌 ¿Cómo usar PDO en PHP?</div>
        <div class="forum-item">❓ Error en bucle for (Python)</div>
        <div class="forum-item">💡 Optimización de SQL</div>
        <div class="forum-item">🚀 Desplegando en Docker</div>
    </aside>

    <main class="editor-panel">
        <div class="editor-header">
            <span>index.php</span>
            <button class="run-btn" onclick="runCode()">Ejecutar Código ▶</button>
        </div>
        <textarea id="code-editor" spellcheck="false"><?php
// Escribe tu código aquí
echo "¡Hola Mundo desde el compilador PHP!";

$datos = ["PHP", "JavaScript", "Python"];
foreach($datos as $lenguaje) {
    echo "\nTrabajando con " . $lenguaje;
}
?></textarea>
        <div class="output-console" id="console">
            > Esperando ejecución...
        </div>
    </main>

    <section class="chat-panel">
        <div style="padding: 10px; border-bottom: 1px solid var(--border); text-align: center; font-weight: bold;">Asistente IA</div>
        <div class="chat-messages" id="chat-box">
            <div class="bubble ai-bubble">Hola, puedo analizar tu código del centro. ¿En qué te ayudo?</div>
        </div>
        <div class="chat-input">
            <input type="text" id="user-msg" placeholder="Preguntar a la IA...">
            <button onclick="sendMessage()">Enviar</button>
        </div>
    </section>
</div>

<script>
    // Simulación de Compilador
    function runCode() {
        const consoleDiv = document.getElementById('console');
        const code = document.getElementById('code-editor').value;
        
        consoleDiv.innerHTML = "> Ejecutando...<br>";
        
        setTimeout(() => {
            // Aquí simulamos la salida del código. 
            // En un sistema real, enviarías 'code' vía AJAX a un servidor PHP
            // y devolverías el resultado.
            let output = "¡Hola Mundo desde el compilador PHP!<br>";
            output += "Trabajando con PHP<br>Trabajando con JavaScript<br>Trabajando con Python<br>";
            output += "<br>-- Ejecución finalizada con éxito --";
            consoleDiv.innerHTML = output;
        }, 800);
    }

    // Lógica del Chat
    function sendMessage() {
        const input = document.getElementById('user-msg');
        const chatBox = document.getElementById('chat-box');
        
        if (input.value.trim() !== "") {
            // Mensaje usuario
            const userDiv = document.createElement('div');
            userDiv.className = 'bubble user-bubble';
            userDiv.textContent = input.value;
            chatBox.appendChild(userDiv);
            
            // Respuesta IA simulada
            setTimeout(() => {
                const aiDiv = document.createElement('div');
                aiDiv.className = 'bubble ai-bubble';
                aiDiv.textContent = "He analizado tu código. Parece que tienes un error en la línea 4, asegúrate de cerrar bien el paréntesis.";
                chatBox.appendChild(aiDiv);
                chatBox.scrollTop = chatBox.scrollHeight;
            }, 1000);

            input.value = "";
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    }
</script>

</body>
</html>