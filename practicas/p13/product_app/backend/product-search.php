<?php
    use Myapi\Read\Read as Read;
    require_once __DIR__.'/start.php';

    $producto = new Read('marketzone');
    $producto->search( $_GET['search'] );
    echo $producto->getData();
?>