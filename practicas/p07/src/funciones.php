<?php 
    // Ejercicio 1
    function esMultiploDe5y7() {
        if(isset($_GET['numEjer1'])) {
            $num = $_GET['numEjer1'];
            if ($num%5 == 0 || $num%7 == 0) {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else {
                echo "<p style='font-size: 18px'>R= El número $num NO es múltiplo de 5 y 7.</p>";
            }
        } else {
            echo '<p><i>Error en GET</i></p>';
            return;
        }

    }

    // Ejercicio 2
    function secuenciaDe3Numeros() {
        $secuencias = []; // matriz de Fx3
        $secuenciaObtenida = false;
        $fila = 0;

        
        do {
            // Ciclo de repetición para cada fila de la matriz
            for($i = 0; $i < 3; $i++) {
                $aleatorio = rand(1, 1000);
                $secuencias[$fila][$i] = $aleatorio;
            }
            
            // Comprobación impar, par, impar
            if (($secuencias[$fila][0] % 2) != 0 && 
                ($secuencias[$fila][1] % 2) == 0 && 
                ($secuencias[$fila][2] % 2) != 0 
            ) {
                $secuenciaObtenida = true;
            }

            $fila++;

        } while (!$secuenciaObtenida);

        $numerosObtenidos = $fila * 3; // F filas * 3 números generados 

        echo "<p>$numerosObtenidos números obtenidos en $fila iteraciones</p>";

    }

    // Ejercicio 3
    function multiploDeNumeroDado() {
        if(isset($_GET['numEjer3'])) {
            $num = $_GET['numEjer3'];
            echo "<p><b>Número obtenido: $num</b></p>";
        }
        else {
            echo '<p><i>Error en GET</i></p>';
            return;
        }
    
        $numAleatorio = rand(1, 1000);
        echo "<p>Número generado: $numAleatorio</p>";

        while ($numAleatorio%$num != 0) {
            $numAleatorio = rand(1, 1000);
            echo "<p>Número generado: $numAleatorio</p>";
        }

        echo "<p style='font-size: 18px'>$numAleatorio <em>SÍ</em> es múltiplo de $num</p>";
    }

    function multiploDeNumeroDado_doWhile() {
        if(isset($_GET['numEjer3'])) {
            $num = $_GET['numEjer3'];
            echo "<p><b>Número obtenido: $num</b></p>";
        }
        else {
            echo '<p><i>Error en GET</i></p>';
            return;
        }

        do {
            $numAleatorio = rand(1, 1000);
            echo "<p>Número generado: $numAleatorio</p>";
        } while ($numAleatorio%$num != 0);

        echo "<p style='font-size: 18px'>$numAleatorio <em>SÍ</em> es múltiplo de $num</p>";
    }

    function codigoASCII(){
        $ASCII = []; // Índices de 97 a 122 para caracteres ASCII 

        for($i = 97; $i <= 122; $i++)
            $ASCII[$i] = chr($i);
        
        return $ASCII;
    }


?>
