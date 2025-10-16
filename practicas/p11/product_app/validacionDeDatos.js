
export function validarProducto(producto) {
    const errores = {
        nombre: "",
        marca: "",
        modelo: "",
        precio: "",
        detalles: "",
        unidades: "",
        imagen: ""
    };

    let valido = true;

    const nombre = (producto.nombre || "").trim();
    const marca = (producto.marca || "").trim();
    const modelo = (producto.modelo || "").trim();
    const precio = parseFloat(producto.precio);
    const detalles = (producto.detalles || "").trim();
    const unidades = parseInt(producto.unidades, 10);
    const imagenOG = (producto.imagen || "").trim();
    const imagenDefecto = "./img/default.png";

    // --- Validaciones ---
    if (nombre === "" || nombre.length > 100) {
        errores.nombre = "Nombre inválido";
        valido = false;
    }

    if (marca === "") {
        errores.marca = "Marca inválida";
        valido = false;
    }

    const modeloRegex = /^[A-Za-z0-9]+$/;
    if (modelo === "" || !modeloRegex.test(modelo) || modelo.length > 25) {
        errores.modelo = "Modelo inválido";
        valido = false;
    }

    if (!Number.isFinite(precio) || precio <= 99.99) {
        errores.precio = "Precio inválido";
        valido = false;
    }

    if (detalles.length > 250) {
        errores.detalles = "Campo detalles inválido";
        valido = false;
    }

    if (!Number.isFinite(unidades) || unidades < 0) {
        errores.unidades = "Campo unidades inválido";
        valido = false;
    }

    errores.imagen = imagenOG === "" ? imagenDefecto : imagenOG;

    return { valido, errores };
}
