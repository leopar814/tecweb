<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parque vehicular</title>
</head>
<body>
    <?php 
        $vehiculosDB = require_once 'data/vehiculosDB.php'; // arreglo completo de vehículos
        $vehiculos = []; // vehículos a mostrar 

        if(isset($_POST['consulta']) && isset($_POST['matricula'])) {
            $consulta = $_POST['consulta'];
            if($_POST['matricula'] == "" && $_POST['consulta'] == "Consultar"){
                echo "<p style='font-size:18px;'><b>Ingresa una matrícula válida<b></p>";
                return;
            } else 
                $matricula = $_POST['matricula'];
        }
        else 
            echo '<p">Error en POST</p>';

        // Dependiendo del tipo del Submit, se muestra 1 vehículo o todos
        if($consulta == 'Consultar') 
            $vehiculos = [$matricula => $vehiculosDB[$matricula]]; // se fuerza la misma estructura
        else 
            $vehiculos = $vehiculosDB;

        // Impresión de vehículo/s
        foreach($vehiculos as $mtr => $infoVehiculo) {
            echo "<h1> Matrícula: $mtr</h1>";
            foreach($infoVehiculo as $clave => $info) {
                echo "<h2> $clave: </h2>";
                echo "<ul>";
                foreach($info as $claveInterior => $atributo) {
                    echo '<li>' . ucfirst($claveInterior) . " : {$atributo}</li>";
                }
                echo "</ul>";
            }
            echo "<hr>";
        }

        // Se muestra la estructura del arreglo
        if($consulta == 'Consultar') {
            echo '<h4>Estructura general del arreglo:</h4>';
            echo print_r($vehiculos);
        }
    ?>
</body>
</html>