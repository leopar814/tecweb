
function holaMundo() {
    var div = document.getElementById('holaMundo');
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

    var div = document.getElementById('variables');
    div.innerHTML = "<p>" + nombre + "<p>";
    div.innerHTML += "<p>" + edad + "<p>";
    div.innerHTML += "<p>" + altura + "<p>";
    div.innerHTML += "<p>" + casado + "<p>";
}

function entradaDeDatos() {
    var nombre = prompt("Nombre:", "");
    var edad = prompt("Edad:", 0);

    var div = document.getElementById('entradaDeDatos');
    div.innerHTML = `<p>Hola ${nombre}, así que tienes ${edad} años</p>`;

}

function prograEstructurada() {
    var valor1 = prompt("Introducir primer número:", "");
    var valor2 = prompt("Introducir segundo número", "");

    var suma = parseInt(valor1) + parseInt(valor2);
    var producto = parseInt(valor1) * parseInt(valor2);

    var div = document.getElementById('prograEstructurada');
    div.innerHTML = `<p>La suma es ${suma}</p>`;
    div.innerHTML += `<p>El producto es ${producto}</p>`;

}

function condicionalSimple() {
    var nombre;
    var nota;
    nombre = prompt("Ingresa tu nombre:", "");
    nota = prompt("Ingresa tu nota:", "");

    var div = document.getElementById('condicionalSimple');
    if (nota >= 4)
         div.innerHTML = `<p>${nombre} está aprobado con un ${nota}</p>`;
}

function condicionalCompuesta() {
    var num1,num2;
    num1 = prompt("Ingresa el primer número:", "");
    num2 = prompt("Ingresa el segundo número:", "");
    num1 = parseInt(num1);
    num2 = parseInt(num2);

    var div = document.getElementById('condicionalCompuesta');

    if (num1 > num2)
        div.innerHTML = `<p>El mayor es: ${num1}</p>`;
    else
        div.innerHTML = `<p>El mayor es: ${num2}</p>`;
}

function condicionalAnidada() {
    var nota1, nota2, nota3;

    nota1 = prompt("Ingresa 1ra. nota:", "");
    nota2 = prompt("Ingresa 2da. nota:", "");
    nota3 = prompt("Ingresa 3ra. nota:", "");

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;
    pro = (nota1 + nota2 + nota3) / 3;

    var div = document.getElementById('condicionalAnidada');
    if (pro >= 7)
        div.innerHTML = "<p>Aprobado</p>";
    else {
        if (pro >= 4)
            div.innerHTML = "<p>Regular</p>";
        else
            div.innerHTML = "<p>Reprobado</p>";
    }
}

function condicionalSwitch() {
    var valor;
    valor = prompt("Ingresar un valor comprendido entre 1 y 5:", "");
    //Convertimos a entero
    valor = parseInt(valor);

    var div = document.getElementById('condicionalSwitch');

    switch (valor) {
        case 1: div.innerHTML = "<p>uno</p>";
                break;
        case 2: div.innerHTML = "<p>dos</p>";
                break;
        case 3: div.innerHTML = "<p>tres</p>";
                break;
        case 4: div.innerHTML = "<p>cuatro</p>";
                break;
        case 5: div.innerHTML = "<p>cinco</p>";
                break;
        default: 
                div.innerHTML = "<p>Debe ingresar un valor comprendido entre 1 y 5</p>";
    }
}

function condicionalSwitch2() {
    var col;
    col = prompt("Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)" , "" );
    var div = document.getElementById('condicionalSwitch2');

    switch (col) {
        case "rojo": document.body.style.backgroundColor = "#ff0000";
                    break;
        case "verde": document.body.style.backgroundColor = "#00ff00";
                    break;
        case "azul": document.body.style.backgroundColor = "#0000ff";
                    break;
        default: div.innerHTML = "<p><b>Ese color no está disponible</b></p>";
    }
}

function sentenciaWhile() {
    var x = 1;

    var div = document.getElementById('sentenciaWhile');

    while (x <= 100) {
        div.innerHTML += `<p>${x}</p>`;
        x = x + 1;
    }   
}

function acumulador() {
    var x = 1;
    var suma = 0;
    var valor;

    var div = document.getElementById('acumulador');

    while (x <= 5){
        valor = prompt("Ingresa el valor:", "");
        valor = parseInt(valor);
        suma = suma + valor;
        x = x + 1;
    }
   div.innerHTML = `<p>La suma de los valores es ${suma}</p>`;
}

function sentenciaDoWhile() {
    var valor;
    do {
        valor = prompt("Ingresa un valor entre 0 y 999:", "");
        valor = parseInt(valor);

        var div = document.getElementById('sentenciaDoWhile');
        div.innerHTML += `<p>El valor ${valor} tiene `;

        if (valor < 10)
            div.innerHTML += "1 dígito";
        else {
            if (valor < 100)
                 div.innerHTML += "2 dígitos";
            else
                 div.innerHTML += "3 dígitos";
        }
        div.innerHTML += "</p>";
    } while(valor != 0);
}

function sentenciaFor() {
    var f;
    var div = document.getElementById('sentenciaFor');

    div.innerHTML = "<p>";
    for(f = 1; f <= 10; f++)
        div.innerHTML += f + " ";
    div.innerHTML += "</p>";
}

function sinFunciones() {
    var div = document.getElementById('sinFunciones');

    div.innerHTML = "<p>Cuidado</p>";
    div.innerHTML += "<p>Ingresa tu documento correctamente</p>";
    div.innerHTML += "<p>Cuidado</p>";
    div.innerHTML += "<p>Ingresa tu documento correctamente</p>";
    div.innerHTML += "<p>Cuidado</p>";
    div.innerHTML += "<p>Ingresa tu documento correctamente</p>";
}

function mostrarMensaje() {
    var div = document.getElementById('conFunciones');

    div.innerHTML += "<p>Cuidado</p>";
    div.innerHTML += "<p>Ingresa tu documento correctamente</p>";
}
function conFunciones() {
    // Se borra lo anterior
    var div = document.getElementById('conFunciones');
    div.innerHTML = "";

    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}

function mostrarRango(x1, x2) {
    var inicio;
    var div = document.getElementById('funcionConParam');

    div.innerHTML = "<p>";
    for(inicio = x1; inicio <= x2; inicio++)
        div.innerHTML += inicio + " ";
    div.innerHTML += "</p>";
}
function funcionConParam() {
    var valor1, valor2;

    valor1 = prompt("Ingresa el valor inferior:", "");
    valor1 = parseInt(valor1);
    valor2 = prompt("Ingresa el valor superior:", "");
    valor2 = parseInt(valor2);

    mostrarRango(valor1, valor2);
}

function convertirCastellano(x) {
    if(x == 1)
        return "uno";
    else
        if(x == 2)
            return "dos";
        else
            if(x == 3)
                return "tres";
            else
                if(x == 4)
                    return "cuatro";
                else
                    if(x == 5)
                        return "cinco";
                    else
                        return "valor incorrecto";
}
function retornoDeValor() {
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);

    var div = document.getElementById('retornoDeValor');
    div.innerHTML = `<p> ${r} </p>`;
}

function convertirCastellanoSwitch(x) {
    switch (x) {
    case 1: return "uno";
    case 2: return "dos";
    case 3: return "tres";
    case 4: return "cuatro";
    case 5: return "cinco";
    default: return "valor incorrecto";
    }
}
function retornoDeValorSwitch() {
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellanoSwitch(valor);

    var div = document.getElementById('retornoDeValorSwitch');
    div.innerHTML = `<p> ${r} </p>`;
}

function limpiar(bloqueDiv){
    if(bloqueDiv == "condicionalSwitch2")
        document.body.style.backgroundColor = "#ffffff";
    var div = document.getElementById(bloqueDiv);
    div.innerHTML = "";

}