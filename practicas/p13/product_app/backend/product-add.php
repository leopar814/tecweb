<?php
    use Myapi\Create\Create as Create;
    require_once __DIR__.'/start.php';

    $producto = new Create('marketzone');
    $producto->add( json_decode( json_encode($_POST) ) );
    echo $producto->getData();
?>