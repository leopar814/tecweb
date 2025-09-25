<?php 
    // Ejercicio 1
    function esMultiploDe5y7() {
        if(isset($_GET['numero'])) {
            $num = $_GET['numero'];
            if ($num%5 == 0 || $num%7 == 0) {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }

    }

    // Ejercicio 2
    function secuencia3Numeros() {
        $secuencias[][3];
        $secuenciaObtenida = false;
        $fila = 1;
        do {
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

    }


?>
