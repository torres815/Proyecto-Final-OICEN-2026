// script.js
const chatForm = document.getElementById('chat-input-form');
const chatMessages = document.getElementById('chat-messages');
const userInput = document.getElementById('user-input');

chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const message = userInput.value.trim();
    if (!message) return;

    // 1. Mostrar mensaje del usuario inmediatamente
    addMessage(message, 'user-message');
    userInput.value = '';

    // 2. Llamar a nuestro servidor PHP
    try {
        const response = await fetch('api_ia.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ message: message })
        });

        const data = await response.json();

        // 3. Extraer y mostrar el texto de la IA
        if (data.candidates && data.candidates[0].content.parts[0].text) {
            const aiText = data.candidates[0].content.parts[0].text;
            addMessage(aiText, 'ai-message');
        } else {
            addMessage("Lo siento, no pude procesar tu duda.", 'ai-message');
        }
    } catch (error) {
        console.error('Error:', error);
        addMessage("Hubo un error al conectar con la IA.", 'ai-message');
    }
});

function addMessage(text, type) {
    const div = document.createElement('div');
    div.classList.add('message', type);
    div.innerHTML = `<p>${text}</p>`;
    chatMessages.appendChild(div);
    
    // Auto-scroll al fondo del chat
    chatMessages.scrollTop = chatMessages.scrollHeight;
}