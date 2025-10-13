<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
		if(isset($_GET['tope']))
			$tope = $_GET['tope'];
		else {
			http_response_code(400);
			echo "Parámetro 'tope' requerido";
    		exit;
		}


		if (!empty($tope)) {
			/** SE CREA EL OBJETO DE CONEXION */
			@$link = new mysqli('localhost', 'root', '12345', 'marketzone');	

			/** comprobar la conexión */
			if ($link->connect_errno) {
				die('Falló la conexión: '.$link->connect_error.'<br />');
					/** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
			}

			/** Crear una tabla que no devuelve un conjunto de resultados */
			if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= $tope") ) {
				$row = $result->fetch_all(MYSQLI_ASSOC);
				/** útil para liberar memoria asociada a un resultado con demasiada información */
				$result->free();
			}

			$link->close();
		}
	?>
	<script>
		function show() {
			// se obtiene el id de la fila donde está el botón presinado
			var rowId = event.target.parentNode.parentNode.id;

			// se obtienen los datos de la fila en forma de arreglo
			var data = document.getElementById(rowId).querySelectorAll(".row-data");
			/**
			querySelectorAll() devuelve una lista de elementos (NodeList) que 
			coinciden con el grupo de selectores CSS indicados.
			(ver: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors)

			En este caso se obtienen todos los datos de la fila con el id encontrado
			y que pertenecen a la clase "row-data".
			*/

			var id = data[0].innerHTML;
			var nombre = data[1].innerHTML;
			var marca = data[2].innerHTML;
			var modelo = data[3].innerHTML;
			var precio = data[4].innerHTML;
			var unidades = data[5].innerHTML;
			var detalles = data[6].innerHTML;
			var imagen = data[7].querySelector("img").getAttribute("src");

			// alert("Name: " + name + "\nAge: " + age);
			console.log(data);
			send2form(id, nombre, marca, modelo, precio, detalles, unidades, imagen);
		}
	</script>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		<?php $id = 1 // Contador de filas ?>
		<?php foreach($row as $registro) : ?>

			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nombre</th>
						<th scope="col">Marca</th>
						<th scope="col">Modelo</th>
						<th scope="col">Precio</th>
						<th scope="col">Unidades</th>
						<th scope="col">Detalles</th>
						<th scope="col">Imagen</th>
						<th scope="col">Modificar</th>
					</tr>
				</thead>
				<tbody>
					<tr id=<?= $id++ ?> >
						<th scope="row" class="row-data"><?= $registro['id'] ?></th>
						<td class="row-data"><?= $registro['nombre'] ?></td>
						<td class="row-data"><?= $registro['marca'] ?></td>
						<td class="row-data"><?= $registro['modelo'] ?></td>
						<td class="row-data"><?= $registro['precio'] ?></td>
						<td class="row-data"><?= $registro['unidades'] ?></td>
						<td class="row-data"><?= utf8_encode($registro['detalles']) ?></td>
						<td class="row-data"><img src="<?= $registro['imagen'] ?>" alt="Imagen del producto"></td>
						<td><input	
								type="button"
								value="Modificar"
								onclick="show()"
							/>
						</td>
					</tr>
				</tbody>
			</table>

		<?php endforeach; ?>

		<script>
            function send2form(id, nombre, marca, modelo, precio, detalles, unidades, imagen) {
                var urlForm = './formulario_productos_v2.php'; 
				var propId = "id_producto="+ id;
                var propNombre = "nombre=" + nombre;
                var propMarca = "marca=" + marca;
                var propModelo = "modelo=" + modelo;
                var propPrecio = "precio=" + precio;
                var propDetalles = "detalles=" + detalles;
                var propUnidades = "unidades=" + unidades;
                var propImagen = "imagen=" + imagen;
                window.open(urlForm + 
							"?" + propId +
							"&" + propNombre + 
							"&" + propMarca + 
							"&" + propModelo + 
							"&" + propPrecio + 
							"&" + propDetalles + 
							"&" + propUnidades + 
							"&" + propImagen);
            }
        </script>
	</body>
</html>