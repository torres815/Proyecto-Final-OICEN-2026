<script>
    const textToType = [
        "ERROR: Corazón no encontrado (404 Not Found)...",
        "Ella me dijo: 'O el código o yo'. A veces extraño su voz...",
        "Compilando esperanzas, obteniendo 0 aciertos...",
        "Mi novia me dejó por un programador Senior con más beneficios...",
        "Buscando el punto y coma que arruinó mi vida social...",
        "Haciendo un git push al vacío existencial...",
        "Instalando 'Vida_Social.exe'... Error: Espacio insuficiente.",
        "¿Para qué salir a la calle si el monitor tiene 16 millones de colores?",
        "Si el código funciona, no lo toques... como mi estabilidad emocional.",
        "Depurando mis sentimientos... 1.000.543 errores encontrados.",
        "Mi mayor relación estable es con el servidor local...",
        "Ella era un 10, pero su código no tenía comentarios...",
        "Tratando de arreglar mi vida con un 'Ctrl + Z'...",
        "Mi código es arte, pero del que nadie entiende y da miedo...",
        "Coffee in, Code out... Tears hidden in the process."
    ];

    let currentPhraseIndex = 0;
    let currentCharIndex = 0;
    const typerElement = document.getElementById("typer");

    function type() {
        if (currentPhraseIndex < textToType.length) {
            let currentPhrase = textToType[currentPhraseIndex];

            if (currentCharIndex < currentPhrase.length) {
                typerElement.innerHTML += currentPhrase.charAt(currentCharIndex);
                currentCharIndex++;
                setTimeout(type, 80); // Velocidad de escritura
            } else {
                // Espera 2 segundos al terminar la frase y pasa a la siguiente
                setTimeout(() => {
                    typerElement.innerHTML = "";
                    currentCharIndex = 0;
                    currentPhraseIndex++;
                    // Si llegamos al final de los 15 mensajes, reiniciamos a 0 (opcional)
                    if (currentPhraseIndex >= textToType.length) currentPhraseIndex = 0;
                    type();
                }, 2000);
            }
        }
    }

    // Iniciar la animación al cargar la página
    window.onload = type;
</script>

</body>

</html>