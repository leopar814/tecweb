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
    <hr>

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

            echo "<p>\$a = $a </p>";
            echo "<p>\$b = $b </p>";
            echo "<p>\$c = $c </p>";

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
            echo "<p>\$a = $a </p>";
            echo "<p>\$b = $b </p>";
            echo "<p>\$c = $c </p>";

            unset($b, $c); // se elimina variables para evitar futuras referencias 
        ?>
        <li>Describe en y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones</li>
        <p>
            Al establecer la referencia de $b=&$a, hace que que la variable b muestre lo mismo 
            que la variable a. También, antes se hizo la referencia $c=&$a, provocando el mismo resultado.<br>
            Por esta razón las 3 variables contienen el mismo valor.
        </p>
    </ol>
    <hr>

    <h2>Ejercicio 3</h2>
    <p>
        Muestra el contenido de cada variable inmediatamente después de cada asignación,
        verificar la evolución del tipo de estas variables (imprime todos los componentes de los
        arreglo):
    </p>
    <p>
        $a = "PHP5";<br>
        $z[] = &$a;<br>
        $b = "5a version de PHP";<br>
        $c = $b*10;<br>
        $a .= $b;<br>
        $b *= $c;<br>
        $z[0] = "MySQL";        
    </p>
    <?php
        $a = "PHP5";
        echo '<ul>';
        echo "<li>\$a = $a </li>";
        $z[] = &$a;
        echo '<li>$z[]='; print_r($z) ; echo '</li>';
        $b = "5a version de PHP";
        echo "<li>\$b = $b </li>";
        @$c = $b*10;
        echo "<li>\$c = $c </li>";;
        $a .= $b;
        echo "<li>\$a = $a </li>";
        @$b *= $c;
        echo "<li>\$b = $b </li>";
        $z[0] = "MySQL"; 
        echo "<li>\$z[0]= $z[0] </li>";
        echo '</ul>';
    ?>
    <hr>

    <h2>Ejercicio 4</h2>
    <p>
        Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de 
        la matriz $GLOBALS o del modificador global de PHP.
    </p>
    <?php
        echo '<ul>';
            echo '<li>$a=' . $GLOBALS['a'] . '</li>';
            echo '<li>$z[]='; print_r($GLOBALS['z']) ; echo '</li>';
            echo '<li>$b=' . $GLOBALS['b'] . '</li>';
            echo '<li>$c=' . $GLOBALS['c'] . '</li>';
            echo '<li>$z[0]=' . $GLOBALS['z'][0] . '</li>';
        echo '</ul>';

        unset($z)
    ?>
    <hr>

    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>
    <p>
        $a = “7 personas”; <br>
        $b = (integer) $a; <br>
        $a = “9E3”;<br>
        $c = (double) $a;
    </p>

    <?php
        $a = "7 personas";
        $b = (integer) $a;
        $a = "9E32";
        $c = (double) $a;

        echo '<ul>';
            echo "<li>\$a = $a</li>";
            echo "<li>\$b = $b</li>";
            echo "<li>\$c = $c</li>";
        echo '</ul>';

    ?>
    <hr>

    <h2>Ejercicio 6</h2>
    <p>
        $a = “0”;<br>
        $b = “TRUE”;<br>
        $c = FALSE;<br>
        $d = ($a OR $b);<br>
        $e = ($a AND $c);<br>
        $f = ($a XOR $b);
    </p>
    <p>
        Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
        usando la función var_dump(<datos>).
    </p>
    <?php
        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);

        echo '<span>$a = </span>'; var_dump((bool)$a); echo '<br>';
        echo '<span>$b = </span>'; var_dump((bool)$b); echo '<br>';
        echo '<span>$c = </span>'; var_dump($c); echo '<br>';
        echo '<span>$d = </span>'; var_dump($d); echo '<br>';
        echo '<span>$e = </span>'; var_dump($e); echo '<br>';
        echo '<span>$e = </span>'; var_dump($f); echo '<br>';
    ?>
    <p>
        Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
        en uno que se pueda mostrar con un echo
    </p>

    <?php
        echo '<span>$c = </span>'; echo var_export($c); echo '<br>';
        echo '<span>$e = </span>'; echo var_export($e); echo '<br>';
    ?>
    <hr>

    <h2>Ejercicio 7</h2>
    <p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>
    <ol>
        <li>La versión de Apache y PHP,</li>
        <li>El nombre del sistema operativo (servidor),</li>
        <li>El idioma del navegador (cliente).</li>
    </ol>

    <?php
        echo '<ul>';
        echo '<li>Apache y PHP: ' . $_SERVER['SERVER_SOFTWARE'] . '</li>';
        echo '<li>SO: ' . php_uname() . '</li>';
        echo '<li>Idioma del navegador: ' . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . '</li>';

        echo '</ul>';
    ?>
    



</body>
</html>