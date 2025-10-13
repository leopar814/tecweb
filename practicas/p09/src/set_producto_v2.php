<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
		if(isset($_POST['nombre']))
			$nombre = $_POST['nombre'];
		if(isset($_POST['modelo']))
			$modelo = $_POST['modelo'];
		if(isset($_POST['marca']))
			$marca = $_POST['marca'];
		if(isset($_POST['precio']))
			$precio = $_POST['precio'];
		if(isset($_POST['detalles']))
			$detalles = $_POST['detalles'];
		if(isset($_POST['unidades']))
			$unidades = $_POST['unidades'];
		if(isset($_POST['imagen']))
			$imagen = $_POST['imagen'];


        /** SE CREA EL OBJETO DE CONEXION */
        @$link = new mysqli('localhost', 'root', '12345', 'marketzone');	

        /** comprobar la conexión */
        if ($link->connect_errno) {
            die('Falló la conexión: '.$link->connect_error.'<br />');
        }

        $query = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND modelo = '$modelo' AND marca = '$marca'";
        if ( $result = $link->query($query) ) {
            if ($result->num_rows > 0) // Ya existe un producto con esos datos
                $yaExiste = true;
            else 
                $yaExiste = false;
            /** útil para liberar memoria asociada a un resultado con demasiada información */
            $result->free();
        }

	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h1>PRODUCTO</h1>   
        <?php
            if($yaExiste) // Si ya existe, devuelve un mensaje respectivo
                echo '<h3 style="color:red;">El producto con ese nombre, modelo y marca ya existe en la base de datos</h3>';
            else { // Si no existe, lo agrega a la base de datos
                
                // $sql = "INSERT INTO productos VALUES (null, '$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$imagen', 0)";
                $sql = "INSERT INTO productos (nombre, marca, modelo, precio, unidades, imagen) VALUES ('$nombre', '$marca', '$modelo', '$precio', '$unidades', '$imagen')";
                if ($link->query($sql)) { // Muestra los datos insertados mediante una consulta
                    echo '<h3>Producto <strong>agregado</strong> con los siguientes datos: </h3>';
                    $id = $link->insert_id;
                    $result = $link->query("SELECT * FROM productos WHERE id = $id");
                    $producto = $result->fetch_assoc();

                    echo '<ul>';
                    foreach ($producto as $campo => $valor)
                        echo '<li><strong>' . $campo . ':</strong> ' . $valor . '</li>';
                    echo '</ul>';
                }
                $link->close();
            }
        ?>
	
	</body>
</html>