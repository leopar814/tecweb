<?php
    use MARKETZONE\MAIN\Products as Product; 
    include_once __DIR__ . '/myapi/Products.php';
    $product = new Product('marketzone');
    $product->singleByName($_GET['name']);
    echo $product->getResponse();

    // include_once __DIR__.'/database.php';

    // // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    // $data = array();
    // if( isset($_GET['nombre']) ) {
    //     $nombre = $_GET['nombre'];
    //     // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    //     $sql = "SELECT * FROM productos WHERE nombre LIKE '{$nombre}' AND eliminado = 0";
    //     if ( $result = $conexion->query($sql) ) {
    //         // SE OBTIENEN LOS RESULTADOS
	// 		$row = $result->fetch_assoc();

    //         if(!is_null($row)) {
    //             foreach($row as $key => $value) {
    //                 $data[$key] = utf8_encode($value);
    //             }
    //         }
	// 		$result->free();
	// 	} else {
    //         die('Query Error: '.mysqli_error($conexion));
    //     }
    // }

    // $conexion->close();

    
    // // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    // echo json_encode($data, JSON_PRETTY_PRINT);
?>