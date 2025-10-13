<?php
    if(isset($_POST['id_producto']))
        $id_producto = $_POST['id_producto'];
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

    /* MySQL Conexion*/
    $link = mysqli_connect("localhost", "root", "12345", "marketzone");

    // Chequea coneccion
    if($link === false)
        die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());

    // Se comprueban los cambios
    $sql = "SELECT * FROM productos WHERE id = $id_producto";
    if($consulta = mysqli_query($link, $sql)) {
        $row = $consulta->fetch_assoc();
        
        $cambios = [];

        if ($nombre !== $row['nombre'])      $cambios[] = "nombre='$nombre'";
        if ($marca !== $row['marca'])        $cambios[] = "marca='$marca'";
        if ($modelo !== $row['modelo'])      $cambios[] = "modelo='$modelo'";
        if ($precio != $row['precio'])       $cambios[] = "precio=$precio";
        if ($detalles !== $row['detalles'])  $cambios[] = "detalles='$detalles'";
        if ($unidades != $row['unidades'])   $cambios[] = "unidades=$unidades";
        if ($imagen !== $row['imagen'])      $cambios[] = "imagen='$imagen'";
    }

    // Ejecuta la actualizacion del registro
    if(count($cambios) > 0) {
        $sql = "UPDATE productos SET " .implode(", ", $cambios) . " WHERE id=$id_producto"; // Se agregan todos los cambios
        if(mysqli_query($link, $sql))
            echo "<h2>Registro actualizado.</h2>";
        else
            echo "<h2>ERROR: No se ejecuto $sql. " . mysqli_error($link) . "<h2>";
    } else
        echo "<h2>No hay cambios registrados</h2>";
    
    
    

    // Cierra la conexion
    mysqli_close($link);
?>