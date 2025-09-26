<?php 
    // Ejercicio 1
    function esMultiploDe5y7() {
        if(isset($_GET['numEjer1'])) {
            $num = $_GET['numEjer1'];
            if ($num%5 == 0 || $num%7 == 0) {
                echo "<p style='font-size: 18px'><strong>R= El número $num SÍ es múltiplo de 5 y 7</strong></p>";
            }
            else {
                echo "<p style='font-size: 18px'><strong>R= El número $num NO es múltiplo de 5 y 7</strong></p>";
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
        $filas = 0;

        
        do {
            // Ciclo de repetición para cada fila de la matriz
            for($i = 0; $i < 3; $i++) {
                $aleatorio = rand(1, 1000);
                $secuencias[$filas][$i] = $aleatorio;
            }
            
            // Comprobación impar, par, impar
            if (($secuencias[$filas][0] % 2) != 0 && 
                ($secuencias[$filas][1] % 2) == 0 && 
                ($secuencias[$filas][2] % 2) != 0 
            ) {
                $secuenciaObtenida = true;
            }

            $filas++;

        } while (!$secuenciaObtenida);

        // Impresión del arreglo
        foreach($secuencias as $filaIdx => $fila) {
            // Última fila se imprime con color
            if($filaIdx == $filas - 1) {
                foreach($fila as $colIdx => $num) {
                    if ($colIdx == 0 || $colIdx == 2) // primer y último número de azul
                        echo "<span style='color:blue;'>$num </span>";
                    else  // segundo número de rojo
                        echo "<span style='color:red;'>$num </span>";
                }
            // Todas las demás filas se imprimen normal
            } else {
                foreach($fila as $num)
                    echo "<span>$num </span>";
            }
            echo "<br>";
        }

        $numerosObtenidos = $filas * 3; // F filas * 3 números generados 
        echo "<p style='font-size: 18px'><strong>$numerosObtenidos números obtenidos en $filas iteraciones</strong></p>";

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

        echo "<p style='font-size: 18px'><strong>$numAleatorio <em>SÍ</em> es múltiplo de $num</strong></p>";
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
        

        echo '<table 
                border="1" cellspacing="0" cellpadding="5" 
                style="text-align:center; vertical-align:middle;"
                >';
            echo '<tr>';
                echo '<th>Índice</th>';
                echo '<th>Valor</th>';
            echo '</tr>';
            foreach($ASCII as $indice => $caracter) {
                echo "<tr>";
                echo "<td>$indice</td>";
                echo "<td>$caracter</td>";
                echo "</tr>";
            }
        echo '</table>';
    }


?>
