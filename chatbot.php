<?php include 'template_chatbot/cabezachat.php' ?>

<main class="main-content">
    <div class="workspace-container">
        <aside class="chat-section">
            <div class="panel-header">
                <span class="icon-bg purple">AI</span>
                <h3>Asistente OICEN</h3>
            </div>
            <div id="chat-messages" class="chat-body">
                <div class="message bot">¡Hola! Soy tu asistente de C++. ¿En qué puedo ayudarte hoy?</div>
            </div>
            <div class="chat-input-area">
                <input type="text" id="user-input" placeholder="Pregunta algo sobre C++...">
                <button onclick="sendMessage()" class="send-btn">
                    <svg viewBox="0 0 24 24" width="20" height="20"><path fill="currentColor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                </button>
            </div>
        </aside>

        <section class="editor-section">
            <div class="panel-header">
                <span class="icon-bg green">C++</span>
                <h3>Compilador en Tiempo Real</h3>
                <button class="run-btn" onclick="runCode()">
                    <span>EJECUTAR</span>
                    <div class="btn-glow"></div>
                </button>
            </div>
            
            <div class="code-container">
                <textarea id="code-editor" spellcheck="false">
#include <iostream>

int main() {
    std::cout << "Hola desde OICEN!" << std::endl;
    return 0;
}</textarea>
            </div>

            <div class="terminal">
                <div class="term-bar">
                    <div class="dots">
                        <span class="dot r"></span>
                        <span class="dot y"></span>
                        <span class="dot g"></span>
                    </div>
                    <span class="term-name">output_console.exe</span>
                </div>
                <div class="term-body" id="terminal-output">
                    <span class="prompt">guest@oicen:</span><span class="path">~</span>$ <span id="output-text">Esperando ejecución...</span>
                </div>
            </div>
        </section>
    </div>
</main>