<?php
require_once "chatbot.php";

$respuesta = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $prompt = trim($_POST["prompt"] ?? "");

    if (!empty($prompt)) {
        $respuesta = preguntarGemini($prompt);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ChatBot Gemini</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#0f172a;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.chat-container{
    width:420px;
    height:700px;
    background:#111827;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 0 30px rgba(0,0,0,.4);

    display:flex;
    flex-direction:column;
}

.chat-header{
    padding:18px;
    background:#1e293b;
    color:white;

    flex-shrink:0;
}

.chat-body{
    flex:1;
    min-height:0;          /* IMPORTANTE para que flex permita scroll */
    overflow-y:auto;
    padding:20px;

    display:flex;
    flex-direction:column;
    gap:12px;

    background:#0f172a;
}

.chat-form{
    padding:15px;
    background:#111827;
    border-top:1px solid #1f2937;

    flex-shrink:0;
}

.chat-body::-webkit-scrollbar{
    width:8px;
}

.chat-body::-webkit-scrollbar-thumb{
    background:#374151;
    border-radius:10px;
}

.message{
    padding:12px 14px;
    border-radius:14px;
    max-width:85%;
    line-height:1.5;
    font-size:15px;
    white-space:pre-wrap;
}

.user{
    background:#2563eb;
    color:white;
    align-self:flex-end;
}

.bot{
    background:#1e293b;
    color:#e5e7eb;
    align-self:flex-start;
}

/* INPUT */
.chat-form{
    background:#111827;
    padding:15px;
    display:flex;
    gap:10px;
    border-top:1px solid #1f2937;
}

.chat-form textarea{
    flex:1;
    resize:none;
    height:55px;
    border:none;
    border-radius:12px;
    padding:12px;
    font-size:15px;
    outline:none;
    background:#1e293b;
    color:white;
}

.chat-form button{
    width:90px;
    border:none;
    border-radius:12px;
    background:#2563eb;
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:.2s;
}

.chat-form button:hover{
    background:#1d4ed8;
}

.empty{
    color:#94a3b8;
    text-align:center;
    margin-top:40px;
}

</style>
</head>
<body>

<div class="chat-container">

    <div class="chat-header">
        🤖 Asistente Gemini
    </div>

    <div class="chat-body" id="chatBody">

        <div class="message bot">
            ¡Hola! Soy tu asistente de programación. ¿En qué puedo ayudarte?
        </div>

        <?php if (!empty($prompt)): ?>
            <div class="message user">
                <?= htmlspecialchars($prompt) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($respuesta)): ?>
            <div class="message bot">
                <?= nl2br(htmlspecialchars($respuesta)) ?>
            </div>
        <?php endif; ?>

    </div>

    <form method="POST" class="chat-form">

        <textarea
            name="prompt"
            placeholder="Escribí tu pregunta..."
            required
        ></textarea>

        <button type="submit">
            Enviar
        </button>

    </form>

</div>

<script>
const chatBody = document.getElementById("chatBody");
chatBody.scrollTop = chatBody.scrollHeight;
</script>

</body>
</html>