<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
			/** SE CREA EL OBJETO DE CONEXION */
			@$link = new mysqli('localhost', 'root', '12345', 'marketzone');	

			/** comprobar la conexión */
			if ($link->connect_errno) {
				die('Falló la conexión: '.$link->connect_error.'<br />');
					/** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
			}

			/** Crear una tabla que no devuelve un conjunto de resultados */
			if ( $result = $link->query("SELECT * FROM productos WHERE eliminado = 0") ) {
				$row = $result->fetch_all(MYSQLI_ASSOC);
				/** útil para liberar memoria asociada a un resultado con demasiada información */
				$result->free();
			}

			$link->close();
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

				var nombre = data[0].innerHTML;
				var marca = data[1].innerHTML;
				var modelo = data[2].innerHTML;
				var precio = data[3].innerHTML;
				var unidades = data[4].innerHTML;
				var detalles = data[5].innerHTML;
				var imagen = data[6].querySelector("img").getAttribute("src");

				// alert("Name: " + name + "\nAge: " + age);
				console.log(data);
				send2form(nombre, marca, modelo, precio, detalles, unidades, imagen);
			}
        </script>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>Periféricos</h3>

		<br/>
		<?php $id = 1 // Contador de filas ?>
		<?php foreach($row as $registro) : ?>

			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
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
						<th scope="row"><?= $registro['id'] ?></th>
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
				function send2form(nombre, marca, modelo, precio, detalles, unidades, imagen) {
					var form = document.createElement("form");

					var nombreIn = document.createElement("input");
					nombreIn.type = 'text';
					nombreIn.name = 'nombre';
					nombreIn.value = nombre;
					form.appendChild(nombreIn);

					var marcaIn = document.createElement("select");
					marcaIn.name = 'marca';
					
					const marcaSeleccionada = document.createElement("option");
					marcaSeleccionada.value = marca;
					marcaIn.appendChild(marcaSeleccionada);

					form.appendChild(marcaIn);
					console.log(marcaIn);

					// const marcas = ["Logitech", "HyperX", "Razer", "Corsair", "Redragon", "Yeyian"];
					// // Crear opciones
					// marcas.forEach(marcaActual => {
					// 	const opcion = document.createElement("option");
					// 	opcion.value = marcaActual;
					// 	if (marcaActual === marcaSeleccionada)
					// 		opcion.selected = true;
					// 	marcaIn.appendChild(opcion);
					// });
					

					var modeloIn = document.createElement("input");
					modeloIn.type = 'text';
					modeloIn.name = 'modelo';
					modeloIn.value = modelo;
					form.appendChild(modeloIn);

					var precioIn = document.createElement("input");
					precioIn.type = 'number';
					precioIn.name = 'precio';
					precioIn.value = precio;
					form.appendChild(precioIn);

					var detallesIn = document.createElement("textarea");
					detallesIn.name = 'detalles';
					detallesIn.textContent = detalles;
					form.appendChild(detallesIn);

					var unidadesIn = document.createElement("input");
					unidadesIn.type = 'number';
					unidadesIn.name = 'unidades';
					unidadesIn.value = unidades;
					form.appendChild(unidadesIn);

					var imagenIn = document.createElement("input");
					imagenIn.type = 'text';
					imagenIn.name = 'imagen';
					imagenIn.value = imagen;
					form.appendChild(imagenIn);

					console.log(form);

					form.method = 'POST';
					form.action = './formulario_productos_v2.php';  

					document.body.appendChild(form);
					form.submit()
				}
        	</script>

		
	</body>
</html>