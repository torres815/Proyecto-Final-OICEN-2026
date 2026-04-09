<?php
// Datos mínimos para que no falle la impresión de variables
$usuario = "Elias";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OICEN - Campus Virtual</title>

    <style>
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
            height: 100vh;
            overflow: hidden;
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
            border-bottom: 1px solid var(--border-color);
            backdrop-filter: blur(10px);
            z-index: 10;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 80px;
            height: 80px;
            border-radius: 12px;
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

        /* contenido principal */
        .main-content {
            padding: 90px;
        }

        .hero-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;

        }

        .welcome-text {
            flex: 1;
            margin-bottom: 60px;
            padding-right: 40px;
        }

        .welcome-text h1 {
            font-size: 4rem;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .welcome-text p {
            color: #929090;
        }

        .right-side {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .user-stats {
            background: #a9ceec46;
            padding: 20px;
            border-radius: 10px;
            border-left: 5px solid #088ae0;
        }

        .progress-bar-container {
            background: #dddddd4f;
            border-radius: 20px;
            height: 20px;
            width: 100%;
            margin: 10px 0;
        }

        .progress-fill {
            background: #016ab1;
            height: 100%;
            border-radius: 20px;
            transition: width 0.5s;
        }

        .bottom-buttons {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }

        @keyframes rotarBrillo {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .nav-card {
            flex: 1;
            padding: 40px 20px;
            text-align: center;
            background: linear-gradient(135deg, #001f3f 0%, #00294d 25%, #002635 100%);
            backdrop-filter: blur(5px);
            border-radius: 15px;
            text-decoration: none;
            color: #ffffff;
            transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            overflow: hidden;
            position: relative;
            border: 2px solid transparent;

            /* Agregamos un resplandor exterior suave constante */
            box-shadow: 0 0 15px rgba(0, 116, 217, 0.2);
        }

        .nav-card::before {
            content: '';
            position: absolute;
            width: 220%;
            /* Un poco más grande para asegurar cobertura */
            height: 220%;
            top: -60%;
            left: -60%;

            /* Brillo constante pero suave antes del hover */
            background-image: conic-gradient(transparent,
                    transparent,
                    rgba(255, 255, 255, 0.8),
                    /* Brillo blanco intenso */
                    #00d4ff,
                    /* Azul eléctrico para que sea llamativo */
                    transparent,
                    transparent);

            animation: rotarBrillo 5s linear infinite;

            /* ESTADO INICIAL: Ahora es visible (0.3) para que no esté apagado */
            opacity: 0.3;
            transition: opacity 0.5s ease;
            z-index: 1;
        }

        .nav-card::after {
            content: '';
            position: absolute;
            inset: 2px;
            background: inherit;
            border-radius: 13px;
            z-index: 2;
        }

        /* Contenido siempre visible */
        .nav-card h2,
        .nav-card p {
            position: relative;
            z-index: 3;
            /* Un pequeño sombreado al texto para que resalte más */
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* --- ESTADOS --- */

        .nav-card:hover:not(.locked) {
            transform: translateY(-10px) scale(1.02);
            /* Un pequeño aumento de tamaño */
            background: linear-gradient(225deg, #001830 0%, #002447 25%, #005374 100%);

            /* Glow exterior mucho más potente en Hover */
            box-shadow: 0 0 30px rgba(0, 212, 255, 0.6), 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: rgba(255, 255, 255, 0.1);
        }

        /* Al pasar el mouse, el brillo perimetral se enciende al máximo */
        .nav-card:hover:not(.locked)::before {
            opacity: 1;
            animation-duration: 2s;
            /* El brillo gira más rápido al interactuar */
        }

        /* El parche central debe actualizarse también en hover */
        .nav-card:hover:not(.locked)::after {
            background: linear-gradient(225deg, #001830 0%, #002447 25%, #005374 100%);
        }

        .nav-card.locked {
            background: linear-gradient(135deg, #0a1128 0%, #1c2a4a 100%);
            cursor: not-allowed;
            opacity: 0.5;
        }

        /* Quitamos el brillo animado de las tarjetas bloqueadas */
        .nav-card.locked::before {
            display: none;
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
                <a href="#" class="nav-item">
                    <span class="icon-bg green">{}</span> INICIO
                </a>
                <a href="chatbot.php" class="nav-item">
                    <span class="icon-bg orange">≡</span> CHAT BOT
                </a>
                <a href="#" class="nav-item">
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