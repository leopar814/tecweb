<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>
    <?php
        if(isset($_POST['edad']) && isset($_POST['sexo'])) {
            $edad = $_POST['edad'];
            $sexo = $_POST['sexo'];
            if(($edad >= 18 && $edad <= 35) && $sexo == "femenino")
                echo '<p style="font-size:35px; color:green">Bienvenida, usted está en el rango de edad permitido</p>';
            else 
                echo '<p style="font-size:35px; color:red">Lo siento, algún dato no es válido</p>';
        } else {

            echo '<p>Error en POST</p>';
        }
    ?>
</body>
</html>