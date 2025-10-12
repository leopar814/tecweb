// Escucha el evento "submit" del formulario
document.getElementById("formulario").addEventListener("submit", event => {
    const formulario = event.target;
    event.preventDefault();
    let formularioValido = true;
    
    const errores = document.getElementById("entradas").querySelectorAll(".error");
    errores.forEach(error => error.textContent = ""); // Se limpian los errores

     // Se obtienen todos los valores del formulario
    const data = new FormData(formulario);

    // Se acceden a través del atributo name de c/ input
    const nombre = (data.get("nombre") || "").trim();
    const marca = (data.get("marca") || "").trim();
    const modelo = (data.get("modelo") || "").trim();
    const precio = parseFloat(data.get("precio"));
    const detalles = (data.get("detalles") || "").trim();
    const unidades = parseInt(data.get("unidades"), 10);
    const imagenOG = (data.get("imagen") || "").trim();

    // Validaciones (si alguno no es válido, se bloquea el envío)
    if(nombre == "" || nombre.length > 100) {
        errores[0].textContent = "Nombre inválido";
        formularioValido = false;
    }
    
    if(marca == "") { // Revisar
        errores[1].textContent = "Marca inválida";
        formularioValido = false;        
    }

    const modeloRegex = /^[A-Za-z0-9]+$/; // Regex para texto alfanumérico
    if(modelo == "" || !modeloRegex.test(modelo) || modelo.length > 25) {
        errores[2].textContent = "Modelo inválido";
        formularioValido = false;
    }

    if(!Number.isFinite(precio) || precio <= 99.99) {
        errores[3].textContent = "Precio inválido";
        formularioValido = false;
    }


    if(detalles.length > 250) { // Revisar la opción de opcional
        errores[4].textContent = "Campo detalles inválido";
        formularioValido = false;
    }

    if(!Number.isFinite(unidades) || unidades < 0) {
        errores[5].textContent = "Campo unidades inválido";
        formularioValido = false;
    }

    const imagenInput = formulario.querySelector('[name="imagen"]');
    const imagenDefecto = "./img/default.png";
    
    imagenInput.value = imagenOG == "" ? imagenDefecto : imagenOG;  

    if(formularioValido)
        formulario.submit();

});
