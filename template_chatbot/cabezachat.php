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

*{
    padding:0;
    margin:0;
    box-sizing:border-box;
}

:root{
    --bg-dark:#0a0e14;
    --nav-bg:rgba(18,24,33,0.8);
    --border-color:rgba(255,255,255,0.08);
    --text-main:#ffffff;
    --text-dim:#94a3b8;
    --dark:#0b0f1a;
    --accent:#58a6ff;
}

body{
    background-color:var(--dark);
    color:#fff;
    font-family:'Inter',system-ui,sans-serif;
    margin:0;
    height:100vh;
    overflow:hidden;
    display:flex;
    flex-direction:column;
}


/* =========================================
   FONDO
========================================= */

body::before{
    content:"";
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    z-index:-1;

    background:
        radial-gradient(circle at 10% 30%, rgba(20,111,172,.27) 0%, transparent 20%),
        radial-gradient(circle at 90% 60%, rgba(28,158,245,.27) 0%, transparent 21%),
        radial-gradient(circle at 50% 100%, rgba(56,18,92,.24) 0%, transparent 18%);
}

.grid-bg{
    position:fixed;
    inset:0;

    background-image:
        linear-gradient(rgba(88,166,255,.05) 1px, transparent 1px),
        linear-gradient(90deg, rgba(88,166,255,.05) 1px, transparent 1px);

    background-size:45px 45px;
    z-index:-1;
}


/* =========================================
   NAVBAR
========================================= */

.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;

    background:var(--dark);

    padding:10px 90px;

    border-bottom:1px solid var(--border-color);

    backdrop-filter:blur(10px);

    z-index:10;
}

.nav-brand{
    display:flex;
    align-items:center;
    gap:12px;
}

.brand-icon{
    width:80px;
    height:80px;
    border-radius:12px;

    display:flex;
    justify-content:center;
    align-items:center;

    overflow:hidden;
}

.logo-img{
    width:110%;
    height:70%;
    object-fit:contain;
    display:block;
}

.brand-text h1{
    font-size:16px;
    margin:0;
    color:#fff;
    font-weight:600;
}

.brand-text span{
    font-size:12px;
    color:#94a3b8;
}

.nav-menu{
    display:flex;
    align-items:center;
    gap:20px;
}

.nav-links-container{
    display:flex;

    border:1px solid var(--border-color);

    border-radius:12px;

    overflow:hidden;

    background:rgba(255,255,255,.03);
}

.nav-item{
    display:flex;
    align-items:center;

    padding:12px 20px;

    color:var(--text-main);

    text-decoration:none;

    font-size:14px;

    font-weight:600;

    border-right:1px solid var(--border-color);

    transition:.3s;
}

.nav-item:last-child{
    border-right:none;
}

.nav-item:hover{
    background:rgba(255,255,255,.05);
}


/* =========================================
   ICONOS
========================================= */

.icon-bg{
    width:24px;
    height:24px;

    border-radius:6px;

    display:flex;
    justify-content:center;
    align-items:center;

    margin-right:10px;

    font-size:12px;
}

.green{
    background:#4ade80;
}

.orange{
    background:#fb923c;
}

.purple{
    background:#a78bfa;
}


/* =========================================
   TOGGLE
========================================= */

.toggle-track{
    width:50px;
    height:26px;

    background:#1e293b;

    border:1px solid var(--border-color);

    border-radius:20px;

    position:relative;

    padding:2px;
}

.toggle-thumb{
    width:22px;
    height:22px;

    background:#334155;

    border-radius:50%;

    position:absolute;
    right:3px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:12px;
}


/* =========================================
   MAIN
========================================= */

.main-content{
    width:100%;
    height:calc(100vh - 90px);

    display:flex;
    justify-content:center;
    align-items:center;

    padding:25px 40px;
}


/* =========================================
   WORKSPACE
========================================= */

.workspace-container{
    width:100%;
    max-width:1450px;
    height:92%;

    display:flex;
    gap:25px;

    justify-content:center;
    align-items:stretch;
}


/* =========================================
   PANELS
========================================= */

.chat-section,
.compiler-section{
    background:rgba(18,24,33,.72);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.06);

    border-radius:24px;

    overflow:hidden;

    box-shadow:
        0 10px 40px rgba(0,0,0,.35),
        inset 0 1px 0 rgba(255,255,255,.03);
}


/* =========================================
   CHAT
========================================= */

.chat-section{
    width:360px;
    min-width:360px;

    display:flex;
    flex-direction:column;
}


/* =========================================
   COMPILADOR
========================================= */

.compiler-section{
    flex:1;

    display:flex;
    flex-direction:column;
}


/* =========================================
   PANEL HEADER
========================================= */

.panel-header{
    height:72px;

    padding:0 22px;

    display:flex;
    align-items:center;

    gap:12px;

    background:rgba(255,255,255,.03);

    border-bottom:1px solid rgba(255,255,255,.06);
}

.panel-header h3{
    font-size:20px;
    font-weight:700;
}


/* =========================================
   CHAT BODY
========================================= */

.chat-body{
    flex:1;

    padding:22px;

    overflow-y:auto;

    display:flex;
    flex-direction:column;

    gap:16px;
}


/* =========================================
   MENSAJES
========================================= */

.message{
    max-width:85%;

    padding:14px 16px;

    border-radius:18px;

    font-size:14px;

    line-height:1.7;

    word-wrap:break-word;

    animation:fadeIn .25s ease;
}

.message.bot{
    align-self:flex-start;

    background:rgba(88,166,255,.10);

    border:1px solid rgba(88,166,255,.18);

    color:#e2e8f0;

    border-bottom-left-radius:6px;
}

.message.user{
    align-self:flex-end;

    background:linear-gradient(
        135deg,
        #58a6ff,
        #7c3aed
    );

    color:white;

    border-bottom-right-radius:6px;

    box-shadow:
        0 5px 20px rgba(88,166,255,.25);
}


/* =========================================
   CHAT INPUT
========================================= */

.chat-input-area{
    padding:18px;

    display:flex;

    gap:12px;

    border-top:1px solid rgba(255,255,255,.06);

    background:rgba(255,255,255,.02);
}

.chat-input-area textarea{
    flex:1;

    height:55px;

    background:#0f172a;

    border:1px solid rgba(255,255,255,.06);

    border-radius:14px;

    padding:15px;

    color:white;

    resize:none;

    outline:none;

    font-size:14px;

    font-family:inherit;
}

.chat-input-area textarea:focus{
    border-color:#58a6ff;
}

.send-btn{
    min-width:95px;

    border:none;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        #58a6ff,
        #7c3aed
    );

    color:white;

    font-weight:700;

    cursor:pointer;

    transition:.3s;
}

.send-btn:hover{
    transform:translateY(-2px);

    box-shadow:
        0 8px 20px rgba(88,166,255,.25);
}


/* =========================================
   COMPILER CONTAINER
========================================= */

.compiler-container{
    flex:1;

    display:flex;
    flex-direction:column;

    padding:20px;

    gap:18px;
}


/* =========================================
   CODE EDITOR
========================================= */

#code-editor{
    flex:1;

    width:100%;

    min-height:480px;

    background:#020617;

    border:1px solid rgba(255,255,255,.06);

    border-radius:20px;

    padding:28px;

    color:#e2e8f0;

    resize:none;

    outline:none;

    font-family:'Fira Code', monospace;

    font-size:15px;

    line-height:1.8;

    box-shadow:
        inset 0 0 25px rgba(0,0,0,.45);
}


/* =========================================
   RUN BUTTON
========================================= */

#run-code-btn{
    height:58px;

    border:none;

    border-radius:16px;

    background:linear-gradient(
        135deg,
        #7c3aed,
        #9333ea
    );

    color:white;

    font-size:15px;

    font-weight:700;

    cursor:pointer;

    transition:.3s;

    box-shadow:
        0 8px 30px rgba(124,58,237,.30);
}

#run-code-btn:hover{
    transform:translateY(-2px);

    box-shadow:
        0 12px 35px rgba(124,58,237,.45);
}


/* =========================================
   RESULTADO
========================================= */

#judge-result{
    background:#020617;
    border-radius:15px;
    padding:20px;

    height:180px;

    overflow-y:auto;

    border:1px solid rgba(255,255,255,0.05);

    scrollbar-width:thin;
}

#judge-result::-webkit-scrollbar{
    width:6px;
}

#judge-result::-webkit-scrollbar-thumb{
    background:#334155;
    border-radius:10px;
}

/* =========================================
   ESTADOS
========================================= */

.judge-status{
    font-size:15px;
    line-height:1.8;
}

.waiting{
    color:#94a3b8;
}

.running{
    color:#38bdf8;
}

.success{
    color:#22c55e;
}

.error{
    color:#ef4444;
}


/* =========================================
   SCROLL
========================================= */

.chat-body::-webkit-scrollbar,
#code-editor::-webkit-scrollbar{
    width:8px;
}

.chat-body::-webkit-scrollbar-thumb,
#code-editor::-webkit-scrollbar-thumb{
    background:rgba(255,255,255,.10);
    border-radius:20px;
}


/* =========================================
   ANIMATION
========================================= */

@keyframes fadeIn{

    from{
        opacity:0;
        transform:translateY(10px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}


/* =========================================
   RESPONSIVE
========================================= */

@media(max-width:1200px){

    .workspace-container{
        flex-direction:column;
        height:auto;
    }

    .chat-section{
        width:100%;
        min-width:auto;
    }

    .compiler-section{
        width:100%;
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