<?php

header("Content-Type: application/json");


/* =========================================
   LEER JSON
========================================= */

$input = json_decode(file_get_contents("php://input"), true);

$code = $input["code"] ?? "";


/* =========================================
   VALIDAR
========================================= */

if (trim($code) === "") {

    echo json_encode([
        "success" => false,
        "message" => "No se recibió código."
    ]);

    exit;
}


/* =========================================
   API JUDGE0
========================================= */

$url = "https://ce.judge0.com/submissions?base64_encoded=false&wait=true";


$data = [

    "language_id" => 54,

    "source_code" => $code

];


/* =========================================
   CURL
========================================= */

$ch = curl_init($url);

curl_setopt_array($ch, [

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_POST => true,

    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ],

    CURLOPT_POSTFIELDS => json_encode($data),

    CURLOPT_TIMEOUT => 60

]);


$response = curl_exec($ch);


/* =========================================
   ERROR CURL
========================================= */

if(curl_errno($ch)){

    echo json_encode([
        "success" => false,
        "message" => "Error CURL: " . curl_error($ch)
    ]);

    exit;
}


curl_close($ch);


/* =========================================
   DECODIFICAR
========================================= */

$result = json_decode($response, true);


/* =========================================
   DEBUG
========================================= */

if(!$result){

    echo json_encode([
        "success" => false,
        "message" => "Judge0 no devolvió JSON válido."
    ]);

    exit;
}


/* =========================================
   SI COMPILA
========================================= */

if(
    isset($result["status"]["description"]) &&
    $result["status"]["description"] === "Accepted"
){

    echo json_encode([

        "success" => true

    ]);

    exit;
}


/* =========================================
   ERROR COMPILACIÓN
========================================= */

$error =
    $result["compile_output"]
    ??
    $result["stderr"]
    ??
    "Error desconocido.";


/* =========================================
   EXTRAER LÍNEA
========================================= */

preg_match('/:(\d+):/', $error, $matches);

$linea = $matches[1] ?? "?";


/* =========================================
   RESPUESTA ERROR
========================================= */

echo json_encode([

    "success" => false,

    "message" => "

    Línea aproximada: {$linea}<br><br>

    ⚠️ Revisá:
    <br><br>

    • punto y coma (;)
    <br>
    • llaves { }
    <br>
    • variables
    <br>
    • cout / cin
    <br>
    • sintaxis

    "

]);