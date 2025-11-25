<?php
    use Myapi\Delete\Delete as Delete;
    require_once __DIR__.'/start.php';

    $producto = new Delete('marketzone');
    $producto->delete($_POST['id']);
    echo $producto->getData();
?>