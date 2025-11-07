
function validarCampo(campo, valor) {
    let response = { status: "ok", message: "" };

    switch(campo) {
        // -------------------------
        case 'nombre':
            if (valor === "" || valor.length > 100) {
                response = {
                    status: "error",
                    message: "Nombre inválido"
                };
            }
            break;

        // -------------------------
        case 'marca':
            if (valor === "") {
                response = {
                    status: "error",
                    message: "Marca inválida"
                };
            }
            break;

        // -------------------------
        case 'modelo':
            const modeloRegex = /^[A-Za-z0-9]+$/;
            if (valor === "" || !modeloRegex.test(valor) || valor.length > 25) {
                response = {
                    status: "error",
                    message: "Modelo inválido"
                };
            }
            break;

        // -------------------------
        case 'precio':
            let precioNum = parseFloat(valor);
            if (!Number.isFinite(precioNum) || precioNum <= 99.99) {
                response = {
                    status: "error",
                    message: "Precio inválido"
                };
            }
            break;

        // -------------------------
        case 'detalles':
            if (valor.length > 250) {
                response = {
                    status: "error",
                    message: "Detalles demasiado largos"
                };
            }
            break;

        // -------------------------
        case 'unidades':
            let unidadesNum = Number(valor);
            if (!Number.isFinite(unidadesNum) || unidadesNum < 0) {
                response = {
                    status: "error",
                    message: "Unidades inválida"
                };
            }
            break;
    }

    return response;
}

// Validación del JSON completo
function validarProducto(producto) {
    let errores = [];

    for (let campo in producto) {
        let resultado = validarCampo(campo, producto[campo]);

        if (resultado.status === "error") {
            errores.push(`${campo}: ${resultado.message}`);
        }
    }

    // Si hay errores, mostrarlos en la barra de estado
    if (errores.length > 0) {
        mostrarErroresEnBarra(errores);
        return false;
    }
    return true;
}

// Barra de estado
let erroresAcumulados = [];

function mostrarErroresEnBarra(erroresArray) {

    // Agregar los nuevos errores SIN perder los anteriores
    erroresArray.forEach(err => {
        if (!erroresAcumulados.includes(err)) {
            erroresAcumulados.push(err);
        }
    });

    // Reconstruir la lista completa
    let html = "";
    erroresAcumulados.forEach(err => {
        html += `<li style="color: red; list-style:none;">${err}</li>`;
    });

    $("#product-result").show();
    $("#container").html(html);
}


// Validación después de perder el foco de c/ campo
$(document).ready(function(){
    // Validación simple en cuanto se sale del campo (on blur)
    $("#name, #marca, #modelo, #precio, #unidades, #detalles").on("blur", function(){
        const campo = this.id === "name" ? "nombre" : this.id;
        const valor = $(this).val();
        const resultado = validarCampo(campo, valor);

        if (resultado.status === "error") {
            mostrarErroresEnBarra([`${campo}: ${resultado.message}`]);
        }
    });

    
});
