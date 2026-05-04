<?php
// Datos mínimos para que no falle la impresión de variables
$usuario = "Elias";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OICEN - niveles</title>

    <style>
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

        /* Terminal */
        .terminal {
            background: #000;
            border: 1px solid #333;
            border-radius: 10px;
            width: 100%;
            max-width: 800px;
            margin: 50px auto;
            overflow: hidden;
        }

        .term-bar {
            background: #161b22;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .r {
            background: #ff5f56;
        }

        .y {
            background: #ffbd2e;
        }

        .g {
            background: #27c93f;
        }

        .term-body {
            padding: 15px;
            font-family: monospace;
            font-size: 1.1rem;
            min-height: 100px;
        }

        .prompt {
            color: #2ecc71;
        }

        .term-name {
            font-size: 12px;
            color: var(--text-dim);
            font-family: monospace;
        }

        .blink {
            animation: blink-animation 1s steps(2, start) infinite;
            color: var(--accent);
            font-weight: bold;
        }

        @keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }

        /* cuerpo niveles */
        /* Contenedor del Mapa */
        /* --- Contenedor de la Ruta --- */
        .level-map-container {
            max-width: 1000px;
            margin: 80px auto;
            padding: 0 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* --- Badge de Lección (Estilo dibujo) --- */
        .lesson-header-badge {
            background: rgba(167, 139, 250, 0.05);
            border: 2px solid #a78bfa;
            border-radius: 20px;
            padding: 25px 50px;
            text-align: center;
            box-shadow: 0 0 30px rgba(167, 139, 250, 0.2);
            margin-bottom: 80px;
            position: relative;
            z-index: 10;
        }

        .lesson-title-main {
            font-size: 2.5rem;
            color: #ffffff;
            margin: 0;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        /* --- El Camino (Path) --- */
        .path-container {
            display: flex;
            flex-direction: column;
            gap: 80px;
            /* Separación vertical exacta entre niveles */
            position: relative;
            width: 100%;
            max-width: 600px;
        }

        .dotted-path {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background-image: linear-gradient(to bottom, var(--accent) 50%, transparent 50%);
            background-size: 2px 25px;
            opacity: 0.25;
            z-index: 1;
        }

        /* --- Nodos de Nivel --- */
        .level-node {
            width: 85px;
            height: 85px;
            background: #0d1117;
            /* Fondo oscuro sólido para resaltar */
            border: 2px solid var(--border-color);
            border-radius: 22px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-dim);
            transition: all 0.3s ease;
            z-index: 5;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        /* --- Lógica de Posicionamiento --- */
        .align-center-path {
            align-self: center;
        }

        .align-side-left {
            align-self: flex-start;
            margin-left: 5%;
        }

        .align-side-right {
            align-self: flex-end;
            margin-right: 5%;
        }

        /* --- Estados Dinámicos --- */

        /* Completado (Verde Ratatype) */
        .level-node.completed {
            border-color: #4ade80;
            color: #4ade80;
            background: rgba(74, 222, 128, 0.02);
        }

        /* Actual (Brillo Azul Neón) */
        .level-node.current {
            color: #fff;
            border: none;
            overflow: hidden;
        }

        .level-node.current::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: conic-gradient(transparent, var(--accent), transparent);
            animation: rotarBrillo 3s linear infinite;
        }

        .level-node.current::after {
            content: attr(data-level);
            position: absolute;
            inset: 3px;
            background: #0d1117;
            border-radius: 19px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3;
        }

        /* Bloqueado */
        .level-node.locked {
            opacity: 0.4;
            cursor: not-allowed;
            filter: grayscale(1);
        }

        /* Meta Final */
        .meta-icon {
            font-size: 1.8rem;
            filter: drop-shadow(0 0 5px white);
        }

        /* Interacción */
        .level-node:hover:not(.locked) {
            transform: translateY(-10px) scale(1.1);
            border-color: #fff;
            color: #fff;
            box-shadow: 0 15px 40px rgba(88, 166, 255, 0.2);
        }



        /* --- Contenedor Acordeón --- */
.accordion-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s cubic-bezier(0, 1, 0, 1);
}

.accordion-content.active {
    max-height: 2000px; /* Suficiente para los 10 niveles */
    transition: max-height 1s ease-in-out;
}

.lesson-header-badge {
    cursor: pointer;
    transition: transform 0.2s;
    user-select: none;
}

.lesson-header-badge:active { transform: scale(0.98); }

/* --- Ajuste de Separación Vertical --- */
.path-container {
    display: flex;
    flex-direction: column;
    gap: 40px; /* Reducido de 80px a 40px como pediste */
    padding: 30px 0;
}

.unlock-info {
    font-size: 12px;
    color: var(--accent);
    margin-top: 10px;
    display: block;
    font-family: monospace;
}

/* El resto del CSS de .level-node se mantiene igual al anterior */
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
                <a href="chatbot.php" class="nav-item">
                    <span class="icon-bg orange">≡</span> CHAT BOT
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