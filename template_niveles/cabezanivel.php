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