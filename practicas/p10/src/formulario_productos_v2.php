<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registro de productos</title>
        <style type="text/css">
            li { 
                list-style: none;
                margin-bottom: 10px;
                display: flex;
                align-items: center;
                gap: 10px;
            }
            label {
                width: 80px;
            }
            input {
                width: 18em;
                height: 2em;
            }
            .error {
            color: red;
            font-size: 1em; 
            margin-left: 5px;
            }
        </style>
    </head>
    <body>
        <h1>Registro de nuevos Productos en Marketzone</h1>
        <form id="formulario" method="POST" action="http://localhost/tecweb/practicas/p09/src/set_producto_v2.php">
            <ul id="entradas">
                <li><label>Nombre del producto: </label><input type="text" name="nombre" value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>" /><span class="error"></span></li>
                <li><label>Marca: </label>
                    <?php
                        // obtener valor
                        $marcaSeleccionada = isset($_POST['marca']) ? $_POST['marca'] : $_GET['marca']; 
                        $marcas = ["Logitech", "HyperX", "Razer", "Corsair", "Redragon", "Yeyian"];
                    ?>

                    <select name="marca">
                        <?php foreach ($marcas as $marca): ?>
                            <option value="<?= $marca ?>"
                            <?= ($marca == $marcaSeleccionada) ? 'selected' : '' ?>>
                            <?= $marca ?>
                            </option>
                        <?php endforeach; ?>

                    </select><span class="error"></span></li>
                <li><label>Modelo: </label><input type="text" name="modelo" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>" /><span class="error"></span></li>
                <li><label>Precio: </label><input type="number" name="precio" value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>" /><span class="error"></span></li>
                <li><label>Detalles: </label><textarea name="detalles"><?= !empty($_POST['detalles'])?$_POST['detalles']:$_GET['detalles'] ?></textarea><span class="error"></span></li>
                <li><label>Unidades: </label><input type="number" name="unidades" value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>" /><span class="error"></span></li>
                <li><label>Imagen: </label><input type="text" name="imagen" value="<?= !empty($_POST['imagen'])?$_POST['imagen']:$_GET['imagen'] ?>" placeholder="Nombre del archivo de la imagen" /><span class="error"></span></li>
            
            </ul>
            
            <input type="submit" value="Registrar producto" />
            <input type="reset" value = "Limpiar" />
        
        </form>
        <script src="./validacionDeDatos.js"></script>
    </body>
</html>