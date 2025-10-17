<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        /**
         * SUSTITUYE LA SIGUIENTE LÍNEA POR EL CÓDIGO QUE REALICE
         * LA INSERCIÓN A LA BASE DE DATOS. COMO RESPUESTA REGRESA
         * UN MENSAJE DE ÉXITO O DE ERROR, SEGÚN SEA EL CASO.
         */
        $nombre = $jsonOBJ->nombre;
        $marca = $jsonOBJ->marca;
        $modelo = $jsonOBJ->modelo;
        $precio = $jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = $jsonOBJ->unidades;
        $imagen = $jsonOBJ->imagen;


        // Se comprueba si el producto ya existe
        $sql = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND eliminado = 0";
        if ( $result = $conexion->query($sql) ) {
            if ($result->num_rows > 0) // Ya existe un producto con esos datos
                $yaExiste = true;
            else 
                $yaExiste = false;
            $result->free();
        }

        if($yaExiste) // Si ya existe, devuelve un mensaje respectivo
            echo "Ese producto ya existe";
        else { // Si no existe, lo agrega a la base de datos
            
            $sql = "INSERT INTO productos VALUES (null, '$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$imagen', 0)";
            // $sql = "INSERT INTO productos (nombre, marca, modelo, precio, unidades, imagen) VALUES ('$nombre', '$marca', '$modelo', '$precio', '$unidades', '$imagen')";
            if ($conexion->query($sql))
                echo "Producto agregado exitosamente";
            
        }
        $conexion->close();
    }
?>