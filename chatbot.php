<?php
/* =====================================================
   index.php
   CHATBOT SIN JAVASCRIPT
   ===================================================== */

/* =====================================================
   CONFIG GEMINI
   ===================================================== */
function preguntarGemini($prompt)
{
    $apiKey = "AIzaSyC0U4EQ8i5Qg99ExHfEZc3zQb3bsm_P8JQ";

    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent";

    $promptFinal = "
Sos un profesor experto en programación.

Reglas:
- Respondé en español.
- Explicá claro, simple y paso a paso.
- Si preguntan código, mostrá ejemplos.
- Si preguntan errores, corregilos.
- Especialista en C++, PHP, HTML, CSS y JavaScript.

Pregunta del alumno:
$prompt
";

    $data = [
        "contents" => [
            [
                "parts" => [
                    ["text" => $promptFinal]
                ]
            ]
        ],
        "generationConfig" => [
            "temperature" => 1.0,
            "topP" => 0.95,
            "topK" => 40,
            "maxOutputTokens" => 1000
        ]
    ];

    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-goog-api-key: $apiKey"
        ],
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_TIMEOUT => 30
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return "Error cURL: " . curl_error($ch);
    }

    curl_close($ch);

    $json = json_decode($response, true);

    return $json["candidates"][0]["content"]["parts"][0]["text"]
        ?? "No se pudo obtener respuesta.";
}

/* =====================================================
   PROCESAR MENSAJE
   ===================================================== */
$prompt = "";
$respuesta = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $prompt = trim($_POST["prompt"] ?? "");

    if ($prompt !== "") {
        $respuesta = preguntarGemini($prompt);
    }
}
?>

<?php include 'template_chatbot/cabezachat.php'; ?>

<main class="main-content">
<div class="workspace-container">

<!-- =====================================================
   CHATBOT
   ===================================================== -->
<aside class="chat-section">

    <div class="panel-header">
        <span class="icon-bg purple">AI</span>
        <h3>Asistente OICEN</h3>
    </div>

    <div class="chat-body">

        <div class="message bot">
            ¡Hola! Soy tu asistente de programación. ¿En qué puedo ayudarte?
        </div>

        <?php if($prompt != ""): ?>
            <div class="message user">
                <?= htmlspecialchars($prompt) ?>
            </div>
        <?php endif; ?>

        <?php if($respuesta != ""): ?>
            <div class="message bot">
                <?= nl2br(htmlspecialchars($respuesta)) ?>
            </div>
        <?php endif; ?>

    </div>

    <!-- FORMULARIO SIN JAVASCRIPT -->
    <form method="POST" class="chat-input-area">

        <textarea
            name="prompt"
            placeholder="Escribí tu pregunta..."
            required
        ></textarea>

        <button type="submit" class="send-btn">
            Enviar
        </button>

    </form>

</aside>

<!-- =====================================================
   EDITOR
   ===================================================== -->
<section class="editor-section">

    <div class="panel-header">
        <span class="icon-bg green">C++</span>
        <h3>Compilador en Tiempo Real</h3>
    </div>

    <div class="code-container">

<textarea spellcheck="false">
#include <iostream>

int main() {
    std::cout << "Hola desde OICEN!" << std::endl;
    return 0;
}
</textarea>

    </div>

    <div class="terminal">
        <div class="term-body">
            Esperando ejecución...
        </div>
    </div>

</section>

</div>
</main>

<?php include 'template_chatbot/piechat.php'; ?>