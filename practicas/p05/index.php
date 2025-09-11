<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 5</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
    ?>

    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c como sigue:</p>
    <p> 
        $a = “ManejadorSQL”;<br>
        $b = 'MySQL’;<br>
        $c = &$a;
    </p>
    <ol>
        <li>Ahora muestra el contenido de cada variable</li>
        <?php
            $a = "ManejadorSQL";
            $b = "MySQL";
            $c = &$a;

            echo '<p>$a=' .  $a . '</p>';
            echo '<p>$b=' .  $b . '</p>';
            echo '<p>$c=' .  $c . '</p>';

        ?>
        <li>Agrega al código actual las siguientes asignaciones:</li>
        <p> 
            $a = “PHP server”;<br>
            $b = &$a;
        </p>
        <li>Vuelve a mostrar el contenido de cada uno</li>
        <?php
            $a = "PHP server";
            $b = &$a;
            echo '<p>$a=' .  $a . '</p>';
            echo '<p>$b=' .  $b . '</p>';
            echo '<p>$c=' .  $c . '</p>';
        ?>
        <li>Describe en y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones</li>
        <p>
            Al establecer la referencia de $b=&$a, hace que que la variable b muestre lo mismo 
            que la variable a. También, antes se hizo la referencia $c=&$a, provocando el mismo resultado.<br>
            Por esta razón las 3 variables contienen el mismo valor.
        </p>
    </ol>

    <h2>Ejercicio 3</h2>
    <p>
        Muestra el contenido de cada variable inmediatamente después de cada asignación,
        verificar la evolución del tipo de estas variables (imprime todos los componentes de los
        arreglo):
    </p>
    <p>
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a version de PHP";
        $c = $b*10;
        $a .= $b;
        $b *= $c;
        $z[0] = "MySQL";        
    </p>


</body>
</html>