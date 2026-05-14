<script>

document
.getElementById("run-code-btn")
.addEventListener("click", async () => {

    const code =
        document.getElementById("code-editor").value;

    const resultBox =
        document.getElementById("judge-result");


    /* =========================================
       VALIDAR VACÍO
    ========================================= */

    if(code.trim() === ""){

        resultBox.innerHTML = `
            <div class="judge-status error">

                ⚠️ Escribí un código primero.

            </div>
        `;

        return;
    }


    /* =========================================
       ESTADO CARGANDO
    ========================================= */

    resultBox.innerHTML = `
        <div class="judge-status running">

            ⏳ Compilando código...

        </div>
    `;


    try {

        const response = await fetch(
            "run_code.php",
            {

                method: "POST",

                headers: {
                    "Content-Type": "application/json"
                },

                body: JSON.stringify({
                    code: code
                })

            }
        );


        /* =========================================
           VALIDAR RESPUESTA
        ========================================= */

        if(!response.ok){

            throw new Error("Error HTTP");
        }


        const data = await response.json();


        /* =========================================
           SI COMPILA
        ========================================= */

        if (data.success) {

            resultBox.innerHTML = `
                <div class="judge-status success">

                    ✅ Código correcto.<br><br>

                    Puedes continuar al siguiente ejercicio 🚀

                </div>
            `;

        }


        /* =========================================
           SI HAY ERROR
        ========================================= */

        else {

            resultBox.innerHTML = `
                <div class="judge-status error">

                    ❌ Error detectado<br><br>

                    ${data.message}

                </div>
            `;
        }

    }


    /* =========================================
       ERROR GENERAL
    ========================================= */

    catch (error) {

        resultBox.innerHTML = `
            <div class="judge-status error">

                ❌ Error del servidor.<br><br>

                Verifica:
                <br><br>

                • run_code.php<br>
                • conexión a internet<br>
                • Judge0 API<br>
                • errores PHP

            </div>
        `;

        console.error(error);
    }

});

</script>

</body>
</html>