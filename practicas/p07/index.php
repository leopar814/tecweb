<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        require_once 'src/funciones.php';
        esMultiploDe5y7();
    ?>
    <hr>

    <h2>Ejercicio 2</h2>
    <p>
        Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia compuesta por: <br><br>
        <span><b style="color:blue">impar</b> <b style="color:red">par</b> <b style="color:blue">impar</b></span>
    </p>
    <?php
        // Agregar botón
        secuenciaDe3Numeros();
    ?>
    <hr>

    <h2>Ejercicio 3</h2>
    <p>
        Encontrar el primero número entero obtenido aleatoriamente pero que además sea múltiplo de un 
        número dado
    </p>
    <?php
        // echo "<p>Con While</p>";
        multiploDeNumeroDado();
        // echo "<p>Con Do-While</p>";
        // multiploDeNumeroDado_doWhile();
    ?>
    <hr>

    <h2>Ejercicio 4</h2>
    <p>
        Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
        a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
        el valor en cada índice
    </p>
    <table 
        border="1" cellspacing="0" cellpadding="5" 
        style="text-align:center; vertical-align:middle;"
    >
            <tr>
                <th>índice</th>
                <th>Valor</th>
            </tr>
        <?php
            $ASCII = codigoASCII();
            foreach($ASCII as $indice => $caracter) {
                echo "<tr>";
                echo "<td>$indice</td>";
                echo "<td>$caracter</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <hr>

    <h2>Ejercicio 5</h2>





<!-- 
    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p07/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        // if(isset($_POST["name"]) && isset($_POST["email"]))
        // {
        //     echo $_POST["name"];
        //     echo '<br>';
        //     echo $_POST["email"];
        // }
    ?> -->
</body>
</html>