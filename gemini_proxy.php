<?php

function preguntarGemini($prompt) {
    $apiKey = "AIzaSyC0U4EQ8i5Qg99ExHfEZc3zQb3bsm_P8JQ";

    if (!$apiKey) {
        return "Error: no se encontró la API Key.";
    }

    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent";

    $data = [
        "contents" => [
            [
                "parts" => [
                    ["text" => $prompt]
                ]
            ]
        ],
        "generationConfig" => [
        "temperature" => 1.3,
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
        CURLOPT_POSTFIELDS => json_encode($data)
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