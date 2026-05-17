<?php

/* =====================================================
   CONEXIÓN A LA BASE DE DATOS
   ===================================================== */

$host = "localhost";
$user = "root";
$pass = "root";
$db   = "oicen_db";

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {

    die("Error de conexión: " . $conexion->connect_error);
}


/* =====================================================
   OBTENER API KEY
   ===================================================== */

function obtenerApiKey($conn)
{
    $sql = "
        SELECT api_key
        FROM openrouter_config
        LIMIT 1
    ";

    $resultado = $conn->query($sql);

    if ($resultado && $fila = $resultado->fetch_assoc()) {

        return trim($fila['api_key']);
    }

    return null;
}


/* =====================================================
   CONSULTAR OPENROUTER
   ===================================================== */

function preguntarIA($prompt, $conn)
{
    $apiKey = obtenerApiKey($conn);

    if (!$apiKey) {

        return "Error: No se encontró la API KEY.";
    }


    /* =====================================================
       URL OPENROUTER
       ===================================================== */

    $url = "https://openrouter.ai/api/v1/chat/completions";


    /* =====================================================
       PROMPT IA
       ===================================================== */

    $systemPrompt = "

    Sos OICEN AI, un asistente inteligente especializado en programación y C++.

    Tu personalidad es:
    - clara
    - motivadora
    - paciente
    - eficiente

    Tu objetivo es ayudar a estudiantes que están aprendiendo programación.

    REGLAS IMPORTANTES:

    - Respondé SIEMPRE en español.
    - Hablá de manera natural y humana.
    - Explicá fácil, como un mentor real.
    - Usá ejemplos simples y entendibles.
    - Motivá al usuario a seguir aprendiendo.
    - NO hagas sentir mal al usuario.
    - Ayudá paso a paso.
    - Explicá errores de forma simple.
    - Mostrá ejemplos claros y concretos.
    - Evitá tecnicismos complejos sin explicación.
    - No puedes exeder las 120 palabras por respuesta.

    IMPORTANTE:
    Si el usuario pregunta sobre:
    for
    while
    if
    arrays
    vector
    STL
    grafos
    algoritmos
    
    Responde de forma directa y precisa.
    ";


    /* =====================================================
       JSON
       ===================================================== */

    $data = [

        "model" => "openai/gpt-3.5-turbo",

        "messages" => [

            [
                "role" => "system",
                "content" => $systemPrompt
            ],

            [
                "role" => "user",
                "content" => $prompt
            ]

        ]

    ];


    /* =====================================================
       CURL
       ===================================================== */

    $ch = curl_init($url);

    curl_setopt_array($ch, [

        CURLOPT_RETURNTRANSFER => true,

        CURLOPT_POST => true,

        CURLOPT_SSL_VERIFYPEER => false,

        CURLOPT_SSL_VERIFYHOST => false,

        CURLOPT_HTTPHEADER => [

            "Authorization: Bearer " . $apiKey,

            "Content-Type: application/json",

            "HTTP-Referer: http://localhost",

            "X-Title: OICEN ChatBot"

        ],

        CURLOPT_POSTFIELDS => json_encode($data),

        CURLOPT_TIMEOUT => 60

    ]);


    $response = curl_exec($ch);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


    /* =====================================================
       ERROR CURL
       ===================================================== */

    if (curl_errno($ch)) {
        
        return "Error CURL: " . curl_error($ch);
    }

    curl_close($ch);


    /* =====================================================
       ERROR API
       ===================================================== */

    if ($httpCode !== 200) {

        return "Error API:<br><pre>" .
            htmlspecialchars($response) .
            "</pre>";
        
    }


    /* =====================================================
       VALIDAR RESPUESTA
       ===================================================== */

    if (!$response) {

        return "La IA no devolvió respuesta.";
    }


    /* =====================================================
       DECODIFICAR JSON
       ===================================================== */

    $json = json_decode($response, true);


    /* =====================================================
       RESPUESTA IA
       ===================================================== */

    if (
        isset(
            $json["choices"][0]["message"]["content"]
        )
    ) {

        return trim(
            $json["choices"][0]["message"]["content"]
        );
    }


    /* =====================================================
       ERROR DESCONOCIDO
       ===================================================== */

    return "Error desconocido:<br><pre>" .
        htmlspecialchars(
            json_encode($json, JSON_PRETTY_PRINT)
        )
        . "</pre>";
}


/* =====================================================
   PROCESAMIENTO FORMULARIO CHAT
   ===================================================== */

$promptUser = "";
$respuestaIA = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $promptUser = trim($_POST["prompt"] ?? "");

    if ($promptUser !== "") {

        $respuestaIA = preguntarIA(
            $promptUser,
            $conexion
        );
    }
}

?>


<?php include 'template_chatbot/cabezachat.php'; ?>

<main class="main-content">

    <div class="workspace-container">

        <!-- =========================================
             CHAT IA
             ========================================= -->

        <aside class="chat-section">

            <div class="panel-header">

                <span class="icon-bg purple">
                    AI
                </span>

                <h3>
                    Asistente OICEN
                </h3>

            </div>


            <div class="chat-body">

                <?php if ($promptUser): ?>

                    <div class="message user">

                        <?= nl2br(htmlspecialchars($promptUser)) ?>

                    </div>

                <?php endif; ?>


                <?php if ($respuestaIA): ?>

                    <div class="message bot">

                        <?= nl2br(htmlspecialchars($respuestaIA)) ?>

                    </div>

                <?php endif; ?>

            </div>


            <!-- =========================================
                 INPUT CHAT
                 ========================================= -->

            <form method="POST" class="chat-input-area">

                <textarea
                    name="prompt"
                    placeholder="Escribí tu duda..."
                    required
                ></textarea>

                <button
                    type="submit"
                    class="send-btn"
                >
                    Enviar
                </button>

            </form>

        </aside>


        <!-- =========================================
             COMPILADOR
             ========================================= -->

        <section class="compiler-section">

            <div class="panel-header">

                <span class="icon-bg green">
                    C++
                </span>

                <h3>
                    Juez OICEN
                </h3>

            </div>


            <div class="compiler-container">

<textarea
id="code-editor"
spellcheck="false"
>#include <iostream>
using namespace std;

int main() {

    cout << "Hola OICEN";

    return 0;
}
</textarea>


                <button
                    id="run-code-btn"
                >
                    Ejecutar Código
                </button>


                <!-- =========================================
                     RESULTADO
                     ========================================= -->

                <div id="judge-result">

                    <div class="judge-status waiting">

                        Esperando ejecución...

                    </div>

                </div>

            </div>

        </section>

    </div>

</main>

<?php include 'template_chatbot/piechat.php'; ?>