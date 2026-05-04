<?php
// Datos mínimos para que no falle la impresión de variables
$usuario = "Elias";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OICEN - chatbot</title>

    <style>

        .chat-body {
    display: flex;
    flex-direction: column;
    gap: 12px;
    padding: 15px;
    overflow-y: auto;
}

.message {
    padding: 10px 15px;
    border-radius: 12px;
    max-width: 80%;
    font-size: 0.9rem;
    line-height: 1.4;
}

/* Estilo para el usuario (Derecha) */
.message.user {
    align-self: flex-end;
    background: #6a11cb; /* Morado acorde a tu UI */
    color: white;
    border-bottom-right-radius: 2px;
}

/* Estilo para el bot (Izquierda) */
.message.bot {
    align-self: flex-start;
    background: #2d2d3a;
    color: #e0e0e0;
    border-bottom-left-radius: 2px;
}

.message.loading {
    font-style: italic;
    opacity: 0.6;
}

        html {
            scroll-behavior: smooth;
        }

        /* Personaliza la barra de scroll para que combine con tu tema oscuro */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-dark);
        }

        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent);
            /* Se ilumina con tu color azul al pasar el mouse */
        }

        * {
            padding: 0%;
            margin: 0%;
            box-sizing: border-box;
        }

        :root {
            --bg-dark: #0a0e14;
            --nav-bg: rgba(18, 24, 33, 0.8);
            --border-color: rgba(255, 255, 255, 0.1);
            --text-main: #ffffff;
            --text-dim: #94a3b8;
            --dark: #0b0f1a;
            --accent: #58a6ff;
        }

        body {
            background-color: var(--dark);
            color: #fff;
            font-family: 'Inter', system-ui, sans-serif;
            margin: 0;
            min-height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        /* Capas de luz de fondo */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background:
                radial-gradient(circle at 10% 30%, rgba(20, 111, 172, 0.27) 0%, transparent 20%),
                radial-gradient(circle at 90% 60%, rgba(28, 158, 245, 0.27) 0%, transparent 21%),
                radial-gradient(circle at 50% 100%, rgba(56, 18, 92, 0.24) 0%, transparent 18%);
            pointer-events: none;
        }

        /* Fondo de malla (Grid) */
        .grid-bg {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(88, 166, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(88, 166, 255, 0.05) 1px, transparent 1px);
            background-size: 45px 45px;
            z-index: -1;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--dark);
            padding: 10px 90px;
            /* Cambia var(--dark) por un color con transparencia si quieres ver el efecto de cristal */
            background: rgba(11, 15, 26, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            position: sticky;
            /* Hace que el elemento sea pegajoso */
            top: 0;
            /* Define dónde debe pegarse (al borde superior) */
            z-index: 1000;
            /* Asegura que pase POR ENCIMA de las tarjetas y el calendario */
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .logo-img {
            width: 110%;
            height: 70%;
            object-fit: contain;
            display: block;
        }

        .brand-text h1 {
            font-size: 16px;
            margin: 0;
            color: #ffffff;
            font-weight: 600;
        }

        .brand-text span {
            font-size: 12px;
            color: #94a3b8;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-links-container {
            display: flex;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.03);
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--text-main);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border-right: 1px solid var(--border-color);
            transition: background 0.3s;
        }

        .nav-item:last-child {
            border-right: none;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .icon-bg {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            font-size: 12px;
        }

        .green {
            background-color: #4ade80;
        }

        .orange {
            background-color: #fb923c;
        }

        .purple {
            background-color: #a78bfa;
        }

        .toggle-track {
            width: 50px;
            height: 26px;
            background: #1e293b;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            position: relative;
            padding: 2px;
        }

        .toggle-thumb {
            width: 22px;
            height: 22px;
            background: #334155;
            border-radius: 50%;
            position: absolute;
            right: 3px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
        }

        /* cuerpo chatt */
        .workspace-container {
            display: flex;
            gap: 20px;
            height: calc(100vh - 180px);
            /* Ajuste según tu navbar */
        }

        /* Estilos de Paneles */
        .chat-section,
        .editor-section {
            background: rgba(18, 24, 33, 0.6);
            backdrop-filter: blur(15px);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .chat-section {
            flex: 0.35;
        }

        .editor-section {
            flex: 0.65;
        }

        .panel-header {
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.03);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Chat Body */
        .chat-body {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .message {
            padding: 10px 15px;
            border-radius: 12px;
            font-size: 14px;
            max-width: 85%;
            line-height: 1.5;
        }

        .message.bot {
            background: rgba(88, 166, 255, 0.1);
            border: 1px solid rgba(88, 166, 255, 0.2);
            align-self: flex-start;
        }

        .message.user {
            background: var(--accent);
            color: #000;
            font-weight: 500;
            align-self: flex-end;
        }

        /* Editor de Código */
        .code-container {
            flex: 1;
            background: #0d1117;
            position: relative;
        }

        #code-editor {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            color: #e6edf3;
            font-family: 'Fira Code', monospace;
            padding: 20px;
            resize: none;
            outline: none;
            font-size: 15px;
            line-height: 1.6;
        }

        /* Terminal integrada */
        .editor-section .terminal {
            margin: 0;
            border-radius: 0;
            border: none;
            border-top: 1px solid #333;
            max-width: 100%;
        }

        /* Botón Ejecutar con Brillo */
        .run-btn {
            margin-left: auto;
            background: #238636;
            color: white;
            border: none;
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            transition: 0.3s;
        }

        .run-btn:hover {
            background: #2ea043;
            box-shadow: 0 0 15px rgba(46, 160, 67, 0.4);
        }

        .chat-input-area {
            padding: 15px;
            display: flex;
            gap: 10px;
            border-top: 1px solid var(--border-color);
        }

        #user-input {
            flex: 1;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-color);
            padding: 10px;
            border-radius: 8px;
            color: white;
            outline: none;
        }
    </style>
</head>

<body>

    <div class="grid-bg"></div>

    <nav class="navbar">
        <div class="nav-brand">
            <div class="brand-icon">
                <img src="imgs/logo-oicen.png" alt="Logo CEN" class="logo-img">
            </div>
            <div class="brand-text">
                <h1>Campus Virtual OICEN</h1>
                <span>Espacio académico</span>
            </div>
        </div>

        <div class="nav-menu">
            <div class="nav-links-container">
                <a href="index.php" class="nav-item">
                    <span class="icon-bg green">{}</span> INICIO
                </a>
                
                <a href="perfil.php" class="nav-item">
                    <span class="icon-bg purple">▢</span> PERFIL
                </a>
            </div>

            <div class="theme-toggle">
                <div class="toggle-track">
                    <div class="toggle-thumb">
                        <span class="moon-icon">🌙</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>