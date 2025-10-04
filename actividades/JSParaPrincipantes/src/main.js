
function holaMundo() {
    var div = document.getElementById("holaMundo");
    div.innerHTML = "<p>Hola mundo<p>";
}

function variables() {
    var nombre = "Juan";
    var edad = 10
    ;
    var altura = 1.92
    ;
    var casado = false
    ;

    var div = document.getElementById("variables");
    div.innerHTML = "<p>" + nombre + "<p>";
    div.innerHTML += "<p>" + edad + "<p>";
    div.innerHTML += "<p>" + altura + "<p>";
    div.innerHTML += "<p>" + casado + "<p>";
}

function entradaDeDatos() {
    var nombre = prompt("Nombre: ", "");

    var edad = prompt("Edad: ", 0);

    var div = document.getElementById('entradaDeDatos');
    div.innerHTML = '<p>Hola ' + nombre + ', así que tienes ' + edad + ' años<p>';

}

