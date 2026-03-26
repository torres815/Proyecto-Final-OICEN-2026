<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OICEN</title>

    <style>
        :root {
            --azul-marino-oscuro: #303854;
            --azul-marino-medio: #c2cdd5;
            --azul-claro: #f6f3ea;
            --texto-oscuro: #333333;
            --texto-gris: #666666;
            --texto-institucional: #e0f2f1;
            --blanco: #ffffff;
            --borde: #e0e0e0;
        }

        * {
            padding: 0%;
            margin: 0%;
        }

        body {
            background-color: var(--azul-claro);

        }

        .cabeza {
            background-color: var(--azul-claro);
            margin: 0.5%;
            display: flex;
            justify-content: space-between;
        }

        .options {
            display: flex;
            justify-content: space-between;
        }

        /* index */

        .cont-prin {
            background-color: var(--azul-marino-medio);
            padding: 18%;
            text-align: center;
        }

        .interativo {
            display: flex;
            justify-content: center;
            /* Centra los dos bloques de progreso horizontalmente */
            gap: 20px;
            /* Espacio entre los dos bloques */
            padding: 100px;
        }

        .progreso {
            display: flex;
            flex-direction: column;
            /* Alinea los elementos (img y button) uno arriba del otro */
            align-items: center;
            /* Centra horizontalmente la imagen y el botón */
            text-align: center;
            gap: 10px;
            /* Espacio entre la imagen y el botón */
        }

        .progreso img {
            width: 100px;
            /* Ajusta el tamaño según necesites */
            height: auto;
            display: block;
        }

        .progreso button {
            padding: 8px 16px;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <div class="cabeza"> <!-- cabecera -->
        <div> <!-- logo de iocen a la izquierda -->
            <img src="" alt="logo">
        </div>

        <div class="options"> <!-- opciones del menu -->
            <div>
                <a href="" style="margin: 10px;">inicio</a>
            </div>

            <div>
                <a href="" style="margin: 10px;">chat</a>
            </div>

            <div>
                <a href="" style="margin: 10px;">perfil</a>
            </div>
        </div>
    </div>